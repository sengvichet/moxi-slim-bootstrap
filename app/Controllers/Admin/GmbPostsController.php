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
namespace App\Controllers\Admin;

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
class GmbPostsController extends ControllerAbstract
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
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $this->dbService = $this->getService('db');
        $this->logger = $this->getService('logger');
        $user = $this->getService('session')->user;
        $config = $this->getService('config')->get();

        $locations = $this->getLocations();
        $posts     = $this->getPosts();
        $media     = $this->getPostsMedia();
        $events    = $this->getPostsEvents();
        $offers    = $this->getPostsOffers();
        $products  = $this->getPostsProducts();

        $action = [
            'home'   => $config['routes']['admin'],
            'gmb'    => $config['routes']['admin-gmb'],
            'delete' => $config['routes']['admin-gmb-posts'],
        ];

        $data = compact(
            'user', 'action', 'posts', 'locations', 'media', 'events', 'offers',
            'products'
        );

        return $this->render('Admin/gmb/posts/index.twig', $data);
    }

    /**
     * Deletes post
     *
     * @param string $id post ID
     *
     * @return string
     */
    public function delete($id)
    {
        $this->dbService = $this->getService('db');
        $this->logger = $this->getService('logger');
        $postModel = new GmbPostModel($this->dbService, $this->logger);
        $status = $postModel->deletePost($id);

        return $this->getResponse()->withJson(
            ['status'  => ($status) ? 'success' : 'error']
        );
    }

    /**
     * Fetches posts groupped by is_sync
     *
     * @return array ['new' => , 'old' => ]
     */
    private function getPosts()
    {
        $posts = [
            'new' => (new GmbPostModel($this->dbService, $this->logger))
                ->getPosts(['is_sync' => 0]),
            /*'old' => (new GmbPostModel($this->dbService, $this->logger))
                ->getPosts(['is_sync' => 1])*/
        ];
        return $posts;
    }

    private function getPostsMedia()
    {
        $media = [];
        $postMediaModel = new GmbPostMediaModel($this->dbService, $this->logger);
        $results = $postMediaModel->getPostsMedia();
        if (!$results) {
            return $media;
        }

        foreach ($results as $result) {
            $media[$result->post_id] = $result;
        }

        return $media;
    }

    private function getPostsEvents()
    {
        $events = [];
        $postEventModel = new GmbPostEventModel($this->dbService, $this->logger);
        $results = $postEventModel->getPostEvents();
        if (!$results) {
            return $events;
        }

        foreach ($results as $result) {
            $events[$result->post_id] = $result;
        }

        return $events;
    }

    private function getPostsOffers()
    {
        $offers = [];
        $postOfferModel = new GmbPostOfferModel($this->dbService, $this->logger);
        $results = $postOfferModel->getPostOffers();
        if (!$results) {
            return $offers;
        }

        foreach ($results as $result) {
            $offers[$result->post_id] = $result;
        }

        return $offers;
    }

    private function getPostsProducts()
    {
        $products = [];
        $postProductModel = new GmbPostProductModel($this->dbService, $this->logger);
        $results = $postProductModel->getPostProducts();
        if (!$results) {
            return $products;
        }

        foreach ($results as $result) {
            $products[$result->post_id] = $result;
        }

        return $products;
    }

    /**
     * Returns all GMB locations
     *
     * @return Collection|bool
     */
    private function getLocations()
    {
        $locations = [];
        $locationModel = new GmbLocationModel($this->dbService, $this->logger);
        $results = $locationModel->getLocations();
        if (!$results) {
            return $locations;
        }

        foreach ($results as $result) {
            $locations[$result->location_id] = $result;
        }
        return $locations;
    }
}
