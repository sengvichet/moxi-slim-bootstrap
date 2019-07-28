<?php
/**
 * This file contains portal's ListingLeaderController.
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
use App\Models\Common\ServiceModel;
use App\Models\Common\DealerListingLeaderDataModel;
use App\Models\Common\DealerServiceDataModel;
use Illuminate\Support\Collection;

/**
 * This controller contains actions for the Listing Leader page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class ListingLeaderController extends DealersController
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
        $config          = $this->getService('config')->get();

        $menu = $this->getMenuItems();
        $route = $this->getCurrentRoute();

        $user    = $this->getService('session')->user;
        $company = $this->getCompany($user['id']);

        $totals    = $this->getListingTotals($user['id']);
        $periods   = $this->getTotalsPeriods($totals);
        $counts    = $this->getCounts($totals);
        $forbidden = !$this->hasSubscription($user['id']);
        $action    = ['services' => $config['routes']['services']];

        $data = compact(
            'menu', 'route', 'user', 'company', 'totals', 'periods',
            'counts', 'forbidden', 'action'
        );

        return $this->render('Dealers/listing_leader/index.twig', $data);
    }

    /**
     * Returns array with totals for listings
     *
     * @param int $dealerId dealer ID
     *
     * @return array
     */
    private function getListingTotals(int $dealerId)
    {
        $totals = [];

        $dealerListingModel = new DealerListingLeaderDataModel(
            $this->dbService,
            $this->logger
        );
        $results = $dealerListingModel->getDealersListingLeaderData(
            ['dealer_id' => $dealerId]
        );
        if (!$results) {
            return false;
        }

        foreach ($results as $row) {
            $totals[$row->date] = [
                'traffic'            => $row->total_referral_traffic,
                'listing_correct'    => $row->listing_correct,
                'listing_processing' => $row->listing_processing,
                'listing_total'      => $row->listing_correct + $row->listing_processing,
            ];
        }

        return $totals;
    }

    /**
     * Returns periods for which there are available totals
     *
     * @param array $totals dealer's totals posts and engagements
     *
     * @return array [[start => date, end => date]]
     */
    private function getTotalsPeriods(array $totals)
    {
        $dates = array_keys($totals);
        rsort($dates);

        $periods = [];

        foreach ($dates as $date) {
            $periods[$date] = [
                'start' => $date,
                'end'   => gmdate('Y-m-t', strtotime($date))
            ];
        }

        return $periods;
    }

    /**
     * Returns dealer's yearly counts
     *
     * @param array $totals totals data
     *
     * @return array
     */
    private function getCounts(array $totals)
    {
        $labels = $series = [];
        foreach ($totals as $date => $row) {
            $formattedDate = gmdate('F Y', strtotime($date));
            if (!in_array($formattedDate, $labels)) {
                $labels[] = $formattedDate;
            }
        }

        foreach ($totals as $date => $row) {
            $formattedDate = gmdate('F Y', strtotime($date));
            $label = array_search($formattedDate, $labels);
            if ($label !== false) {
                $series[$label] = $row['traffic'];
            }
        }
        return compact('labels', 'series');
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
     * Checks if dealer has subscription to social media service
     *
     * @param int $dealerId dealer ID
     *
     * @return boolean
     */
    private function hasSubscription(int $dealerId)
    {
        $serviceId = $this->getServiceId('local_listings');
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
