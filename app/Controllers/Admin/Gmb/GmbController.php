<?php
/**
 * This file contains admin's GmbController.
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
use App\Models\Common\Gmb\GmbPullModel;
use App\Models\Common\Gmb\GmbPushModel;
use App\Models\Common\Gmb\GmbReviewModel;
use App\Models\Common\Gmb\GmbPostModel;
use App\Models\Dealers\Company\CompanyModel;

/**
 * This controller contains actions for the Google My Business page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class GmbController extends ControllerAbstract
{
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
        $routes = $this->getService('config')->get()['routes'];
        $action = [
            'home'     => $routes['admin'],
            'location' => $routes['admin-gmb-locations'],
            'insight'  => $routes['admin-gmb-insights'],
            'review'   => $routes['admin-gmb-reviews'],
            'reply'    => $routes['admin-gmb-replies'],
            'post'     => $routes['admin-gmb-posts'],
            'post_new' => $routes['admin-gmb-new-posts'],
            'business' => $routes['admin-gmb-business'],
            'information' => $routes['admin-gmb-information'],
        ];
        $data = compact('user', 'action');

        $locations = $this->getDbLocations();
        if ($locations) {
            $locationsIds = [];
            foreach ($locations as $location) {
                $locationsIds[] = $location->location_id;
            }
            $timestamps = [
                'location'=> $this->getLatestTimestamp('location', $locationsIds),
                'insight' => $this->getLatestTimestamp('insight', $locationsIds),
                'review'  => $this->getLatestTimestamp('review', $locationsIds),
                'reply'   => $this->getLatestTimestamp('reply', $locationsIds),
                'post'    => $this->getLatestTimestamp('post', $locationsIds),
                'post_new'=> $this->getLatestTimestamp('new-post', $locationsIds),
                'business'=> $this->getLatestPushTimestamp('business', $locationsIds),
                'information'=>$this->getLatestTimestamp('information', $locationsIds),
            ];
            $updates = [
                'reply'    => $this->countUpdateReviews(),
                'post_new' => $this->countUpdatePosts(),
                'business' => $this->countUpdateBusinesses(),
            ];
            $data['information'] = $this->countInformation();
            $data['locations']  = $locations;
            $data['timestamps'] = $timestamps;
            $data['updates']    = $updates;
        }

        return $this->render('Admin/gmb/index.twig', $data);
    }

    /**
     * Fetches stored GMB locations.
     *
     * @return array
     */
    private function getDbLocations()
    {
        $locationModel = new GmbLocationModel(
            $this->getService('db'),
            $this->getService('logger')
        );
        $locations = $locationModel->getLocations();
        return $locations;
    }

    /**
     * Checks if DB contains the latest API data.
     *
     * @param string $type      'location'|insight'|'review'
     * @param array  $locations [GMB location ID]
     *
     * @return string
     */
    private function getLatestTimestamp(string $type, array $locations)
    {
        $pullModel = new GmbPullModel(
            $this->getService('db'),
            $this->getService('logger')
        );
        $latestTimestamp = $pullModel->getLatestTimestamp($locations, $type);
        return $latestTimestamp;
    }

    /**
     * Checks if DB contains the latest API data.
     *
     * @param string $type      'location'|insight'|'review'
     * @param array  $locations [GMB location ID]
     *
     * @return string
     */
    private function getLatestPushTimestamp(string $type, array $locations)
    {
        $pushModel = new GmbPushModel(
            $this->getService('db'),
            $this->getService('logger')
        );
        $latestTimestamp = $pushModel->getLatestTimestamp($locations, $type);
        return $latestTimestamp;
    }

    /*
     * Returns number of reviews to update (with updated replies)
     *
     * @return object|bool
     */
    private function countUpdateReviews()
    {
        $reviewModel = new GmbReviewModel($this->dbService, $this->logger);
        $count = $reviewModel->countReviews(['is_sync' => 0]);
        return $count;
    }

    /*
     * Returns number of posts to update
     *
     * @return object|bool
     */
    private function countUpdatePosts()
    {
        $postModel = new GmbPostModel($this->dbService, $this->logger);
        $count = $postModel->countPosts(['is_sync' => 0]);
        return $count;
    }

    /*
     * Returns number of businesses to update
     *
     * @return object|bool
     */
    private function countUpdateBusinesses()
    {
        $companyModel = new CompanyModel($this->dbService, $this->logger);
        $count = $companyModel->countGmbCompanies(['is_sync' => 0]);
        return $count;
    }

    /*
     * Returns number of businesses
     *
     * @return object|bool
     */
    private function countInformation()
    {
        $companyModel = new CompanyModel($this->dbService, $this->logger);
        $count = $companyModel->countGmbCompanies(['is_sync' => 1]);
        return $count;
    }
}
