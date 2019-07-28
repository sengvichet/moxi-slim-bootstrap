<?php
/**
 * This file contains admin's BusinessController.
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
use App\Models\Common\Gmb\DealersGmbAccountsModel;
use App\Models\Dealers\Company\CompanyModel;
use App\Models\Dealers\Company\CompanyContactModel;
use App\Models\Dealers\Company\CompanyHoursModel;
use App\Models\Dealers\Company\CompanyInformationModel;
use App\Models\Dealers\Company\CompaniesCategoriesModel;
use App\Models\Common\Gmb\GmbLocationModel;
use App\Models\Common\Gmb\GmbPushModel;
use App\Models\Common\Gmb\GmbServiceCategoryModel;

/**
 * This controller contains actions for the Google My Business page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class BusinessController extends ControllerAbstract
{
    /**
     * GMB API service
     *
     * @var \Classes\GmbApi
     */
    private $gmbService;

    /**
     * Handles 'update' request
     *
     * @return void
     */
    public function update()
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
                    'message' => str_replace(':instance', 'Business fields', $messages['failure'])
                ]
            );
        }

        $statuses = [];

        $this->gmbService = $this->getService('gmb_api');
        $this->dbService  = $this->getService('db');
        $this->logger     = $this->getService('logger');

        if (!$this->gmbService->hasAccessToken()) {
            return $this->getResponse()->withJson(
                ['status' => 'error', 'data' => ['url' => '/' . $routes['oauth']]]
            );
        }

        $dealers = $this->getGmbDealers();
        foreach ($dealers as $dealer) {
            $data = $this->getBusinessData($dealer->user_id);
            if (!$data) {
                continue;
            }
            $locations = $this->getLocations($dealer->account_id);
            foreach ($locations as $location) {
                $data['location'] = $location;
                $status = $this->gmbService->updateLocationInformation($data);
                if ($status) {
                    $this->updateCompany($data['company']->id);
                    $this->storePush($location->location_id, $data['company']->id, 'business');
                }
                $statuses[] = $status;
            }
        }
        if (array_sum($statuses)) {
            return $this->getResponse()->withJson(
                [
                    'status'  => 'success',
                    'message' => str_replace(':instance', 'Business fields', $messages['success'])
                ]
            );
        }
        return $this->getResponse()->withJson(
            [
                'status'  => 'error',
                'message' => str_replace(':instance', 'business fields', $messages['info'])
            ]
        );
    }

    /**
     * Returns account's locations
     *
     * @param string $account GMB account id
     *
     * @return array
     */
    private function getLocations(string $account)
    {
        $gmbLocationModel = new GmbLocationModel($this->dbService, $this->logger);
        $locations = $gmbLocationModel->getAccountLocations($account);
        return $locations;
    }

    /**
     * Gets all dealers with GMB accounts
     *
     * @return \Illuminate\Support\Collection
     */
    private function getGmbDealers()
    {
        $dealerModel = new DealersGmbAccountsModel($this->dbService, $this->logger);
        $dealers = $dealerModel->getGmbDealers();
        return $dealers;
    }

    /**
     * Fetches stored GMB locations.
     *
     * @param int $userId ID of user to get business data
     *
     * @return array
     */
    private function getBusinessData(int $userId)
    {
        $data = [];
        if (!$userId) {
            return $data;
        }
        $companyModel = new CompanyModel($this->dbService);
        $company = $companyModel->getCompany(['user_id' => $userId, 'is_sync' => 0]);
        if (!$company) {
            return $data;
        }

        $companyContactModel = new CompanyContactModel($this->dbService);
        $companyContacts = $companyContactModel->getCompanyContacts(
            ['company_id' => $company->id]
        );

        $companyHoursModel = new CompanyHoursModel($this->dbService);
        $companyHours = $companyHoursModel->getCompanyHours($company->id);

        $companyInfoModel = new CompanyInformationModel($this->dbService);
        $companyInformation = $companyInfoModel->getCompanyInformation($company->id);

        $companiesCategoriesModel = new CompaniesCategoriesModel($this->dbService, $this->logger);
        $companyCategories = $companiesCategoriesModel->getCompanyCategories($company->id);

        $categories = [];
        foreach ($companyCategories as $category) {
            $categoriesModel = new GmbServiceCategoryModel($this->dbService, $this->logger);
            $categories[] = $categoriesModel->getCategory(['id' => $category->category_id]);
        }

        $data = [
            'company'             => $company,
            'company_contacts'    => $companyContacts,
            'company_hours'       => $companyHours,
            'company_information' => $companyInformation,
            'company_categories'  => $categories,
        ];
        return $data;
    }

    /**
     * Updates is_sync field of company
     *
     * @param int $companyId company ID
     *
     * @return bool
     */
    private function updateCompany(int $companyId)
    {
        $updateData = ['id' => $companyId, 'is_sync' => 1];
        $companyModel = new CompanyModel($this->getService('db'));
        $status = $companyModel->updateCompany($updateData);
        return $status;
    }

    /**
     * Inserts GMB push record into DB.
     *
     * @param string $location     GMB location ID
     * @param string $instanceId   location ID|insight ID| review ID
     * @param string $instanceType 'insight'|'review'|'location'
     *
     * @return void
     */
    private function storePush(string $location, string $instanceId, string $instanceType)
    {
        if (!$location || !$instanceId || !$instanceType) {
            return false;
        }
        $push = [
            'location_id'   => $location,
            'instance_id'   => $instanceId,
            'instance_type' => $instanceType,
            'timestamp'     => gmdate('Y-m-d H:i:s'),
        ];
        $pushModel = new GmbPushModel($this->getService('db'), $this->getService('logger'));
        $pushModel->insertPush($push);
    }
}
