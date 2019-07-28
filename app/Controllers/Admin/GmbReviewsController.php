<?php
/**
 * This file contains admin's GmbReviewsController.
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
use App\Models\Common\Gmb\GmbReviewModel;

/**
 * This controller contains actions for the Google My Business page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class GmbReviewsController extends ControllerAbstract
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
        $reviews   = $this->getReviews();

        $action = [
            'home'   => $config['routes']['admin'],
            'gmb'    => $config['routes']['admin-gmb'],
            'delete' => $config['routes']['admin-gmb-reviews'],
        ];

        $data = compact(
            'user', 'action', 'reviews', 'locations'
        );

        return $this->render('Admin/gmb/reviews/index.twig', $data);
    }

    /**
     * Deletes reply
     *
     * @param string $id review ID
     *
     * @return string
     */
    public function delete($id)
    {
        $this->dbService = $this->getService('db');
        $this->logger    = $this->getService('logger');

        $updateData = [
            'review_id'              => $id,
            'reply_comment'          => null,
            'reply_update_timestamp' => gmdate('Y-m-d H:i:s'),
            'is_sync'                => 0,
        ];

        $reviewModel = new GmbReviewModel($this->dbService, $this->logger);
        $status = $reviewModel->updateReply($updateData);

        return $this->getResponse()->withJson(
            ['status'  => ($status) ? 'success' : 'error']
        );
    }

    /**
     * Fetches reviews groupped by is_sync
     *
     * @return array ['new' => , 'old' => ]
     */
    private function getReviews()
    {
        $reviews = [
            'new' => (new GmbReviewModel($this->dbService, $this->logger))
                ->getReviews(['is_sync' => 0]),
            'old' => (new GmbReviewModel($this->dbService, $this->logger))
                ->getReviews(['is_sync' => 1])
        ];
        return $reviews;
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
