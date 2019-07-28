<?php
/**
 * This file contains portal's HomeController.
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
namespace App\Controllers\Dealers;

use App\Kernel\Slim\App;
use App\Controllers\Dealers\DealersController;
use App\Models\Common\Gmb\DealersGmbAccountsModel;
use App\Models\Common\Gmb\GmbLocationModel;
use App\Models\Common\Gmb\GmbInsightModel;
use App\Models\Common\DealerSocialMediaDataModel;
use App\Models\Common\DealerPaidAdsDataModel;
use App\Models\Common\DealerListingLeaderDataModel;
use App\Models\Common\DealerServiceDataModel;
use App\Models\Common\ServiceModel;

/**
 * This controller contains actions for the dashboard page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class DashboardController extends DealersController
{
    /**
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $this->dbService = $this->getService('db');
        $this->logger    = $this->getService('logger');

        $menu = $this->getMenuItems();
        $route = $this->getCurrentRoute();

        $user    = $this->getService('session')->user;
        $company = $this->getCompany($user['id']);
        $period  = $this->getYearPeriod();
        $summary = $this->getSummary($user['id'], $period);
        $subscribed = $this->getSubscribed($user['id']);
        $periods = $this->getPeriods($period);
        $links   = $this->getLinks();

        $data = compact(
            'menu', 'route', 'user', 'company', 'summary', 'periods', 'links',
            'subscribed'
        );

        return $this->render('Dealers/dashboard/dealer.twig', $data);
    }

    /**
     * Prepares summary data for dealer
     *
     * @param int   $dealerId dealer ID
     * @param array $period   period
     *
     * @return array
     */
    private function getSummary(int $dealerId, array $period)
    {
        $data = [
            'gmb'          => $this->getGmbSummary($dealerId, $period),
            'social_media' => $this->getSocialMediaSummary($dealerId, $period),
            'ppc'          => $this->getPpcSummary($dealerId, $period),
            'listings'     => $this->getListingsSummary($dealerId, $period),
        ];
        return $data;
    }

    private function getSubscribed(int $dealerId)
    {
        $subscribed = [];

        $serviceModel = new ServiceModel($this->dbService, $this->logger);
        $services = $serviceModel->getServices();
        if (!$services) {
            return $subscribed;
        }

        foreach ($services as $service) {
            $subscribed[$service->name] = (new DealerServiceDataModel(
                $this->dbService, $this->logger
            ))->isSubscribed($dealerId, $service->id);
        }

        return $subscribed;
    }

    /**
     * Prepares GMB summary data for dealer
     *
     * @param int   $dealerId dealer ID
     * @param array $period   year period
     *
     * @return array
     */
    private function getGmbSummary(int $dealerId, array $period)
    {
        $location = $this->getDealerLocation($dealerId);

        $insights = (new GmbInsightModel($this->dbService, $this->logger))
            ->getLocationMonthlySummary($location, $period);
        if (!$insights || $insights->isEmpty()) {
            return false;
        }

        $data = [];
        foreach ($insights as $insight) {
            $date = $insight->year . '-' . $insight->month . '-01';
            $data[$date]['calls_directions'] = $insight->calls_directions;
        }
        return $data;
    }

    /**
     * Prepares social media summary data for dealer
     *
     * @param int   $dealerId dealer ID
     * @param array $period   year period
     *
     * @return array
     */
    private function getSocialMediaSummary(int $dealerId, array $period)
    {
        $totals = (new DealerSocialMediaDataModel($this->dbService, $this->logger))
            ->getDealerTotals($dealerId, $period);
        if (!$totals || $totals->isEmpty()) {
            return false;
        }

        $data = [];
        foreach ($totals as $total) {
            $data[$total->date] = ['engagements' => $total->engagements_total];
        }

        return $data;
    }

    /**
     * Prepares pay-per-click summary data for dealer
     *
     * @param int   $dealerId dealer ID
     * @param array $period   year period
     *
     * @return array
     */
    private function getPpcSummary(int $dealerId, array $period)
    {
        $totals = (new DealerPaidAdsDataModel($this->dbService, $this->logger))
            ->getDealerTotals($dealerId, $period);
        if (!$totals || $totals->isEmpty()) {
            return false;
        }

        $data = [];
        foreach ($totals as $total) {
            $data[$total->date] = ['conversions' => $total->conversions_total];
        }

        return $data;
    }

    /**
     * Prepares listings summary data for dealer
     *
     * @param int   $dealerId dealer ID
     * @param array $period   year period
     *
     * @return array
     */
    private function getListingsSummary(int $dealerId, array $period)
    {
        $totals = (new DealerListingLeaderDataModel($this->dbService, $this->logger))
            ->getDealerListingsCounts($dealerId, $period);
        if (!$totals || $totals->isEmpty()) {
            return false;
        }

        $data = [];
        foreach ($totals as $total) {
            $data[$total->date] = ['total' => $total->listings];
        }
        return $data;
    }

    /**
     * Returns dealer location if exists
     *
     * @param int $dealerId dealer ID
     *
     * @return int|null
     */
    private function getDealerLocation(int $dealerId)
    {
        $dealerModel = new DealersGmbAccountsModel($this->dbService, $this->logger);
        $dealer = $dealerModel->getGmbDealer($dealerId);
        if (empty($dealer->account_id)) {
            return false;
        }

        $locationModel = new GmbLocationModel($this->dbService, $this->logger);
        $location = $locationModel->getAccount($dealer->account_id);
        return (empty($location->location_id)) ? false : $location->location_id;
    }

    /**
     * Creates period of 1 year
     *
     * @return array ['start' => string, 'end' => string]
     */
    private function getYearPeriod()
    {
        $startDate = new \DateTime();
        $startDate->setDate((int) gmdate('Y'), (int) gmdate('m'), 1);
        $startDate->sub(new \DateInterval('P12M'));
        $startDate = $startDate->format('Y-m');

        $endDate = gmdate('Y-m-t');

        $period = ['start' => $startDate . '-01', 'end' => $endDate];
        return $period;
    }

    /**
     * Splits year period by months
     *
     * @param array $period year period
     *
     * @return array
     */
    private function getPeriods(array $period)
    {
        $periods = [];

        $currentDate = $period['start'];
        $endDate = gmdate('Y-m', strtotime($period['end'])) . '-01';

        do {
            $nextDate = new \DateTime();
            $nextDate->setDate(
                (int) gmdate('Y', strtotime($currentDate)),
                (int) gmdate('m', strtotime($currentDate)),
                1
            );
            $nextDate->add(new \DateInterval('P1M'));
            $nextPeriod = [
                'start' => $nextDate->format('Y-m') . '-01',
                'end'   => $nextDate->format('Y-m-t')
            ];
            $currentDate = $nextPeriod['start'];
            $periods[$nextPeriod['start']] = $nextPeriod;
        } while ($nextPeriod['start'] < $endDate);

        return $periods;
    }

    /**
     * Prepares links for the summary boxes
     *
     * @return array
     */
    private function getLinks()
    {
        $routes = $this->getService('config')->get()['routes'];
        $links = [
            'gmb'          => $routes['google-my-business'],
            'social_media' => $routes['social-marketing'],
            'ppc'          => $routes['sem'],
            'listings'     => $routes['local'],
        ];
        return $links;
    }
}
