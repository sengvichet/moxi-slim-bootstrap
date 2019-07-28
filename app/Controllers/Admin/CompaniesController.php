<?php
/**
 * This file contains admin's CompaniesController.
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
use App\Models\Common\Gmb\DealersGmbAccountsModel;
use App\Models\Dealers\Company\CompanyModel;
use App\Models\Dealers\Company\CompanyContactModel;
use App\Models\Dealers\Company\CompanyHoursModel;
use App\Models\Dealers\Company\CompanyInformationModel;
use App\Models\Dealers\Company\CompanyPaymentMethodModel;
use App\Models\Dealers\Company\CompaniesCategoriesModel;
use App\Models\Dealers\PaymentMethodModel;
use App\Models\Common\Gmb\GmbLocationModel;
use App\Models\Common\Gmb\GmbLocationDataModel;
use App\Models\Common\Gmb\GmbLocationAttributesModel;
use App\Models\Common\Gmb\GmbLocationCategoriesModel;
use App\Models\Common\Gmb\GmbLocationRegularHoursModel;
use App\Models\Common\Gmb\GmbLocationSpecialHoursModel;
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
class CompaniesController extends ControllerAbstract
{
    /**
     * Handles form request.
     *
     * @param string $dealerId dealer ID
     *
     * @return string
     */
    public function store($dealerId)
    {
        $request  = $this->getRequest();
        $config   = $this->getService('config')->get();
        $routes   = $config['routes'];

        if (!$request->isXhr()) {
            return $this->getResponse()->withRedirect($routes['admin-dealers'], 301);
        }

        if (!$request->isPost()) {
            return $this->getMessage('error');
        }

        $this->dbService  = $this->getService('db');
        $this->logger     = $this->getService('logger');

        return $this->handleRequest((int) $dealerId);
    }

    /**
     * Handles create company request
     *
     * @param int $dealerId dealer ID
     *
     * @return string
     */
    private function handleRequest(int $dealerId)
    {
        $dealer = $this->getGmbDealer($dealerId);
        if (!$dealer) {
            return $this->getMessage('error');
        }

        $dealersLocations = [];
        $locations = $this->getLocations($dealer->account_id);
        foreach ($locations as $location) {
            $dealersLocations[$dealer->user_id][] = $location;
        }
        if (!$dealersLocations) {
            return $this->getMessage('error');
        }
        foreach ($dealersLocations as $dealerId => $locations) {
            foreach ($locations as $dealerLocation) {
                $locationData = $this->getLocationData($dealerLocation->location_id);
                $statuses[] = $this->createDealerCompany($dealerId, $locationData);
            }
        }

        return (array_sum($statuses))
            ? $this->getMessage('success') : $this->getMessage('error');
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
     * Get dealer by ID
     *
     * @param int $dealerId dealer ID
     *
     * @return \Illuminate\Support\Collection
     */
    private function getGmbDealer(int $dealerId)
    {
        $dealerModel = new DealersGmbAccountsModel($this->dbService, $this->logger);
        $dealer = $dealerModel->getGmbDealer($dealerId);
        return $dealer;
    }

    /**
     * Returns all location data
     *
     * @param string $locationId location ID
     *
     * @return array
     */
    private function getLocationData(string $locationId)
    {
        $data = [
            'location'      => $this->getLocationBasicData($locationId),
            'attributes'    => $this->getLocationAttributes($locationId),
            'categories'    => $this->getLocationCategories($locationId),
            'regular_hours' => $this->getLocationRegularHours($locationId),
            'special_hours' => $this->getLocationSpecialHours($locationId),
        ];
        return $data;
    }

    /**
     * Returns basic location data
     *
     * @param string $locationId location ID
     *
     * @return Collection|bool
     */
    private function getLocationBasicData(string $locationId)
    {
        $locationDataModel = new GmbLocationDataModel(
            $this->dbService,
            $this->logger
        );
        $data = $locationDataModel->getLocationData($locationId);
        return $data;
    }

    /**
     * Returns location attributes
     *
     * @param string $locationId location ID
     *
     * @return Collection|bool
     */
    private function getLocationAttributes(string $locationId)
    {
        $locationAttributesModel = new GmbLocationAttributesModel(
            $this->dbService,
            $this->logger
        );
        $attributes = $locationAttributesModel->getLocationAttributes($locationId);
        return $attributes;
    }

    /**
     * Returns location categories
     *
     * @param string $locationId location ID
     *
     * @return Collection|bool
     */
    private function getLocationCategories(string $locationId)
    {
        $locationCategoriesModel = new GmbLocationCategoriesModel(
            $this->dbService,
            $this->logger
        );
        $categories = $locationCategoriesModel->getLocationCategories($locationId);
        return $categories;
    }

    /**
     * Returns location regular hours
     *
     * @param string $locationId location ID
     *
     * @return Collection|bool
     */
    private function getLocationRegularHours(string $locationId)
    {
        $locationRegularHoursModel = new GmbLocationRegularHoursModel(
            $this->dbService,
            $this->logger
        );
        $hours = $locationRegularHoursModel->getLocationRegularHours($locationId);
        return $hours;
    }

    /**
     * Returns location special hours
     *
     * @param string $locationId location ID
     *
     * @return Collection|bool
     */
    private function getLocationSpecialHours(string $locationId)
    {
        $locationSpecialHoursModel = new GmbLocationSpecialHoursModel(
            $this->dbService,
            $this->logger
        );
        $hours = $locationSpecialHoursModel->getLocationSpecialHours($locationId);
        return $hours;
    }

    /**
     * Creates a company with location data in the DB
     *
     * @param int   $dealerId     dealer ID
     * @param array $locationData ['location' => ,
     *                            'attributes' => ,
     *                            'categories' => ,
     *                            'regular_hours' => ,
     *                            'special_hours' => ,]
     *
     * @return bool
     */
    private function createDealerCompany(int $dealerId, array $locationData)
    {
        $companyId = $this->createCompany($dealerId, $locationData['location']);
        if (!$companyId) {
            return false;
        }
        if (!empty($locationData['location']->description)) {
            $this->addCompanyDescription($companyId, $locationData['location']->description);
        }
        if (!empty($locationData['regular_hours'])) {
            $this->addCompanyHours($companyId, $locationData['regular_hours']);
        }
        if (!empty($locationData['attributes'])) {
            $this->addCompanyPaymentMethods($companyId, $locationData['attributes']);
        }
        if (!empty($locationData['categories'])) {
            $this->addCompanyCategories($companyId, $locationData['categories']);
        }

        return true;
    }

    /**
     * Creates company with location data
     *
     * @param int    $dealerId dealer ID
     * @param object $location GMB location
     *
     * @return int|bool
     */
    private function createCompany(int $dealerId, $location)
    {
        $data = [
            'user_id'        => $dealerId,
            'business_name'  => $location->location_name,
            'street'         => $location->address_line_1,
            'address_line_2' => $location->address_line_2,
            'city'           => $location->city,
            'state'          => $location->state,
            'zip'            => $location->postal_code,
            'website'        => $location->website_url,
            'phone'          => $location->primary_phone,
            'email'          => '',
            'is_sync'        => 1,
        ];
        $companyModel = new CompanyModel($this->dbService);
        $companyId = $companyModel->insertCompany($data);
        return $companyId;
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
        $data = [
            'company_id'           => $companyId,
            'business_description' => $description,
            'business_tagline'     => null,
            'notes'                => null
        ];
        $companyInformationModel->insertCompanyInformation($data);
    }

    /**
     * Updates company's regular hours
     *
     * @param int    $companyId company ID
     * @param object $hours     regular hours
     *
     * @return void
     */
    private function addCompanyHours(int $companyId, $hours)
    {
        $companyHoursModel = new CompanyHoursModel($this->dbService);
        $companyHoursModel->deleteCompanyRegularHours($companyId);
        foreach ($hours as $period) {
            $data = [
                'company_id' => $companyId,
                'day'        => $period->open_day,
                'start'      => $period->open_time,
                'end'        => $period->close_time,
            ];
            $companyHoursModel = new CompanyHoursModel($this->dbService);
            $companyHoursModel->insertCompanyHours($data);
        }
    }

    /**
     * Updates company's payment methods
     *
     * @param int    $companyId  company ID
     * @param object $attributes GMB location attributes
     *
     * @return void
     */
    private function addCompanyPaymentMethods(int $companyId, $attributes)
    {
        $paymentMethods = [];
        foreach ($attributes as $attribute) {
            if ($attribute->value) {
                if ($attribute->attribute === 'pay_credit_card_types_accepted') {
                    $paymentMethods = array_merge(
                        $paymentMethods,
                        explode(',', $attribute->value)
                    );
                } elseif ($attribute->attribute === 'requires_cash_only') {
                    $paymentMethods[] = 'cash';
                } elseif ($attribute->attribute === 'pay_debit_card') {
                    $paymentMethods[] = 'debit_card';
                }
            }
        }

        $companyPaymentMethodModel = new CompanyPaymentMethodModel($this->dbService);
        $companyPaymentMethodModel->deleteCompanyPaymentMethods($companyId);
        foreach ($paymentMethods as $method) {
            $paymentMethodModel = new PaymentMethodModel($this->dbService);
            $paymentMethod = $paymentMethodModel->getPaymentMethod(['name' => $method]);
            if ($paymentMethod) {
                $data = [
                    'company_id'        => $companyId,
                    'payment_method_id' => $paymentMethod->id
                ];
                $companyPaymentMethodModel = new CompanyPaymentMethodModel($this->dbService);
                $companyPaymentMethodModel->insertCompanyPaymentMethod($data);
            }
        }
    }

    /**
     * Updates company's categories
     *
     * @param int    $companyId  company ID
     * @param object $categories service categories
     *
     * @return void
     */
    private function addCompanyCategories(int $companyId, $categories)
    {
        $companyCategoriesModel = new CompaniesCategoriesModel(
            $this->dbService,
            $this->logger
        );
        $companyCategoriesModel->deleteCompanyCategories($companyId);

        foreach ($categories as $category) {
            $insertData = [
                'company_id'  => $companyId,
                'category_id' => $category->category_id
            ];
            $companyCategoriesModel->insertCompanyCategory($insertData);
        }
    }

    /**
     * Returns JSON message response
     *
     * @param string $status message status
     *
     * @return string
     */
    private function getMessage(string $status)
    {
        $config   = $this->getService('config')->get();
        $messages = $config['messages']['admin_companies'];
        return $this->getResponse()->withJson(
            ['status'  => $status, 'message' => $messages[$status]]
        );
    }
}
