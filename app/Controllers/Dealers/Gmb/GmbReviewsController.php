<?php
/**
 * This file contains portal's GmbReviewsController.
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
use App\Models\Common\Gmb\GmbReviewModel;
use App\Models\Common\Gmb\DealersGmbAccountsModel;
use App\Models\Common\Gmb\GmbLocationModel;

/**
 * This controller contains actions for the Google My Business page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class GmbReviewsController extends DealersController
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
        $config = $this->getService('config')->get();
        $this->dbService = $this->getService('db');
        $this->logger = $this->getService('logger');

        $menu = $this->getMenuItems();
        $route = $this->getCurrentRoute();

        $user = $this->getService('session')->user;
        $company = $this->getCompany($user['id']);

        $data = compact('menu', 'route', 'user', 'company');

        $accountId = $this->getAccountId($user['id']);
        $accountLocations = $this->getAccountLocations($accountId);
        $locations        = $accountLocations['locations'];
        $locationsNames   = $accountLocations['locations_names'];

        $data['account']    = $this->getAccount($accountId)->account_name;
        $data['locations']  = ['id' => $locations, 'name' => $locationsNames];
        $data['selected_location'] = [
            'id'   => (empty($params['location']))
                    ? array_shift($locations)
                    : $params['location'],
            'name' => (empty($params['location']))
                    ? array_shift($locationsNames)
                    : $this->getLocation($params['location'])->location_name,
        ];
        $data['reviews'] = $this->getDbReviews($data['selected_location']['id']);
        $data['action'] = [
            'review' => $config['routes']['google-my-business-reviews-reply'],
            'back'   => $config['routes']['google-my-business'],
        ];

        return $this->render('Dealers/gmb/reviews/index.twig', $data);
    }

    /**
     * Fetches location's reviews from DB
     *
     * @param string $location GMB location ID
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
    private function getDbReviews(string $location)
    {
        $reviewModel = new GmbReviewModel($this->dbService, $this->logger);
        $reviews = $reviewModel->getLocationReviews($location);
        return $reviews;
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
}
