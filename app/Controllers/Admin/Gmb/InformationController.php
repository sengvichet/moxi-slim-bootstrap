<?php
/**
 * This file contains admin's InformationController.
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
use App\Models\Dealers\Company\CompanyPaymentMethodModel;
use App\Models\Dealers\Company\CompaniesCategoriesModel;
use App\Models\Dealers\PaymentMethodModel;
use App\Models\Common\Gmb\GmbLocationModel;
use App\Models\Common\Gmb\GmbPullModel;
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
class InformationController extends ControllerAbstract
{
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
        $request = $this->getRequest();
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
                    'message' => str_replace(':instance', 'Businesses', $messages['failure'])
                ]
            );
        }

        $this->dbService  = $this->getService('db');
        $this->logger     = $this->getService('logger');
        $this->gmbService = $this->getService('gmb_api');
        if (!$this->gmbService->hasAccessToken()) {
            return $this->getResponse()->withJson(
                ['status'  => 'error', 'data' => ['url' => '/' . $routes['oauth']]]
            );
        }

        return $this->handleRequest($messages);
    }

    private function handleRequest(array $messages)
    {
        $dealers = $this->getGmbDealers();
        if (!$dealers) {
            return $this->getResponse()->withJson(
                [
                    'status'  => 'error',
                    'message' => str_replace(':instance', 'Businesses', $messages['failure'])
                ]
            );
        }

        $dealersLocations = [];
        foreach ($dealers as $dealer) {
            $locations = $this->getLocations($dealer->account_id);
            foreach ($locations as $location) {
                $dealersLocations[$dealer->user_id][] = $location;
            }
        }
        if (!$dealersLocations) {
            return $this->getResponse()->withJson(
                [
                    'status'  => 'error',
                    'message' => str_replace(':instance', 'Businesses', $messages['failure'])
                ]
            );
        }
        foreach ($dealersLocations as $dealerId => $locations) {
            foreach ($locations as $dealerLocation) {
                $location = $this->gmbService->getLocation(
                    $dealerLocation->account_id,
                    $dealerLocation->location_id
                );
                $statuses[] = $this->storeLocation($dealerId, $location);
            }
        }
        if (array_sum($statuses)) {
            return $this->getResponse()->withJson(
                [
                    'status'  => 'success',
                    'message' => str_replace(':instance', 'Businesses', $messages['success'])
                ]
            );
        }
        return $this->getResponse()->withJson(
            [
                'status'  => 'info',
                'message' => str_replace(':instance', 'businesses', $messages['info'])
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
     * Stores location as a company in the DB
     *
     * @param int                                 $dealerId dealer ID
     * @param \Google_Service_MyBusiness_Location $location GMB location
     *
     * @return bool
     */
    private function storeLocation(int $dealerId, \Google_Service_MyBusiness_Location $location)
    {
        $company = $this->getCompany($dealerId);
        if ($company) {
            $companyId = $company->id;
            $this->updateCompany($companyId, $location);
        } else {
            $companyId = $this->createCompany($dealerId, $location);
            if (!$companyId) {
                return false;
            }
        }
        if (!empty($location->regularHours)) {
            $this->addCompanyHours($companyId, $location->regularHours);
        }
        if (!empty($location->attributes)) {
            $this->addCompanyPaymentMethods($companyId, $location->attributes);
        }
        if (!empty($location->profile['description'])) {
            $this->addCompanyDescription($companyId, $location->profile['description']);
        }

        $primaryCategory = $location->getPrimaryCategory();
        if (!empty($primaryCategory)) {
            $categories = [$primaryCategory];
            $additionalCategories = $location->getAdditionalCategories();
            if (!empty($additionalCategories)) {
                $categories = array_merge($categories, $additionalCategories);
            }
            $this->addCompanyCategories($companyId, $categories);
        }

        $this->storePull($this->getLocationId($location->name), $companyId, 'information');

        return true;
    }

    /**
     * Returns dealer's company if exists
     *
     * @param int $dealerId GMB dealer ID
     *
     * @return Collection|bool
     */
    private function getCompany(int $dealerId)
    {
        $companyModel = new CompanyModel($this->dbService);
        $company = $companyModel->getCompany(['user_id' => $dealerId]);
        return $company;
    }

    /**
     * Creates company with location data
     *
     * @param int                                 $dealerId dealer ID
     * @param \Google_Service_MyBusiness_Location $location GMB location
     *
     * @return int|bool
     */
    private function createCompany(int $dealerId, \Google_Service_MyBusiness_Location $location)
    {
        $data = [
            'user_id'        => $dealerId,
            'business_name'  => $location->locationName,
            'street'         => (empty($location->address->addressLines[0]))
                ? '' : $location->address->addressLines[0],
            'address_line_2' => (empty($location->address->addressLines[1]))
                ? '' : $location->address->addressLines[1],
            'city'           => $location->address->locality,
            'state'          => $location->address->administrativeArea,
            'zip'            => $location->address->postalCode,
            'website'        => $location->websiteUrl,
            'phone'          => $location->primaryPhone,
            'email'          => '',
            'is_sync'        => 1,
        ];
        $companyModel = new CompanyModel($this->dbService);
        $companyId = $companyModel->insertCompany($data);
        return $companyId;
    }

    /**
     * Updates company with location data
     *
     * @param int                                 $companyId company ID
     * @param \Google_Service_MyBusiness_Location $location  GMB location
     *
     * @return int|bool
     */
    private function updateCompany(int $companyId, \Google_Service_MyBusiness_Location $location)
    {
        $data = [
            'id'             => $companyId,
            'business_name'  => $location->locationName,
            'street'         => (empty($location->address->addressLines[0]))
                ? '' : $location->address->addressLines[0],
            'address_line_2' => (empty($location->address->addressLines[1]))
                ? '' : $location->address->addressLines[1],
            'city'           => $location->address->locality,
            'state'          => $location->address->administrativeArea,
            'zip'            => $location->address->postalCode,
            'website'        => $location->websiteUrl,
            'phone'          => $location->primaryPhone,
            'opening_date'   => $this->getOpeningDate($location),
            'is_sync'        => 1,
        ];
        $companyModel = new CompanyModel($this->dbService);
        $companyId = $companyModel->updateCompany($data);
        return $companyId;
    }

    /**
     * Updates company's regular hours
     *
     * @param int                                      $companyId company ID
     * @param \Google_Service_MyBusiness_BusinessHours $hours     regular hours
     *
     * @return void
     */
    private function addCompanyHours(int $companyId, \Google_Service_MyBusiness_BusinessHours $hours)
    {
        $companyHoursModel = new CompanyHoursModel($this->dbService);
        $companyHoursModel->deleteCompanyRegularHours($companyId);
        foreach ($hours->periods as $period) {
            $data = [
                'company_id' => $companyId,
                'day'        => $period->openDay,
                'start'      => $period->openTime,
                'end'        => $period->closeTime,
            ];
            $companyHoursModel = new CompanyHoursModel($this->dbService);
            $companyHoursModel->insertCompanyHours($data);
        }
    }

    /**
     * Updates company's payment methods
     *
     * @param int   $companyId  company ID
     * @param array $attributes GMB location attributes
     *
     * @return void
     */
    private function addCompanyPaymentMethods(int $companyId, array $attributes)
    {
        $paymentMethods = [];
        foreach ($attributes as $attribute) {
            if ($attribute->attributeId === 'pay_credit_card_types_accepted') {
                $paymentMethods = array_merge(
                    $paymentMethods,
                    $attribute->repeatedEnumValue->setValues
                );
            } elseif ($attribute->attributeId === 'requires_cash_only') {
                $paymentMethods[] = 'cash';
            } elseif ($attribute->attributeId === 'pay_debit_card') {
                $paymentMethods[] = 'debit_card';
            }
        }
        $companyPaymentMethodModel = new CompanyPaymentMethodModel($this->dbService);
        $companyPaymentMethodModel->deleteCompanyPaymentMethods($companyId);
        foreach ($paymentMethods as $method) {
            $paymentMethodModel = new PaymentMethodModel($this->dbService);
            $paymentMethod = $paymentMethodModel->getPaymentMethod(['name' => $method]);
            if ($paymentMethod) {
                $data = [
                    'company_id' => $companyId,
                    'payment_method_id' => $paymentMethod->id
                ];
                $companyPaymentMethodModel = new CompanyPaymentMethodModel($this->dbService);
                $companyPaymentMethodModel->insertCompanyPaymentMethod($data);
            }
        }
    }

    /**
     * Updates company's description
     *
     * @param int    $companyId   company ID
     * @param string $description location description
     *
     * @return void
     */
    private function addCompanyDescription(int $companyId, string $description)
    {
        $companyInformationModel = new CompanyInformationModel($this->dbService);
        $information = $companyInformationModel->getCompanyInformation($companyId);
        $data = [
            'company_id' => $companyId,
            'business_description' => $description
        ];
        if ($information) {
            $companyInformationModel->updateCompanyInformation($data);
        } else {
            $data['business_tagline'] = null;
            $data['notes'] = null;
            $companyInformationModel->insertCompanyInformation($data);
        }
    }

    /**
     * Updates company's categories
     *
     * @param int   $companyId  company ID
     * @param array $categories service categories
     *
     * @return void
     */
    private function addCompanyCategories(int $companyId, array $categories)
    {
        $companyCategoriesModel = new CompaniesCategoriesModel(
            $this->dbService,
            $this->logger
        );
        $companyCategoriesModel->deleteCompanyCategories($companyId);

        foreach ($categories as $category) {
            $serviceCategoryModel = new GmbServiceCategoryModel(
                $this->dbService,
                $this->logger
            );
            $companyCategory = $serviceCategoryModel->getCategory(
                ['name' => $category->categoryId]
            );
            $insertData = [
                'company_id'  => $companyId,
                'category_id' => $companyCategory->id
            ];
            $companyCategoriesModel->insertCompanyCategory($insertData);
        }
    }

    /**
     * Inserts GMB pull record into DB.
     *
     * @param string $location     GMB location ID
     * @param string $instanceId   location ID|insight ID| review ID
     * @param string $instanceType 'insight'|'review'|'location'
     *
     * @return void
     */
    private function storePull(string $location, string $instanceId, string $instanceType)
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
        $pullModel = new GmbPullModel($this->getService('db'), $this->getService('logger'));
        $pullModel->insertPull($pull);
    }

    /**
     * Returns GMB location ID
     *
     * @param string $name GMB location full name
     *
     * @return string
     */
    private function getLocationId(string $name)
    {
        $position = strrpos($name, '/');
        $id = substr($name, $position + 1);
        return $id;
    }

    /**
     * Returns formatted opening date or null
     *
     * @param \Google_Service_MyBusiness_Location $location GMB location data
     *
     * @return string|null
     */
    private function getOpeningDate(\Google_Service_MyBusiness_Location $location)
    {
        if (empty($location->openInfo->openingDate)) {
            return null;
        }
        $date = new \DateTime();
        $date->setDate(
            $location->openInfo->openingDate['year'],
            $location->openInfo->openingDate['month'],
            $location->openInfo->openingDate['day']
        );
        $date = $date->format('Y-m-d');
        return $date;
    }
}
