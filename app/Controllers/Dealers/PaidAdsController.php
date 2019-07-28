<?php
/**
 * This file contains portal's PaidAdsController.
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
use App\Models\Common\DealerPaidAdsDataModel;
use App\Models\Common\DealerServiceDataModel;
use App\Models\Common\ServiceModel;
use Illuminate\Support\Collection;

/**
 * This controller contains actions for the Paid Ads page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class PaidAdsController extends DealersController
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

        $menu  = $this->getMenuItems();
        $route = $this->getCurrentRoute();

        $user    = $this->getService('session')->user;
        $company = $this->getCompany($user['id']);

        $totals    = $this->getPaidAdsTotals($user['id']);
        $periods   = $this->getTotalsPeriods($totals);
        $counts    = $this->getCounts($user['id']);
        $forbidden = !$this->hasSubscription($user['id']);
        $action    = ['services' => $config['routes']['services']];

        $data = compact(
            'menu', 'route', 'user', 'company', 'totals', 'periods', 'counts',
            'forbidden', 'action'
        );

        return $this->render('Dealers/paid_ads/index.twig', $data);
    }

    /**
     * Returns array with paid ads totals
     *
     * @param int $dealerId dealer ID
     *
     * @return array
     */
    private function getPaidAdsTotals(int $dealerId)
    {
        $totals = [];

        $dealerPaidAdsModel = new DealerPaidAdsDataModel(
            $this->dbService,
            $this->logger
        );
        $results = $dealerPaidAdsModel->getDealerTotals($dealerId);
        if (!$results) {
            return false;
        }

        foreach ($results as $row) {
            $totals[$row->date] = [
                'spend'       => $row->spend_total,
                'impressions' => $row->impressions_total,
                'clicks'      => $row->clicks_total,
                'conversions' => $row->conversions_total,
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
     * Returns dealer's yearly spend counts
     *
     * @param int $dealerId dealer ID
     *
     * @return array
     */
    private function getCounts(int $dealerId)
    {
        $period = $this->getCountsPeriod();

        $dealerPaidAdsModel = new DealerPaidAdsDataModel(
            $this->dbService,
            $this->logger
        );
        $rows = $dealerPaidAdsModel->getDealerCounts($dealerId, $period);

        $labels = [];
        foreach ($rows as $row) {
            $formattedDate = gmdate('F Y', strtotime($row->date));
            if (!in_array($formattedDate, $labels)) {
                $labels[] = $formattedDate;
            }
        }

        $seriesLength = count($labels);
        $series = [
            'spend' => array_fill(0, $seriesLength, 0),
            'cpc'   => array_fill(0, $seriesLength, 0),
        ];

        foreach ($rows as $row) {
            $formattedDate = gmdate('F Y', strtotime($row->date));
            $label = array_search($formattedDate, $labels);
            if ($label !== false) {
                $series['spend'][$label] = $row->spend;
                $series['cpc'][$label] = $row->cpc;
            }
        }
        return compact('labels', 'series');
    }

    /**
     * Returns last 12 months period
     *
     * @return array ['start' => date, 'end' => date]
     */
    private function getCountsPeriod()
    {
        $startDate = new \DateTime();
        $startDate->setDate((int) gmdate('Y'), (int) gmdate('m'), 1);
        $startDate->sub(new \DateInterval('P12M'));
        $startDate = $startDate->format('Y-m');
        $period = ['start' => $startDate . '-01', 'end' => gmdate('Y-m') . '-01'];

        return $period;
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
        $serviceId = $this->getServiceId('local_google_ads');
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
