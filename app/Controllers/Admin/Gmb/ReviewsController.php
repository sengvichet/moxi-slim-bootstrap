<?php
/**
 * This file contains admin's ReviewsController.
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
namespace App\Controllers\Admin\Gmb;

use App\Kernel\Slim\App;
use App\Kernel\ControllerAbstract;
use App\Models\Common\Gmb\GmbLocationModel;
use App\Models\Common\Gmb\GmbReviewModel;
use App\Models\Common\Gmb\GmbPullModel;

/**
 * This controller contains actions for the Google My Business page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class ReviewsController extends ControllerAbstract
{
    /**
     * DB service
     *
     * @var \Illuminate\Database\Capsule\Manager
     */
    private $dbService;
    /**
     * Logger service
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
     * Handles form request.
     *
     * @return string
     */
    public function store()
    {
        $request  = $this->getRequest();
        $config   = $this->getService('config')->get();
        $routes   = $config['routes'];
        $messages = $config['messages']['admin_gmb'];

        if (!$request->isXhr()) {
            return $this->getResponse()->withRedirect($routes['admin-gmb'], 301);
        }

        if (!$request->isPost()) {
            return $this->getResponse()->withJson(
                [
                    'status'  => 'error',
                    'message' => str_replace(':instance', 'Reviews', $messages['failure'])
                ]
            );
        }

        $this->dbService  = $this->getService('db');
        $this->logger     = $this->getService('logger');
        $this->gmbService = $this->getService('gmb_api');

        if (!$this->gmbService->hasAccessToken()) {
            return $this->getResponse()->withJson(
                ['status' => 'error', 'data' => ['url' => '/' . $routes['oauth']]]
            );
        }

        $locations = $this->getDbLocations();
        if (!$locations) {
            return $this->getResponse()->withJson(
                [
                    'status' => 'error',
                    'message' => str_replace(':instance', 'Reviews', $messages['failure'])
                ]
            );
        }
        $reviews = $statuses = [];
        foreach ($locations as $location) {
            $reviews = $this->getReviews(
                'accounts/' . $location->account_id,
                $location->location_id
            );
            $statuses = array_merge(
                $statuses,
                $this->storeReviews($location->location_id, $reviews)
            );
        }
        if (array_sum($statuses)) {
            return $this->getResponse()->withJson(
                [
                    'status'  => 'success',
                    'message' => str_replace(':instance', 'Reviews', $messages['success'])
                ]
            );
        }
        return $this->getResponse()->withJson(
            [
                'status'  => 'error',
                'message' => str_replace(':instance', 'reviews', $messages['info'])
            ]
        );
    }

    /**
     * Fetches stored GMB locations.
     *
     * @return array
     */
    private function getDbLocations()
    {
        $locationModel = new GmbLocationModel($this->dbService, $this->logger);
        $locations = $locationModel->getLocations();
        return $locations;
    }

    /**
     * Fetches location's reviews from API.
     *
     * @param string $account  GMB account name 'accounts/ID'
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
        $statuses = [];
        foreach ($reviews as $review) {
            $reviewModel = new GmbReviewModel($this->dbService, $this->logger);
            $data = $review;
            $data['location_id'] = $location;
            $data['is_sync'] = true;
            $status = $reviewModel->insertReview($data);
            if ($status) {
                $this->storePull($location, $data['review_id'], 'review');
            }
            $statuses[] = $status;
        }
        return $statuses;
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
}
