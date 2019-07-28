<?php
/**
 * This file contains portal's GmbController.
 *
 * PHP version 7.1
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version  GIT:
 * @link     http://lamp-dev.com
 */
namespace App\Controllers\Dealers\Gmb;

use App\Kernel\Slim\App;
use App\Controllers\Dealers\DealersController;
use App\Models\Common\Gmb\GmbInsightModel;
use App\Models\Common\Gmb\GmbReviewModel;
use App\Models\Common\Gmb\GmbPostModel;
use App\Models\Common\Gmb\GmbPullModel;
use App\Models\Common\Gmb\DealersGmbAccountsModel;
use App\Models\Common\Gmb\GmbLocationModel;
use App\Models\Common\ServiceModel;
use App\Models\Common\DealerServiceDataModel;

/**
 * This controller contains actions for the Google My Business page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class GmbController extends DealersController
{
    /**
     * DB service
     *
     * @var \Illuminate\Database\Capsule\Manager
     */
    private $dbService;
    /**
     * Log service
     *
     * @var \Monolog\Logger
     */
    private $logger;
    /**
     * GMB API service
     *
     * @var \Classes\GmbApi
     */
    private $gmbService;
    /**
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $request = $this->getRequest();
        $params = $request->getParams();
        $this->dbService = $this->getService('db');
        $this->logger = $this->getService('logger');
        $config = $this->getService('config')->get();

        $menu = $this->getMenuItems();
        $route = $this->getCurrentRoute();

        $user = $this->getService('session')->user;
        $company = $this->getCompany($user['id']);

        $data = compact('menu', 'route', 'user', 'company');

        $accountId = $this->getAccountId($user['id']);
        $hasSubscription = $this->hasGmbSubscription($user['id']);
        $data['forbidden'] = true;
        $data['action'] = ['services' => $config['routes']['services']];
        if ($accountId && $hasSubscription) {
            $accountLocations = $this->getAccountLocations($accountId);
            $locations = $accountLocations['locations'];
            $locationsNames = $accountLocations['locations_names'];

            $data['has_insights']      = $this->hasLatestData('insight', $locations, 24 * 60 * 60);
            $data['has_reviews']       = $this->hasLatestData('review', $locations, 60 * 60);
            $data['period']            = $this->getPeriod();
            $data['account']           = $this->getAccount($accountId)->account_name;
            $data['locations']         = ['id' => $locations, 'name' => $locationsNames];
            $data['selected_location'] = [
                'id'   => (empty($params['location']))
                    ? array_shift($locations)
                    : $params['location'],
                'name' => (empty($params['location']))
                    ? array_shift($locationsNames)
                    : $this->getLocation($params['location'])->location_name,
            ];
            $data['gmb']               = $this->getGmbData(
                [$data['selected_location']['id']],
                $data['period']
            );
            $data['prepared_gmb']      = $this->prepareGmbData($data['gmb']);

            $data['action']['refresh'] = $this->getService('config')->get()
                ['routes']['google-my-business-refresh'];
            $data['forbidden'] = false;
            $routes = $this->getService('config')->get()['routes'];
            $data['url'] = [
                'reviews'  => $routes['google-my-business-reviews']
                    . ((!empty($params['location'])) ? '?location=' . $params['location'] : ''),
                'post_new' => $routes['google-my-business-posts'] . '?location='
                    . ((!empty($params['location']))
                        ? $params['location']
                        : $data['selected_location']['id']),
            ];
        }

        return $this->render('Dealers/gmb/index.twig', $data);
    }

    /**
     * Inserts GMB API data to DB.
     *
     * @return string
     */
    public function refresh()
    {
        $request = $this->getRequest();

        if (!$request->isXhr()) {
            $url = $this->getService('config')->get()['routes']['google-my-business'];
            return $this->getResponse()->withRedirect($url, 301);
        }

        if (!$request->isPost()) {
            return $this->getAjaxResponse('error');
        }

        $params = $request->getParams();
        if (empty($params['type'])
            || !in_array($params['type'], ['all', 'insight', 'review'])
        ) {
            return $this->getAjaxResponse('error');
        }

        $this->dbService  = $this->getService('db');
        $this->logger     = $this->getService('logger');
        $this->gmbService = $this->getService('gmb_api');

        if (!$this->gmbService->hasAccessToken()) {
            $url = $this->getService('config')->get()['routes']['oauth'];
            return $this->getAjaxResponse('error', compact('url'));
        }

        $user = $this->getService('session')->user;
        $accountId = $this->getAccountId($user['id']);
        $account = 'accounts/' . $accountId;
        $locations = $this->getAccountLocations($accountId)['locations'];
        if ($params['type'] === 'all') {
            $this->storeGmbData($account, $locations);
        } elseif ($params['type'] === 'insight') {
            foreach ($locations as $location) {
                $insights = $this->getInsights($account, $location);
                $this->storeInsights($location, $insights);
            }
        } else {
            foreach ($locations as $location) {
                $reviews = $this->getReviews($account, $location);
                $this->storeReviews($location, $reviews);
            }
        }
        $data['gmb'] = $this->getGmbData($locations, $this->getPeriod());

        return $this->getResponse()->withJson(['status' => 'success', 'data' => $data]);
    }

    /**
     * Fetches insights and reviews for account from DB.
     *
     * @param array  $locations [GMB location ID]
     * @param array  $period    time period to get data
     *
     * @return array            ['insights' => [], 'reviews' => []]
     */
    private function getGmbData(array $locations, array $period)
    {
        $insights = $reviews = $posts = [];
        foreach ($locations as $location) {
            $insights[$location] = $this->getDbInsights($location, $period);
            $reviews[$location]  = $this->getDbReviews($location, $period);
            $posts[$location]    = $this->getDbPosts($location, $period);
        }
        return compact('insights', 'reviews', 'posts');
    }

    /**
     * Inserts GMB API data for account into DB.
     *
     * @param string     $account   GMB account ID
     * @param array|null $locations [GMB location ID]
     *
     * @return void
     */
    private function storeGmbData(string $account, array $locations)
    {
        if (!$account || !$locations) {
            return;
        }

        foreach ($locations as $location) {
            $insights = $this->getInsights($account, $location);
            $this->storeInsights($location, $insights);
            $reviews = $this->getReviews($account, $location);
            $this->storeReviews($location, $reviews);
            $posts = $this->getPosts($account, $location);
            $this->storePosts($location, $posts);
        }
    }

    /**
     * Fetches account's insights from API.
     *
     * @param string $account  GMB account ID
     * @param string $location GMB location ID
     *
     * @return array [time => [field => value], ...]
     */
    private function getInsights(string $account, string $location)
    {
        $insightsData = [];
        if (!$account || !$location) {
            return $insightsData;
        }

        $startTime = $this->getLatestTimestamp('insight', [$location]);
        if (!$startTime) {
            $startTime = (new \DateTime())->sub(new \DateInterval('P30D'))->format('Y-m-d H:i:s');
        }

        $insights = $this->gmbService->getLocationInsights(
            $account,
            $location,
            $startTime
        );

        foreach ($insights as $metric) {
            if (empty($metric->metric)) {
                continue;
            }
            $field = strtolower($metric->metric);

            foreach ($metric->dimensionalValues as $dimensionalValue) {
                if (!empty($dimensionalValue->timeDimension->timeRange->startTime)
                    && isset($dimensionalValue->value)
                ) {
                    $time = $dimensionalValue->timeDimension->timeRange->startTime;
                    if (empty($insightsData[$time])) {
                        $insightsData[$time] = [];
                    }
                    $insightsData[$time][$field] = $dimensionalValue->value;
                }
            }
        }

        return $insightsData;
    }

    /**
     * Inserts location's insights from API to DB.
     *
     * @param string $location GMB location ID
     * @param array  $insights ['queries_direct'            => number,
     *                         'queries_indirect'           => number,
     *                         'views_maps'                 => number,
     *                         'views_search'               => number,
     *                         'actions_website'            => number,
     *                         'actions_phone'              => number,
     *                         'actions_driving_directions' => number,
     *                         'photos_views_merchant'      => number,
     *                         'photos_views_customer'      => number,
     *                         'photos_count_merchant'      => number,
     *                         'photos_count_customer'      => number,
     *                         'local_post_views_search'    => number]
     *
     * @return void
     */
    private function storeInsights(string $location, array $insights)
    {
        foreach ($insights as $time => $values) {
            $insightModel = new GmbInsightModel($this->dbService, $this->logger);
            $data = [
                'location_id' => $location,
                'timestamp'   => gmdate('Y-m-d H:i:s', strtotime($time)),
            ];
            $data = array_merge($data, $values);
            $insightId = $insightModel->insertInsight($data);
            if ($insightId) {
                $this->storePull($location, $insightId, 'insight');
            }
        }
    }

    /**
     * Fetches location's reviews from API.
     *
     * @param string $account  GMB account ID
     * @param string $location GMB location ID
     *
     * @return array [
     *         ['location_id'            => 'GMB location ID',
     *          'review_id'              => 'review->reviewId',
     *          'reviewer_name'          => 'review->reviewer->displayName',
     *          'comment'                => 'review->comment',
     *          'star_rating'            => 'review->starRating',
     *          'create_timestamp'       => 'review->createTime',
     *          'update_timestamp'       => 'review->updateTime',
     *          'reply_comment'          => 'review->reviewReply->comment',
     *          'reply_update_timestamp' => 'review->reviewReply->updateTime'
     *          ], ...]
     */
    private function getReviews(string $account, string $location)
    {
        $reviewsData = [];
        if (!$account || !$location) {
            return $reviewsData;
        }
        $reviews = $this->gmbService->getLocationReviews($account, $location);

        foreach ($reviews as $review) {
            $reviewsData[] = [
                'location_id'            => $location,
                'review_id'              => $review->reviewId,
                'reviewer_name'          => $review->reviewer->displayName,
                'comment'                => $review->comment,
                'star_rating'            => $this->wordToNumber($review->starRating),
                'create_timestamp'       => gmdate('Y-m-d H:i:s', strtotime($review->createTime)),
                'update_timestamp'       => gmdate('Y-m-d H:i:s', strtotime($review->updateTime)),
                'reply_comment'          => (empty($review->reviewReply))
                    ? null : $review->reviewReply->comment,
                'reply_update_timestamp' => (empty($review->reviewReply))
                    ? null : gmdate('Y-m-d H:i:s', strtotime($review->reviewReply->updateTime)),
            ];
        }
        return $reviewsData;
    }

    /**
     * Inserts location's reviews from API.
     *
     * @param string $location GMB location ID
     * @param array  $reviews  [['location_id'          => 'GMB location ID',
     *                         'review_id'              => 'review->reviewId',
     *                         'reviewer_name'          => 'review->reviewer->displayName',
     *                         'comment'                => 'review->comment',
     *                         'star_rating'            => 'review->starRating',
     *                         'create_timestamp'       => 'review->createTime',
     *                         'update_timestamp'       => 'review->updateTime',
     *                         'reply_comment'          => 'review->reviewReply->comment',
     *                         'reply_update_timestamp' => 'review->reviewReply->updateTime'
     *                         ], ...]
     *
     * @return void
     */
    private function storeReviews(string $location, array $reviews)
    {
        foreach ($reviews as $review) {
            $reviewModel = new GmbReviewModel($this->dbService, $this->logger);
            $data = $review;
            $data['location_id'] = $location;
            $data['is_sync'] = true;
            $status = $reviewModel->insertReview($data);
            if ($status) {
                $this->storePull($location, $data['review_id'], 'review');
            }
        }
    }

    /**
     * Fetches account's posts from API.
     *
     * @param string $account  GMB account ID
     * @param string $location GMB location ID
     *
     * @return array [time => [field => value], ...]
     */
    private function getPosts(string $account, string $location)
    {
        $postsData = [];
        if (!$account || !$location) {
            return $postsData;
        }

        $postsData = $this->gmbService->getLocationPosts($account, $location);

        return $postsData;
    }

    /**
     * Inserts location's posts from API to DB.
     *
     * @param string $location GMB location ID
     * @param array  $posts    array of \Google_Service_MyBusiness_LocalPost
     *
     * @return void
     */
    private function storePosts(string $location, array $posts)
    {
        foreach ($posts as $post) {
            $postId = $this->getPostId($post->name);
            $data = [
                'post_id'       => $postId,
                'language_code' => strtolower($post->languageCode),
                'summary'       => $post->summary,
                'topic_type'    => 'standard',
                'search_url'    => $post->searchUrl,
                'cta_type'      => (empty($post->getCallToAction()->actionType))
                    ? 'action_type_unspecified' : strtolower($post->getCallToAction()->actionType),
                'cta_url'       => (empty($post->getCallToAction()->url))
                    ? null : $post->getCallToAction()->url,
                'state'         => strtolower($post->state),
                'create_time'   => gmdate('Y-m-d H:i:s', strtotime($post->createTime)),
                'update_time'   => gmdate('Y-m-d H:i:s', strtotime($post->updateTime)),
                'location_id'   => $location
            ];
            $postModel = new GmbPostModel($this->dbService, $this->logger);
            $status = $postModel->insertPost($data);
            if ($status) {
                $this->storePull($location, $postId, 'post');
            }
        }
    }

    /**
     * Inserts GMB pull record into DB.
     *
     * @param string $location     GMB location ID
     * @param mixed  $instanceId   insight or review ID
     * @param string $instanceType 'insight'|'review'
     *
     * @return void
     */
    private function storePull(string $location, $instanceId, string $instanceType)
    {
        if (!$location || !$instanceId || !$instanceType) {
            return false;
        }
        $pull = [
            'location_id'   => $location,
            'instance_id'   => $instanceId,
            'instance_type' => $instanceType,
            'timestamp'     => gmdate('Y-m-d H:i:s'),
        ];
        $pullModel = new GmbPullModel($this->dbService, $this->logger);
        $pullModel->insertPull($pull);
    }

    /**
     * Fetches location's insights from DB
     *
     * @param string $location GMB location ID
     * @param array  $period   period to get data
     *
     * @return array           [['id'                       => number,
     *                         'location_id'                => string,
     *                         'queries_direct'             => number,
     *                         'queries_indirect'           => number,
     *                         'views_maps'                 => number,
     *                         'views_search'               => number,
     *                         'actions_website'            => number,
     *                         'actions_phone'              => number,
     *                         'actions_driving_directions' => number,
     *                         'photos_views_merchant'      => number,
     *                         'photos_views_customer'      => number,
     *                         'photos_count_merchant'      => number,
     *                         'photos_count_customer'      => number,
     *                         'local_post_views_search'    => number,
     *                         'timestamp'                  => timestamp], ...]
     */
    private function getDbInsights(string $location, array $period)
    {
        $insightModel = new GmbInsightModel($this->dbService, $this->logger);
        $insights['current']  = $insightModel->getLocationInsights($location, $period['current']);
        $insightModel = new GmbInsightModel($this->dbService, $this->logger);
        $insights['previous'] = $insightModel->getLocationInsights($location, $period['previous']);
        return $insights;
    }

    /**
     * Fetches location's reviews from DB
     *
     * @param string $location GMB location ID
     * @param array  $period   period to get data
     *
     * @return array [['location_id'            => 'GMB location ID',
     *                 'review_id'              => 'review->reviewId',
     *                 'reviewer_name'          => 'review->reviewer->displayName',
     *                 'comment'                => 'review->comment',
     *                 'star_rating'            => 'review->starRating',
     *                 'create_timestamp'       => 'review->createTime',
     *                 'update_timestamp'       => 'review->updateTime',
     *                 'reply_comment'          => 'review->reviewReply->comment',
     *                 'reply_update_timestamp' => 'review->reviewReply->updateTime'
     *                 ], ...]
     */
    private function getDbReviews(string $location, array $period)
    {
        $reviewModel = new GmbReviewModel($this->dbService, $this->logger);
        $reviews['current'] = $reviewModel->getLocationReviews($location, $period['current']);
        $reviewModel = new GmbReviewModel($this->dbService, $this->logger);
        $reviews['previous'] = $reviewModel->getLocationReviews($location, $period['previous']);
        return $reviews;
    }

    /**
     * Fetches location's posts from DB
     *
     * @param string $location GMB location ID
     * @param array  $period   period to get data
     *
     * @return array
     */
    private function getDbPosts(string $location, array $period)
    {
        $postModel = new GmbPostModel($this->dbService, $this->logger);
        $posts['current'] = $postModel->getLocationPosts($location, $period['current']);
        $postModel = new GmbPostModel($this->dbService, $this->logger);
        $posts['previous'] = $postModel->getLocationPosts($location, $period['previous']);
        return $posts;
    }

    /**
     * Checks if DB contains the latest API data.
     *
     * @param string $type       'location'|insight'|'review'
     * @param array  $locations  [GMB location ID]
     * @param int    $difference seconds between now and latest time
     *
     * @return boolean
     */
    private function hasLatestData(string $type, array $locations, int $difference)
    {
        $latestTimestamp = $this->getLatestTimestamp($type, $locations);
        if (!$latestTimestamp) {
            return false;
        }
        $now = time();
        return (($now - strtotime($latestTimestamp)) < $difference);
    }

    /**
     * Checks if DB contains the latest API data.
     *
     * @param string $type      'location'|insight'|'review'
     * @param array  $locations [GMB location ID]
     *
     * @return boolean
     */
    private function getLatestTimestamp(string $type, array $locations)
    {
        $pullModel = new GmbPullModel($this->dbService, $this->logger);
        $latestTimestamp = $pullModel->getLatestTimestamp($locations, $type);
        return $latestTimestamp;
    }

    /**
     * Returns GMB account's ID by dealer's ID
     *
     * @param int $userId dealer's ID
     *
     * @return string|bool
     */
    private function getAccountId(int $userId)
    {
        $dealerAccountModel = new DealersGmbAccountsModel($this->dbService, $this->logger);
        $accountId = $dealerAccountModel->getAccountId($userId);
        return $accountId;
    }

    /**
     * Returns GMB account data by account's ID
     *
     * @param string $accountId account's ID
     *
     * @return string|bool
     */
    private function getAccount(string $accountId)
    {
        $locationModel = new GmbLocationModel($this->dbService, $this->logger);
        $account = $locationModel->getAccount($accountId);
        return $account;
    }

    /**
     * Return account's locations from DB.
     *
     * @param string $account GMB account ID
     *
     * @return array
     */
    private function getAccountLocations(string $account)
    {
        $locations = [];
        $locationModel = new GmbLocationModel(
            $this->getService('db'),
            $this->getService('logger')
        );
        $result = $locationModel->getAccountLocations($account);
        if (!$result) {
            return $locations;
        }
        foreach ($result as $row) {
            $locations[] = $row->location_id;
            $locationsNames[] = $row->location_name;
        }
        return ['locations' => $locations, 'locations_names' => $locationsNames];
    }

    /**
     * Transforms word number to int number
     *
     * @param string $word word number
     *
     * @return int
     */
    private function wordToNumber(string $word)
    {
        $words = [
            'ONE'   => 1,
            'TWO'   => 2,
            'THREE' => 3,
            'FOUR'  => 4,
            'FIVE'  => 5,
        ];
        return (empty($words[$word])) ? 0 : $words[$word];
    }

    /**
     * Returns prepared for viewer data
     *
     * @param array $data GMB data ['insights' => [], 'reviews' => []]
     *
     * @return array
     */
    private function prepareGmbData(array $data)
    {
        $gmbDataService = $this->getService('gmb_data');
        $insights = array_shift($data['insights']);
        $reviews = array_shift($data['reviews']);
        $posts = array_shift($data['posts']);
        $weekly = true;

        $prepared = [
            'website_visits' => $gmbDataService->getWebsiteVisitsData($insights, $weekly),
            'directions'     => $gmbDataService->getDirectionsData($insights, $weekly),
            'phone_calls'    => $gmbDataService->getPhoneCallsData($insights, $weekly),
            'review_score'   => $gmbDataService->getReviewScoreData($reviews),
            'total_reviews'  => $gmbDataService->getTotalReviewsData($reviews),
            'total_posts'    => $gmbDataService->getTotalPostsData($posts),
            'post_actions'   => $gmbDataService->getPostActionsData($posts),
            'post_views'     => $gmbDataService->getPostViewsData($insights),
        ];
        return $prepared;
    }

    /**
     * Returns time period to get data
     *
     * @return array
     */
    private function getPeriod()
    {
        $time = [
            'current' => [
                'start' => ((new \DateTime())->sub(new \DateInterval('P30D'))->format('Y-m-d H:i:s')),
                'end'   => gmdate('Y-m-d H:i:s')
            ],
            'previous' => [
                'start' => ((new \DateTime())->sub(new \DateInterval('P60D'))->format('Y-m-d H:i:s')),
                'end'   => ((new \DateTime())->sub(new \DateInterval('P30D'))->format('Y-m-d H:i:s')),
            ]
        ];
        return $time;
    }

    /**
     * Returns post ID
     *
     * @param string $name full post name
     *
     * @return string
     */
    private function getPostId(string $name)
    {
        $position = strrpos($name, '/');
        $id = substr($name, $position + 1);
        return $id;
    }

    /**
     * Returns location's data by id
     *
     * @param string $locationId GMB location ID
     *
     * @return \Illuminate\Support\Collection
     */
    private function getLocation(string $locationId)
    {
        $locationModel = new GmbLocationModel($this->dbService, $this->logger);
        $location = $locationModel->getLocation($locationId);
        return $location;
    }

    /**
     * Returns service ID
     *
     * @param string $name service name
     *
     * @return int|bool
     */
    private function getServiceId(string $name)
    {
        $serviceModel = new ServiceModel($this->dbService, $this->logger);
        $service = $serviceModel->getService(compact('name'));
        return (empty($service->id)) ? false : $service->id;
    }

    /**
     * Checks if dealer has subscription to GMB service
     *
     * @param int $dealerId dealer ID
     *
     * @return boolean
     */
    private function hasGmbSubscription(int $dealerId)
    {
        $serviceId = $this->getServiceId('gmb');
        $dealerServiceModel = new DealerServiceDataModel(
            $this->dbService,
            $this->logger
        );
        $subscription = $dealerServiceModel->getDealersServiceData(
            [
                'dealer_id'   => $dealerId,
                'service_id'  => $serviceId,
                'is_approved' => 1
            ]
        );
        return ($subscription && $subscription->isNotEmpty());
    }
}
