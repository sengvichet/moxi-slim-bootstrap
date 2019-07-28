<?php
/**
 * This file contains admin's GmbLocationsController.
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
use App\Models\Common\Gmb\GmbLocationModel;
use App\Models\Common\Gmb\GmbLocationAttributesModel;
use App\Models\Common\Gmb\GmbLocationCategoriesModel;
use App\Models\Common\Gmb\GmbLocationDataModel;
use App\Models\Common\Gmb\GmbLocationRegularHoursModel;
use App\Models\Common\Gmb\GmbServiceCategoryModel;
use App\Models\Dealers\Company\CompanyModel;
use App\Models\Dealers\Company\CompaniesCategoriesModel;
use App\Models\Dealers\Company\CompanyHoursModel;
use App\Models\Dealers\Company\CompanyInformationModel;
use App\Models\Dealers\Company\CompanyPaymentMethodModel;
use App\Models\Dealers\PaymentMethodModel;

/**
 * This controller contains actions for the Google My Business page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class GmbLocationsController extends ControllerAbstract
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
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $this->dbService = $this->getService('db');
        $this->logger    = $this->getService('logger');

        $user   = $this->getService('session')->user;
        $config = $this->getService('config')->get();

        $companies = $this->getUpdatedCompaniesData();

        $dealersIds   = $this->getDealersIds(array_column($companies, 'company'));
        $accountsIds  = $this->getAccountsIds($dealersIds);
        $locationsIds = $this->getLocationsIds($accountsIds);

        $locations = $this->getUpdatedLocationsData($locationsIds);
        $discards = $this->getDiscards($locations, $companies);

        $request = $this->getRequest();
        $params  = $request->getParams();
        $location = (empty($params['location']))
            ? array_keys($locations)[0]
            : $params['location'];
        $company = (empty($params['location']))
            ? array_keys($companies)[0]
            : $this->getLocationCompany($params['location']);

        $action = [
            'home'   => $config['routes']['admin'],
            'gmb'    => $config['routes']['admin-gmb'],
            'update' => $config['routes']['admin-gmb-locations-update'],
        ];
        $messages = $this->getService('flash')->getMessages();
        foreach ($messages as $key => $value) {
            if (!empty($value)) {
                $messages[$key] = $value[0];
            }
        }

        $data = compact(
            'user', 'action', 'locations', 'companies', 'location', 'company',
            'messages', 'discards'
        );

        return $this->render('Admin/gmb/locations/index.twig', $data);
    }

    /**
     * Discards changes
     *
     * @return string
     */
    public function update()
    {
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return $this->goBack();
        }

        $data = $request->getParams();

        $this->dbService = $this->getService('db');
        $this->logger    = $this->getService('logger');

        $status = $this->discardData($data);
        ($status)
            ? $this->displayFormMessage('success')
            : $this->displayFormMessage('error');

        return $this->goBack();
    }

    /**
     * Returns data of GMB companies with updates
     *
     * @return array
     */
    private function getUpdatedCompaniesData()
    {
        $data = [];

        $companyModel = new CompanyModel($this->dbService);
        $companies = $companyModel->getGmbCompanies(['is_sync' => 0]);
        if (!$companies || $companies->isEmpty()) {
            return $data;
        }

        foreach ($companies as $company) {
            $data[$company->id] = [
                'company'         => $company,
                'categories'      => $this->getCompanyCategories($company->id),
                'hours'           => $this->getCompanyHours($company->id),
                'description'     => $this->getCompanyDescription($company->id),
                'payment_methods' => $this->getCompanyPaymentMethods($company->id),
            ];
        }

        return $data;
    }

    /**
     * Returns data of GMB locations with updates
     *
     * @param array $locationsIds locations IDs
     *
     * @return array
     */
    private function getUpdatedLocationsData(array $locationsIds)
    {
        $data = [];
        foreach ($locationsIds as $locationId) {
            $data[$locationId] = [
                'location'        => $this->getLocationData($locationId),
                'payment_methods' => $this->getLocationPaymentMethods($locationId),
                'categories'      => $this->getLocationCategories($locationId),
                'regular_hours'   => $this->getLocationRegularHours($locationId),
            ];
        }

        return $data;
    }

    /**
     * Returns company categories in readable format
     *
     * @param int $companyId company ID
     *
     * @return array
     */
    private function getCompanyCategories(int $companyId)
    {
        $categories = [];
        $companyCategoriesModel = new CompaniesCategoriesModel(
            $this->dbService,
            $this->logger
        );
        $companyCategories = $companyCategoriesModel->getCompanyCategories(
            $companyId
        );

        foreach ($companyCategories as $companyCategory) {
            $categoriesModel = new GmbServiceCategoryModel(
                $this->dbService, $this->logger
            );
            $category = $categoriesModel->getCategory(
                ['id' => $companyCategory->category_id]
            );
            if (!empty($category->title)) {
                $categories[] = $category->title;
            }
        }
        return $categories;
    }

    /**
     * Returns company hours
     *
     * @param int $companyId company ID
     *
     * @return array
     */
    private function getCompanyHours(int $companyId)
    {
        $companyHoursModel = new CompanyHoursModel($this->dbService);
        $hours = $companyHoursModel->getCompanyHours($companyId);
        return empty($hours) ? [] : $hours->toArray();
    }

    /**
     * Returns company description
     *
     * @param int $companyId company ID
     *
     * @return string
     */
    private function getCompanyDescription(int $companyId)
    {
        $companyInfoModel = new CompanyInformationModel($this->dbService);
        $companyInformation = $companyInfoModel->getCompanyInformation($companyId);
        return (empty($companyInformation->business_description))
            ? '' : $companyInformation->business_description;
    }

    /**
     * Returns company payment methods in readable format
     *
     * @param int $companyId company ID
     *
     * @return string
     */
    private function getCompanyPaymentMethods(int $companyId)
    {
        $companyPaymentMethods = [];

        $companyPaymentMethodModel = new CompanyPaymentMethodModel(
            $this->dbService
        );
        $companyMethods = $companyPaymentMethodModel->getCompanyPaymentMethods(
            $companyId
        );

        foreach ($companyMethods as $companyMethod) {
            $paymentMethodModel = new PaymentMethodModel($this->dbService);
            $method = $paymentMethodModel->getPaymentMethod(
                ['id' => $companyMethod->payment_method_id]
            );
            if (!empty($method->title)) {
                $companyPaymentMethods[] = $method->title;
            }
        }

        return $companyPaymentMethods;
    }

    /**
     * Returns location data
     *
     * @param string $locationId location ID
     *
     * @return Collection|bool
     */
    private function getLocationData(string $locationId)
    {
        $locationDataModel = new GmbLocationDataModel(
            $this->dbService,
            $this->logger
        );
        $locationData = $locationDataModel->getLocationData($locationId);
        return $locationData;
    }

    /**
     * Returns location payment methods in readable format
     *
     * @param string $locationId location ID
     *
     * @return array
     */
    private function getLocationPaymentMethods(string $locationId)
    {
        $paymentMethods = [];

        $locationAttributesModel = new GmbLocationAttributesModel(
            $this->dbService,
            $this->logger
        );
        $attributes = $locationAttributesModel->getLocationAttributes($locationId);
        if (!$attributes || $attributes->isEmpty()) {
            return $paymentMethods;
        }

        foreach ($attributes as $attribute) {
            if (!$attribute->value) {
                continue;
            }
            if ($attribute->attribute === 'requires_cash_only') {
                $paymentMethods[] = 'Cash';
            } elseif ($attribute->attribute === 'pay_check') {
                $paymentMethods[] = 'Check';
            } elseif ($attribute->attribute === 'pay_debit_card') {
                $paymentMethods[] = 'Debit Card';
            } elseif ($attribute->attribute === 'pay_credit_card_types_accepted') {
                $paymentMethods = array_merge(
                    $paymentMethods,
                    explode(',', $attribute->value)
                );
            }
        }
        return $paymentMethods;
    }

    /**
     * Returns location categories in readable format
     *
     * @param string $locationId location ID
     *
     * @return array
     */
    private function getLocationCategories(string $locationId)
    {
        $categories = [];

        $locationCategoriesModel = new GmbLocationCategoriesModel(
            $this->dbService,
            $this->logger
        );
        $locationCategories = $locationCategoriesModel->getLocationCategories(
            $locationId
        );
        if (!$locationCategories || $locationCategories->isEmpty()) {
            return $categories;
        }

        foreach ($locationCategories as $locationCategory) {
            $categoriesModel = new GmbServiceCategoryModel(
                $this->dbService, $this->logger
            );
            $category = $categoriesModel->getCategory(
                ['id' => $locationCategory->category_id]
            );
            if (!empty($category->title)) {
                $categories[] = $category->title;
            }
        }

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
        $locationHoursModel = new GmbLocationRegularHoursModel(
            $this->dbService,
            $this->logger
        );
        $hours = $locationHoursModel->getLocationRegularHours($locationId);
        return empty($hours) ? [] : $hours->toArray();
    }

    /**
     * Returns dealers IDs
     *
     * @param Collection $companies companies data
     *
     * @return array
     */
    private function getDealersIds(array $companies)
    {
        $dealersIds = [];
        foreach ($companies as $company) {
            $dealersIds[] = $company->user_id;
        }
        return $dealersIds;
    }

    /**
     * Returns dealers IDs
     *
     * @param array $dealersIds dealers IDs
     *
     * @return array
     */
    private function getAccountsIds(array $dealersIds)
    {
        $accountsIds = [];

        foreach ($dealersIds as $dealerId) {
            $dealerModel = new DealersGmbAccountsModel(
                $this->dbService,
                $this->logger
            );
            $account = $dealerModel->getAccountId($dealerId);
            if (!empty($account)) {
                $accountsIds[] = $account;
            }
        }

        return $accountsIds;
    }

    /**
     * Returns accounts IDs
     *
     * @param array $accountsIds accounts IDs
     *
     * @return array
     */
    private function getLocationsIds(array $accountsIds)
    {
        $locationsIds = [];

        foreach ($accountsIds as $accountId) {
            $locationModel = new GmbLocationModel(
                $this->dbService,
                $this->logger
            );
            $account = $locationModel->getAccount($accountId);
            if (!empty($account->location_id)) {
                $locationsIds[] = $account->location_id;
            }
        }

        return $locationsIds;
    }

    /**
     * Returns company ID by location ID
     *
     * @param string $locationId GMB location ID
     *
     * @return int|bool
     */
    private function getLocationCompany(string $locationId)
    {
        $companyModel = new CompanyModel($this->dbService);
        $companyId = $companyModel->getLocationCompany($locationId);
        return $companyId;
    }

    /**
     * Discards data
     *
     * @param array $data form data
     *
     * @return bool
     */
    private function discardData(array $data)
    {
        $function = 'discard' . $this->toCamelCase($data['field']);
        return call_user_func_array([$this, $function], [$data['location']]);
    }

    /**
     * Discards location name - business name
     *
     * @param string $locationId location ID
     *
     * @return bool
     */
    private function discardLocationName(string $locationId)
    {
        $companyId = $this->getLocationCompany($locationId);
        $location  = $this->getLocationData($locationId);

        $updateData = [
            'id'            => $companyId,
            'business_name' => $location->location_name,
        ];
        $companyModel = new CompanyModel($this->dbService);
        $status = $companyModel->updateCompany($updateData);
        return $status;
    }

    /**
     * Discards address line 1 - street
     *
     * @param string $locationId location ID
     *
     * @return bool
     */
    private function discardAddressLine1(string $locationId)
    {
        $companyId = $this->getLocationCompany($locationId);
        $location  = $this->getLocationData($locationId);

        $updateData = [
            'id'     => $companyId,
            'street' => $location->address_line_1,
        ];
        $companyModel = new CompanyModel($this->dbService);
        $status = $companyModel->updateCompany($updateData);
        return $status;
    }

    /**
     * Discards address line 2 - street
     *
     * @param string $locationId location ID
     *
     * @return bool
     */
    private function discardAddressLine2(string $locationId)
    {
        $companyId = $this->getLocationCompany($locationId);
        $location  = $this->getLocationData($locationId);

        $updateData = [
            'id'             => $companyId,
            'address_line_2' => $location->address_line_2,
        ];
        $companyModel = new CompanyModel($this->dbService);
        $status = $companyModel->updateCompany($updateData);
        return $status;
    }

    /**
     * Discards city
     *
     * @param string $locationId location ID
     *
     * @return bool
     */
    private function discardCity(string $locationId)
    {
        $companyId = $this->getLocationCompany($locationId);
        $location  = $this->getLocationData($locationId);

        $updateData = [
            'id'   => $companyId,
            'city' => $location->city,
        ];
        $companyModel = new CompanyModel($this->dbService);
        $status = $companyModel->updateCompany($updateData);
        return $status;
    }

    /**
     * Discards state
     *
     * @param string $locationId location ID
     *
     * @return bool
     */
    private function discardState(string $locationId)
    {
        $companyId = $this->getLocationCompany($locationId);
        $location  = $this->getLocationData($locationId);

        $updateData = [
            'id'   => $companyId,
            'state' => $location->state,
        ];
        $companyModel = new CompanyModel($this->dbService);
        $status = $companyModel->updateCompany($updateData);
        return $status;
    }

    /**
     * Discards postal code
     *
     * @param string $locationId location ID
     *
     * @return bool
     */
    private function discardPostalCode(string $locationId)
    {
        $companyId = $this->getLocationCompany($locationId);
        $location  = $this->getLocationData($locationId);

        $updateData = [
            'id'   => $companyId,
            'zip' => $location->postal_code,
        ];
        $companyModel = new CompanyModel($this->dbService);
        $status = $companyModel->updateCompany($updateData);
        return $status;
    }

    /**
     * Discards postal code
     *
     * @param string $locationId location ID
     *
     * @return bool
     */
    private function discardPrimaryPhone(string $locationId)
    {
        $companyId = $this->getLocationCompany($locationId);
        $location  = $this->getLocationData($locationId);

        $updateData = [
            'id'    => $companyId,
            'phone' => $location->primary_phone,
        ];
        $companyModel = new CompanyModel($this->dbService);
        $status = $companyModel->updateCompany($updateData);
        return $status;
    }

    /**
     * Discards website url
     *
     * @param string $locationId location ID
     *
     * @return bool
     */
    private function discardWebsiteUrl(string $locationId)
    {
        $companyId = $this->getLocationCompany($locationId);
        $location  = $this->getLocationData($locationId);

        $updateData = [
            'id'      => $companyId,
            'website' => $location->website_url,
        ];
        $companyModel = new CompanyModel($this->dbService);
        $status = $companyModel->updateCompany($updateData);
        return $status;
    }

    /**
     * Discards description
     *
     * @param string $locationId location ID
     *
     * @return bool
     */
    private function discardDescription(string $locationId)
    {
        $companyId = $this->getLocationCompany($locationId);
        $location  = $this->getLocationData($locationId);

        $updateData = [
            'company_id'           => $companyId,
            'business_description' => $location->description,
        ];
        $companyInformationModel = new CompanyInformationModel($this->dbService);
        $status = $companyInformationModel->updateCompanyInformation($updateData);
        return $status;
    }

    /**
     * Discards categories
     *
     * @param string $locationId location ID
     *
     * @return bool
     */
    private function discardCategories(string $locationId)
    {
        $companyId = $this->getLocationCompany($locationId);

        $locationCategoriesModel = new GmbLocationCategoriesModel(
            $this->dbService,
            $this->logger
        );
        $categories = $locationCategoriesModel->getLocationCategories($locationId);

        $companyCategoriesModel = new CompaniesCategoriesModel(
            $this->dbService,
            $this->logger
        );
        $companyCategoriesModel->deleteCompanyCategories($companyId);

        $status = true;

        foreach ($categories as $category) {
            $insertData = [
                'company_id'  => $companyId,
                'category_id' => $category->category_id,
            ];
            $status &= $companyCategoriesModel->insertCompanyCategory($insertData);
        }
        return $status;
    }

    /**
     * Discards regular hours
     *
     * @param string $locationId location ID
     *
     * @return bool
     */
    private function discardRegularHours(string $locationId)
    {
        $companyId = $this->getLocationCompany($locationId);

        $locationRegularHoursModel = new GmbLocationRegularHoursModel(
            $this->dbService,
            $this->logger
        );
        $hours = $locationRegularHoursModel->getLocationRegularHours($locationId);

        $companyHoursModel = new CompanyHoursModel($this->dbService);
        $companyHoursModel->deleteCompanyRegularHours($companyId);

        $status = true;

        foreach ($hours as $hour) {
            $insertData = [
                'company_id'  => $companyId,
                'day'         => $hour->open_day,
                'start'       => $hour->open_time,
                'end'         => $hour->close_time
            ];
            $status &= $companyHoursModel->insertCompanyHours($insertData);
        }
        return $status;
    }

    /**
     * Discards payment methods
     *
     * @param string $locationId location ID
     *
     * @return bool
     */
    private function discardPaymentMethods(string $locationId)
    {
        $companyId = $this->getLocationCompany($locationId);

        $locationAttributesModel = new GmbLocationAttributesModel(
            $this->dbService,
            $this->logger
        );
        $attributes = $locationAttributesModel->getLocationAttributes($locationId);

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

        $status = true;
        foreach ($paymentMethods as $method) {
            $paymentMethodModel = new PaymentMethodModel($this->dbService);
            $paymentMethod = $paymentMethodModel->getPaymentMethod(['name' => $method]);
            if ($paymentMethod) {
                $data = [
                    'company_id'        => $companyId,
                    'payment_method_id' => $paymentMethod->id
                ];
                $companyPaymentMethodModel = new CompanyPaymentMethodModel($this->dbService);
                $status &= $companyPaymentMethodModel->insertCompanyPaymentMethod($data);
            }
        }

        return $status;
    }

    /**
     * Transforms field_name to FieldName
     *
     * @param string $string string to transform
     *
     * @return transformed string
     */
    private function toCamelCase(string $string)
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
    }

    /**
     * Displays general form message
     *
     * @param string $status form processing status
     *
     * @return void
     */
    private function displayFormMessage(string $status)
    {
        $config = $this->getService('config')->get();
        $this->getService('flash')->addMessage(
            'message',
            [[
                'status' => $status,
                'text' => $config['messages']['admin_gmb_changes'][$status]
            ]]
        );
    }

    /**
     * Checks if location and company fields with array values differ
     *
     * @param array $locations locations data
     * @param array $companies companies data
     *
     * @return array
     */
    private function getDiscards(array $locations, array $companies)
    {
        $discards = [];
        foreach ($locations as $locationId => $location) {
            $companyId = $this->getLocationCompany($locationId);
            $discards[$locationId] = [
                'payment_methods' => $this->hasDifference(
                    $locations[$locationId]['payment_methods'],
                    $companies[$companyId]['payment_methods']
                ),
                'categories' => $this->hasDifference(
                    $locations[$locationId]['categories'],
                    $companies[$companyId]['categories']
                ),
                'hours' => $this->hasDifferenceHours(
                    $locations[$locationId]['regular_hours'],
                    $companies[$companyId]['hours']
                ),
            ];
        }
        return $discards;
    }

    private function hasDifference(array $locationData, array $companyData)
    {
        return !empty(
            array_merge(
                array_diff($locationData, $companyData),
                array_diff($companyData, $locationData)
            )
        );
    }

    private function hasDifferenceHours(array $locationHours, array $companyHours)
    {
        $intersected = 0;
        foreach ($locationHours as $locationHour) {
            foreach ($companyHours as $companyHour) {
                if ($locationHour->open_day === $companyHour->day
                    && $locationHour->open_time === $companyHour->start
                    && $locationHour->close_time === $companyHour->end
                ) {
                    $intersected++;
                    continue;
                }
            }
        }

        return ($intersected !== count($locationHours));
    }

    /**
     * Redirects user to the form page.
     *
     * @return Response
     */
    private function goBack()
    {
        $config = $this->getService('config')->get();
        $redirectUrl = '/' . $config['routes']['admin-gmb-locations'];
        return $this->getResponse()->withRedirect($redirectUrl, 301);
    }
}
