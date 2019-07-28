<?php
/**
 * This file contains admin's InsightsController.
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
use App\Models\Common\Gmb\GmbInsightModel;
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
class InsightsController extends ControllerAbstract
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
                    'message' => str_replace(':instance', 'Insights', $messages['failure'])
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
                    'message' => str_replace(':instance', 'Insights', $messages['failure'])
                ]
            );
        }
        $insights = $statuses = [];

        foreach ($locations as $location) {
            $insights = $this->getInsights(
                'accounts/' . $location->account_id,
                $location->location_id
            );
            $statuses = array_merge(
                $statuses,
                $this->storeInsights($location->location_id, $insights)
            );
        }
        if (array_sum($statuses)) {
            return $this->getResponse()->withJson(
                [
                    'status'  => 'success',
                    'message' => str_replace(':instance', 'Insights', $messages['success'])
                ]
            );
        }
        return $this->getResponse()->withJson(
            [
                'status'  => 'error',
                'message' => str_replace(':instance', 'insights', $messages['info'])
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
        $now = time();
        if ($now - strtotime($startTime) < 24 * 60 * 60) {
            return $insightsData;
        }
        if (!$startTime) {
            $startTime = (new \DateTime())->sub(
                new \DateInterval('P60D') // this month and previous month
            )->format('Y-m-d H:i:s');
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
                if (empty($dimensionalValue->timeDimension->timeRange->startTime)
                    || !isset($dimensionalValue->value)
                ) {
                    continue;
                }
                $time = $dimensionalValue->timeDimension->timeRange->startTime;
                if (empty($insightsData[$time])) {
                    $insightsData[$time] = [];
                }
                $insightsData[$time][$field] = $dimensionalValue->value;
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
        $statuses = [];
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
            $statuses[] = (bool)$insightId;
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
     * Checks if DB contains the latest API data.
     *
     * @param string $type      'location'|insight'|'review'
     * @param array  $locations [GMB location ID]
     *
     * @return string
     */
    private function getLatestTimestamp(string $type, array $locations)
    {
        $pullModel = new GmbPullModel($this->dbService, $this->logger);
        $latestTimestamp = $pullModel->getLatestTimestamp($locations, $type);
        return $latestTimestamp;
    }
}
