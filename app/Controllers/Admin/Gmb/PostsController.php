<?php
/**
 * This file contains admin's PostsController.
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
use App\Models\Common\Gmb\GmbPostModel;
use App\Models\Common\Gmb\GmbPullModel;
use App\Models\Common\Gmb\GmbPostMediaModel;
use App\Models\Common\Gmb\GmbPostEventModel;
use App\Models\Common\Gmb\GmbPostOfferModel;
use App\Models\Common\Gmb\GmbPostProductModel;

/**
 * This controller contains actions for the Google My Business page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class PostsController extends ControllerAbstract
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
                    'message' => str_replace(':instance', 'Posts', $messages['failure'])
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
                    'message' => str_replace(':instance', 'Posts', $messages['failure'])
                ]
            );
        }
        $posts = $statuses = [];

        foreach ($locations as $location) {
            $posts = $this->getPosts(
                'accounts/' . $location->account_id,
                $location->location_id
            );
            $statuses = array_merge(
                $statuses,
                $this->storePosts($location->location_id, $posts)
            );
        }
        if (array_sum($statuses)) {
            return $this->getResponse()->withJson(
                [
                    'status'  => 'success',
                    'message' => str_replace(':instance', 'Posts', $messages['success'])
                ]
            );
        }
        return $this->getResponse()->withJson(
            [
                'status'  => 'error',
                'message' => str_replace(':instance', 'posts', $messages['info'])
            ]
        );
    }

    /**
     * Handles form request.
     *
     * @return string
     */
    public function create()
    {
        $request  = $this->getRequest();
        $config   = $this->getService('config')->get();
        $routes   = $config['routes'];
        $messages = $config['messages']['admin_gmb'];

        if (!$request->isXhr()) {
            return $this->getResponse()->withRedirect($routes['admin-gmb'], 301);
        }

        if (!$request->isPost()) {
            return $this->getAjaxResponse(
                'error',
                null,
                str_replace(':instance', 'Posts', $messages['failure'])
            );
        }

        $this->dbService  = $this->getService('db');
        $this->logger     = $this->getService('logger');
        $this->gmbService = $this->getService('gmb_api');

        if (!$this->gmbService->hasAccessToken()) {
            return $this->getAjaxResponse(
                'error',
                ['url' => '/' . $routes['oauth']]
            );
        }

        $updatePosts = $this->getUpdatePosts();
        if (!$updatePosts) {
            return $this->getAjaxResponse(
                'error',
                null,
                str_replace(':instance', 'Posts', $messages['failure'])
            );
        }

        $posts = $this->createPosts($updatePosts);
        $statuses = $this->updatePosts($posts);
        if (array_sum($statuses)) {
            return $this->getAjaxResponse(
                'success',
                null,
                str_replace(':instance', 'Posts', $messages['success'])
            );
        }
        return $this->getAjaxResponse(
            'error',
            null,
            str_replace(':instance', 'posts', $messages['info'])
        );
    }

    /**
     * Pushes posts to GMB
     *
     * @param Collection $updatePosts posts to create
     *
     * @return array created posts
     */
    private function createPosts($updatePosts)
    {
        $posts = [];
        foreach ($updatePosts as $post) {
            $account = $this->getAccountId($post->location_id);
            if ($account && $post->summary) {
                $postMedia = $this->getPostMedia($post->post_id);
                $postSpecial = null;
                if ($post->topic_type !== 'standard') {
                    $postSpecial = call_user_func_array(
                        [$this, 'getPost' . lcfirst($post->topic_type)],
                        [$post->post_id]
                    );
                }
                $posts[] = [
                    'db_post'  => $post,
                    'gmb_post' => $this->gmbService->createPost(
                        $account,
                        $post->location_id,
                        $post,
                        ($postMedia) ? $postMedia : null,
                        $postSpecial
                    ),
                    'post_media' => $postMedia,
                ];
            }
        }
        return $posts;
    }

    /**
     * Updates posts data in DB
     *
     * @param array $posts GMB posts
     *
     * @return array update statuses
     */
    private function updatePosts(array $posts)
    {
        $statuses = [];
        foreach ($posts as $post) {
            $statuses[] = $this->updatePost(
                $post['db_post']->post_id,
                $post['db_post']->location_id,
                $post['gmb_post']
            );

            $media = $post['gmb_post']->getMedia();
            foreach ($media as $key => $item) {
                $this->updatePostMedia(
                    $this->getPostId($post['gmb_post']->name),
                    $post['db_post']->location_id,
                    $post['post_media'][$key]->source_url,
                    $item
                );
            }

            if ($post['db_post']->topic_type !== 'standard') {
                call_user_func_array(
                    [$this, 'updatePost' . lcfirst($post['db_post']->topic_type)],
                    [$post['db_post']->post_id, $this->getPostId($post['gmb_post']->name)]
                );
            }
        }
        return $statuses;
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
     * Inserts location's insights from API to DB.
     *
     * @param string $location GMB location ID
     * @param array  $posts    array of \Google_Service_MyBusiness_LocalPost
     *
     * @return array
     */
    private function storePosts(string $location, array $posts)
    {
        $statuses = [];

        foreach ($posts as $post) {
            $postId = $this->getPostId($post->name);
            $data = [
                'post_id'       => $postId,
                'language_code' => strtolower($post->languageCode),
                'summary'       => $post->summary,
                'topic_type'    => strtolower($post->topicType),
                'search_url'    => $post->searchUrl,
                'cta_type'      => (empty($post->getCallToAction()->actionType))
                    ? 'action_type_unspecified'
                    : strtolower($post->getCallToAction()->actionType),
                'cta_url'       => (empty($post->getCallToAction()->url))
                    ? null : $post->getCallToAction()->url,
                'state'         => strtolower($post->state),
                'create_time'   => gmdate('Y-m-d H:i:s', strtotime($post->createTime)),
                'update_time'   => gmdate('Y-m-d H:i:s', strtotime($post->updateTime)),
                'location_id'   => $location,
                'is_sync'       => 1,
            ];
            $postModel = new GmbPostModel($this->dbService, $this->logger);
            $status = $postModel->insertPost($data);
            $statuses[] = $status;
            if (!$status) {
                continue;
            }
            if ($data['topic_type'] === 'product') {
                $product = $this->prepareProductData($post);
                $postProductModel = new GmbPostProductModel($this->dbService, $this->logger);
                $productStatus = $postProductModel->insertPostProduct($product);
            } elseif ($data['topic_type'] === 'offer') {
                $offer = $this->prepareOfferData($post);
                $postOfferModel = new GmbPostOfferModel($this->dbService, $this->logger);
                $offerStatus = $postOfferModel->insertPostOffer($offer);
            }
            if (!empty($post->event)) {
                $event = $this->prepareEventData($post);
                $postEventModel = new GmbPostEventModel($this->dbService, $this->logger);
                $eventStatus = $postEventModel->insertPostEvent($event);
            }
            $this->storePull($location, $postId, 'post');
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
     * Returns post media ID
     *
     * @param string $name full post media name
     *
     * @return string
     */
    private function getPostMediaId(string $name)
    {
        $position = strrpos($name, '/');
        $id = substr($name, $position + 1);
        return $id;
    }

    /**
     * Returns posts to update
     *
     * @return object|bool
     */
    private function getUpdatePosts()
    {
        $postModel = new GmbPostModel($this->dbService, $this->logger);
        $posts = $postModel->getPosts(['is_sync' => 0]);
        return $posts;
    }

    /**
     * Returns location's account ID
     *
     * @param string $location GMB location ID
     *
     * @return string
     */
    private function getAccountId(string $location)
    {
        $locationModel = new GmbLocationModel($this->dbService, $this->logger);
        $response = $locationModel->getLocation($location);
        return (empty($response->account_id)) ? false : $response->account_id;
    }

    /**
     * Updates post in the DB
     *
     * @param string                               $postId     GMB post ID
     * @param string                               $locationId GMB location ID
     * @param \Google_Service_MyBusiness_LocalPost $post       GMB post
     *
     * @return bool
     */
    private function updatePost(string $postId, string $locationId, \Google_Service_MyBusiness_LocalPost $post)
    {
        $newPostId = $this->getPostId($post->name);
        $updateData = [
            'post_id'     => $newPostId,
            'search_url'  => $post->searchUrl,
            'state'       => $post->state,
            'create_time' => gmdate('Y-m-d H:i:s', strtotime($post->createTime)),
            'update_time' => gmdate('Y-m-d H:i:s', strtotime($post->updateTime)),
            'is_sync'     => 1,
        ];
        $postModel = new GmbPostModel($this->dbService, $this->logger);
        $status = $postModel->updatePost($postId, $updateData);
        if ($status) {
            $this->storePull($locationId, $newPostId, 'new-post');
        }
        return $status;
    }

    /**
     * Updates post media in the DB
     *
     * @param string                               $postId     GMB post ID
     * @param string                               $locationId GMB loction ID
     * @param string                               $sourceUrl  media source url
     * @param \Google_Service_MyBusiness_MediaItem $media      GMB media
     *
     * @return bool
     */
    private function updatePostMedia(string $postId, string $locationId, string $sourceUrl, \Google_Service_MyBusiness_MediaItem $media)
    {
        $mediaId = $this->getPostMediaId($media->name);
        $updateData = [
            'media_id'      => $mediaId,
            'post_id'       => $postId,
            'google_url'    => $media->googleUrl,
            'thumbnail_url' => $media->thumbnailUrl,
        ];
        $postMediaModel = new GmbPostMediaModel($this->dbService, $this->logger);
        $status = $postMediaModel->updatePostMedia($sourceUrl, $updateData);
        if ($status) {
            $this->storePull($locationId, $mediaId, 'new-post-media');
        }
        return $status;
    }

    /**
     * Updates post's event in the DB
     *
     * @param string $postId    DB post ID
     * @param string $gmbPostId GMB post ID
     *
     * @return bool
     */
    private function updatePostEvent(string $postId, string $gmbPostId)
    {
        $postEventModel = new GmbPostEventModel($this->dbService, $this->logger);
        $status = $postEventModel->updatePostEvent($postId, ['post_id' => $gmbPostId]);
        return $status;
    }

    /**
     * Updates post's offer in the DB
     *
     * @param string $postId    DB post ID
     * @param string $gmbPostId GMB post ID
     *
     * @return bool
     */
    private function updatePostOffer(string $postId, string $gmbPostId)
    {
        $this->updatePostEvent($postId, $gmbPostId);

        $postOfferModel = new GmbPostOfferModel($this->dbService, $this->logger);
        $status = $postOfferModel->updatePostOffer($postId, ['post_id' => $gmbPostId]);
        return $status;
    }

    /**
     * Updates post's product in the DB
     *
     * @param string $postId    DB post ID
     * @param string $gmbPostId GMB post ID
     *
     * @return bool
     */
    private function updatePostProduct(string $postId, string $gmbPostId)
    {
        $postProductModel = new GmbPostProductModel($this->dbService, $this->logger);
        $status = $postProductModel->updatePostProduct($postId, ['post_id' => $gmbPostId]);
        return $status;
    }

    /**
     * Returns post's media
     *
     * @param string $postId GMB post ID
     *
     * @return Collection|bool
     */
    private function getPostMedia(string $postId)
    {
        $postMediaModel = new GmbPostMediaModel($this->dbService, $this->logger);
        $media = $postMediaModel->getPostMedia($postId);
        return $media;
    }

    /**
     * Returns post's event
     *
     * @param string $postId GMB post ID
     *
     * @return array ['event' => Collection|bool]
     */
    private function getPostEvent(string $postId)
    {
        $postEventModel = new GmbPostEventModel($this->dbService, $this->logger);
        $event = $postEventModel->getPostEvent($postId);
        return compact('event');
    }

    /**
     * Returns post's offer
     *
     * @param string $postId GMB post ID
     *
     * @return array ['event' => Collection|bool, 'offer' => Collection|bool]
     */
    private function getPostOffer(string $postId)
    {
        $event = $this->getPostEvent($postId);
        $postOfferModel = new GmbPostOfferModel($this->dbService, $this->logger);
        $offer = $postOfferModel->getPostOffer($postId);
        return array_merge($event, compact('offer'));
    }

    /**
     * Returns post's product
     *
     * @param string $postId GMB post ID
     *
     * @return array ['product' => Collection|bool]
     */
    private function getPostProduct(string $postId)
    {
        $postProductModel = new GmbPostProductModel($this->dbService, $this->logger);
        $product = $postProductModel->getPostProduct($postId);
        return compact('product');
    }

    /**
     * Prepares product data
     *
     * @param LocalPost $post GMB post
     *
     * @return array
     */
    private function prepareProductData($post)
    {
        $product = [
            'post_id' => $this->getPostId($post->name),
            'product_name' => $post->product['productName'],
            'lower_price_currency' => (empty($post->product['lowerPrice']->currency))
                ? null : $post->product['lowerPrice']->currency,
            'lower_price_units' => (empty($post->product['lowerPrice']->units))
                ? null : $post->product['lowerPrice']->units,
            'lower_price_nanos' => (empty($post->product['lowerPrice']->nanos))
                ? null : $post->product['lowerPrice']->nanos,
            'upper_price_currency' => (empty($post->product['upperPrice']->currency))
                ? null : $post->product['upperPrice']->currency,
            'upper_price_units' => (empty($post->product['upperPrice']->units))
                ? null : $post->product['upperPrice']->units,
            'upper_price_nanos' => (empty($post->product['upperPrice']->nanos))
                ? null : $post->product['upperPrice']->nanos,
        ];
        return $product;
    }

    /**
     * Prepares offer data
     *
     * @param LocalPost $post GMB post
     *
     * @return array
     */
    private function prepareOfferData($post)
    {
        $offer = [
            'post_id'           => $this->getPostId($post->name),
            'coupon_code'       => (empty($post->offer['couponCode']))
                ? null : $post->offer['couponCode'],
            'redeem_online_url' => (empty($post->offer['redeemOnlineUrl']))
                ? null : $post->offer['redeemOnlineUrl'],
            'terms_conditions'  => (empty($post->offer['termsConditions']))
                ? null : $post->offer['termsConditions']
        ];
        return $offer;
    }

    /**
     * Prepares event data
     *
     * @param LocalPost $post GMB post
     *
     * @return array
     */
    private function prepareEventData($post)
    {
        $event = [
            'post_id'    => $this->getPostId($post->name),
            'title'      => $post->event->title,
            'start_time' =>
                $post->event->schedule->startDate->year . '-'
                . $post->event->schedule->startDate->month . '-'
                . $post->event->schedule->startDate->day . ' '
                . ((empty($post->event->schedule->startTime->hours))
                    ? '00' : $post->event->schedule->startTime->hours) . ':'
                . ((empty($post->event->schedule->startTime->minutes))
                    ? '00' : $post->event->schedule->startTime->minutes) . ':'
                . ((empty($post->event->schedule->startTime->seconds))
                    ? '00' : $post->event->schedule->startTime->seconds),
            'end_time'   =>
                $post->event->schedule->endDate->year . '-'
                . $post->event->schedule->endDate->month . '-'
                . $post->event->schedule->endDate->day . ' '
                . ((empty($post->event->schedule->endTime->hours))
                    ? '00' : $post->event->schedule->endTime->hours) . ':'
                . ((empty($post->event->schedule->endTime->minutes))
                    ? '00' : $post->event->schedule->endTime->minutes) . ':'
                . ((empty($post->event->schedule->endTime->seconds))
                    ? '00' : $post->event->schedule->endTime->seconds),
        ];
        return $event;
    }

    /**
     * Returns response to AJAX request
     *
     * @param string $status  response status
     * @param array  $data    response data
     * @param string $message response message
     * @param array  $errors  response errors
     *
     * @return Response
     */
    protected function getAjaxResponse(string $status, array $data = null, string $message = null, array $errors = null)
    {
        $response = ['status' => $status];
        if ($data) {
            $response['data'] = $data;
        }
        if ($message) {
            $response['message'] = $message;
        }
        if ($errors) {
            $response['errors'] = $errors;
        }
        $code = ($status == 'error') ? 400 : 200;
        return $this->getResponse()->withJson($response, $code);
    }
}
