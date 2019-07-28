<?php
/**
 * This file contains portal's SocialMediaController.
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
use App\Models\Dealers\SocialMediaModel;
use App\Models\Common\ServiceModel;
use App\Models\Common\DealerSocialMediaDataModel;
use App\Models\Common\DealerServiceDataModel;
use Illuminate\Support\Collection;

/**
 * This controller contains actions for the Social Media page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class SocialMediaController extends DealersController
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

        $user = $this->getService('session')->user;
        $company = $this->getCompany($user['id']);

        $media     = $this->getSocialMedia();
        $totals    = $this->getSocialMediaTotals($user['id']);
        $periods   = $this->getTotalsPeriods($totals);
        $posts     = $this->getPostsCounts($user['id']);
        $forbidden = !$this->hasSubscription($user['id']);
        $action    = ['services' => $config['routes']['services']];

        $data = compact(
            'menu', 'route', 'user', 'company', 'media', 'totals', 'periods',
            'posts', 'forbidden', 'action'
        );

        return $this->render('Dealers/social_media/index.twig', $data);
    }

    /**
     * Returns social media with data
     *
     * @return Collection|bool
     */
    private function getSocialMedia()
    {
        $socialMediaModel = new SocialMediaModel($this->dbService);
        $result = $socialMediaModel->getSocialMedia(['has_data' => true]);
        if (!$result) {
            return false;
        }

        $media = $this->prepareSocialMedia($result);
        return $media;
    }

    /**
     * Prepares social media array (key = social media ID)
     *
     * @param Collection $rows DB rows
     *
     * @return array [[id => media], [id => media], ...]
     */
    private function prepareSocialMedia(Collection $rows)
    {
        $media = [];
        foreach ($rows as $row) {
            $media[$row->id] = $row;
        }
        return $media;
    }

    /**
     * Returns array with totals for specified social media
     *
     * @param int $dealerId dealer ID
     *
     * @return array
     */
    private function getSocialMediaTotals(int $dealerId)
    {
        $totals = [];

        $dealerSocialMediaModel = new DealerSocialMediaDataModel(
            $this->dbService,
            $this->logger
        );
        $results = $dealerSocialMediaModel->getDealerTotals($dealerId);
        if (!$results) {
            return false;
        }

        foreach ($results as $row) {
            $totals[$row->date] = [
                'posts'       => $row->posts_total,
                'engagements' => $row->engagements_total,
                'impressions' => $row->impressions_total,
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
     * Returns dealer's yearly posts counts
     *
     * @param int $dealerId dealer ID
     *
     * @return array
     */
    private function getPostsCounts(int $dealerId)
    {
        $period = $this->getCountsPeriod();

        $dealerSocialMediaModel = new DealerSocialMediaDataModel(
            $this->dbService,
            $this->logger
        );
        $rows = $dealerSocialMediaModel->getDealerPostCounts($dealerId, $period);

        $labels = [];
        $series = [];
        foreach ($rows as $row) {
            $formattedDate = gmdate('F Y', strtotime($row->date));
            if (!in_array($formattedDate, $labels)) {
                $labels[] = $formattedDate;
            }
        }

        $seriesLength = count($labels);

        foreach ($rows as $row) {
            $formattedDate = gmdate('F Y', strtotime($row->date));
            $dayOfWeek = ucfirst($row->day_of_week);
            if (!array_key_exists($dayOfWeek, $series)) {
                $series[$dayOfWeek] = array_fill(0, $seriesLength, 0);
            }
            $label = array_search($formattedDate, $labels);
            if ($label !== false) {
                $series[$dayOfWeek][$label] = $row->posts_total;
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
        $serviceId = $this->getServiceId('social_media');
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
