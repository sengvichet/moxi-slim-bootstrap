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
use App\Models\Common\Gmb\GmbLocationDataModel;
use App\Models\Common\Gmb\GmbLocationAttributesModel;
use App\Models\Common\Gmb\GmbLocationCategoriesModel;
use App\Models\Common\Gmb\GmbLocationRegularHoursModel;
use App\Models\Common\Gmb\GmbLocationSpecialHoursModel;
use App\Models\Common\Gmb\GmbServiceCategoryModel;
use App\Models\Common\Gmb\GmbPullModel;
use \Google_Service_MyBusiness_Location as Location;

/**
 * This controller contains actions for the Google My Business page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class LocationsController extends ControllerAbstract
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
                    'message' => str_replace(':instance', 'Locations', $messages['failure'])
                ]
            );
        }

        $this->gmbService = $this->getService('gmb_api');
        if (!$this->gmbService->hasAccessToken()) {
            return $this->getResponse()->withJson(
                ['status'  => 'error', 'data' => ['url' => '/' . $routes['oauth']]]
            );
        }

        $accounts = $this->gmbService->getAccounts();
        if (!$accounts) {
            return $this->getResponse()->withJson(
                [
                    'status'  => 'error',
                    'message' => str_replace(':instance', 'Locations', $messages['failure'])
                ]
            );
        }
        $locations = $this->getLocations($accounts);
        if (!$locations) {
            return $this->getResponse()->withJson(
                [
                    'status'  => 'error',
                    'message' => str_replace(':instance', 'Locations', $messages['failure'])
                ]
            );
        }
        $statuses = $this->storeAccountsLocations($accounts, $locations);
        if (array_sum($statuses)) {
            return $this->getResponse()->withJson(
                [
                    'status'  => 'success',
                    'message' => str_replace(':instance', 'Locations', $messages['success'])
                ]
            );
        }
        return $this->getResponse()->withJson(
            [
                'status'  => 'info',
                'message' => str_replace(':instance', 'locations', $messages['info'])
            ]
        );
    }

    /**
     * Inserts GMB API data to DB.
     *
     * @param array $locations [<description>]
     *
     * @return array statuses of inserting each row
     */
    private function storeLocations(array $locations)
    {
        $data = ['organization_id' => $this->gmbService->getOrganizationId()];
        $dbService = $this->getService('db');
        $logger = $this->getService('logger');
        $statuses = [];
        foreach ($locations as $key => $row) {
            $data['account_id'] = $this->getIdFromName($row['account']->name);
            foreach ($row['locations'] as $location) {
                $data['location_id'] = $this->getIdFromName($location->name);
                $gmbLocationsModel = new GmbLocationModel($dbService, $logger);
                $statuses[$key] = $gmbLocationsModel->insertGmbLocation($data);
            }
        }
        return $statuses;
    }

    /**
     * Inserts GMB API data to DB.
     *
     * @param array $accounts  [GMB account]
     * @param array $locations [GMB location]
     *
     * @return array statuses of inserting each row
     */
    private function storeAccountsLocations(array $accounts, array $locations)
    {
        $dbService = $this->getService('db');
        $logger = $this->getService('logger');

        $data = ['organization_id' => $this->gmbService->getOrganizationId()];
        $statuses = [];
        foreach ($locations as $key => $row) {
            $data['account_id'] = $this->getIdFromName($row['account']->name);
            foreach ($accounts as $account) {
                if ($account->name == $row['account']->name) {
                    $data['account_name'] = $account->accountName;
                    break;
                }
            }
            foreach ($row['locations'] as $location) {
                $locationId = $this->getIdFromName($location->name);
                $data['location_id']   = $locationId;
                $data['location_name'] = $location->locationName;

                $gmbLocationsModel = new GmbLocationModel($dbService, $logger);
                $exists = $gmbLocationsModel->hasLocation($locationId);
                $statuses[$key] = ($exists)
                    ? $gmbLocationsModel->updateGmbLocation($locationId, $data)
                    : $gmbLocationsModel->insertGmbLocation($data);
                if ($statuses[$key]) {
                    $this->storePull($locationId, $locationId, 'location');
                }

                $this->storeLocationData($locationId, $location);
            }
        }
        return $statuses;
    }

    /**
     * Stores all location data into the DB
     *
     * @param string   $locationId GMB location ID
     * @param Location $location   GMB location
     *
     * @return void
     */
    private function storeLocationData(string $locationId, Location $location)
    {
        $dbService = $this->getService('db');
        $logger = $this->getService('logger');

        $locationData = $this->prepareLocationData($locationId, $location);
        $gmbLocationsDataModel = new GmbLocationDataModel($dbService, $logger);
        $exists = $gmbLocationsDataModel->hasLocationData($locationId);
        $status = ($exists)
            ? $gmbLocationsDataModel->updateLocationData($locationId, $locationData)
            : $gmbLocationsDataModel->insertLocationData($locationData);

        if (!empty($location->attributes)) {
            $this->storeLocationAttributes($locationId, $location->attributes);
        }

        if (!empty($location->primaryCategory)) {
            $this->storeLocationPrimaryCategory($locationId, $location->primaryCategory);
        }

        if (!empty($location->additionalCategories)) {
            $this->storeLocationAdditionalCategories($locationId, $location->additionalCategories);
        }

        if (!empty($location->regularHours->periods)) {
            $this->storeLocationRegularHours($locationId, $location->regularHours->periods);
        }

        if (!empty($location->specialHours->specialHourPeriods)) {
            $this->storeLocationSpecialHours($locationId, $location->specialHours->specialHourPeriods);
        }
    }

    /**
     * Stores location attributes
     *
     * @param string $locationId GMB location ID
     * @param array  $attributes location attributes
     *
     * @return void
     */
    private function storeLocationAttributes(string $locationId, array $attributes)
    {
        $dbService = $this->getService('db');
        $logger = $this->getService('logger');

        $attributesData = $this->prepareAttributesData($locationId, $attributes);
        $gmbLocationAttributesModel = new GmbLocationAttributesModel($dbService, $logger);
        $gmbLocationAttributesModel->deleteLocationAttributes($locationId);

        foreach ($attributesData as $attribute) {
            $gmbLocationAttributesModel = new GmbLocationAttributesModel($dbService, $logger);
            $gmbLocationAttributesModel->insertLocationAttribute($attribute);
        }
    }

    /**
     * Stores location primary category
     *
     * @param string                              $locationId      GMB location ID
     * @param \Google_Service_MyBusiness_Category $primaryCategory primary category
     *
     * @return void
     */
    private function storeLocationPrimaryCategory(string $locationId, \Google_Service_MyBusiness_Category $primaryCategory)
    {
        $dbService = $this->getService('db');
        $logger = $this->getService('logger');

        $categoriesModel = new GmbServiceCategoryModel($dbService, $logger);
        $category = $categoriesModel->getCategory(['name' => $primaryCategory->categoryId]);
        if (!$category) {
            return;
        }

        $locationCategoriesModel = new GmbLocationCategoriesModel($dbService, $logger);
        $locationCategoriesModel->deleteLocationPrimaryCategory($locationId);
        $locationCategoriesModel->insertLocationPrimaryCategory($locationId, $category->id);
    }

    /**
     * Stores location additional category
     *
     * @param string $locationId           GMB location ID
     * @param array  $additionalCategories additional categories
     *
     * @return void
     */
    private function storeLocationAdditionalCategories(string $locationId, array $additionalCategories)
    {
        $dbService = $this->getService('db');
        $logger = $this->getService('logger');

        $locationCategoriesModel = new GmbLocationCategoriesModel($dbService, $logger);
        $locationCategoriesModel->deleteLocationAdditionalCategories($locationId);

        foreach ($additionalCategories as $additionalCategory) {
            $this->storeLocationAdditionalCategory($locationId, $additionalCategory);
        }
    }

    /**
     * Stores location additional category
     *
     * @param string                              $locationId         GMB location ID
     * @param \Google_Service_MyBusiness_Category $additionalCategory additional category
     *
     * @return void
     */
    private function storeLocationAdditionalCategory(string $locationId, \Google_Service_MyBusiness_Category $additionalCategory)
    {
        $dbService = $this->getService('db');
        $logger = $this->getService('logger');

        $categoriesModel = new GmbServiceCategoryModel($dbService, $logger);
        $category = $categoriesModel->getCategory(['name' => $additionalCategory->categoryId]);
        if (!$category) {
            return;
        }

        $locationCategoriesModel = new GmbLocationCategoriesModel($dbService, $logger);
        $locationCategoriesModel->insertLocationAdditionalCategory($locationId, $category->id);
    }

    /**
     * Stores location regular hours
     *
     * @param string $locationId GMB location ID
     * @param array  $periods    regular hours periods
     *
     * @return void
     */
    private function storeLocationRegularHours(string $locationId, array $periods)
    {
        $dbService = $this->getService('db');
        $logger = $this->getService('logger');

        $locationRegularHoursModel = new GmbLocationRegularHoursModel($dbService, $logger);
        $locationRegularHoursModel->deleteLocationRegularHours($locationId);

        foreach ($periods as $period) {
            $insertData = [
                'location_id' => $locationId,
                'close_day'   => strtolower($period->closeDay),
                'close_time'  => $period->closeTime,
                'open_day'    => strtolower($period->openDay),
                'open_time'   => $period->openTime,
            ];
            $locationRegularHoursModel->insertLocationRegularHours($insertData);
        }
    }

    /**
     * Stores location special hours
     *
     * @param string $locationId GMB location ID
     * @param array  $periods    special hours periods
     *
     * @return void
     */
    private function storeLocationSpecialHours(string $locationId, array $periods)
    {
        $dbService = $this->getService('db');
        $logger = $this->getService('logger');

        $locationSpecialHoursModel = new GmbLocationSpecialHoursModel($dbService, $logger);
        $locationSpecialHoursModel->deleteLocationSpecialHours($locationId);

        foreach ($periods as $period) {
            $insertData = [
                'location_id' => $locationId,
                'is_closed'   => $period->isClosed,
                'open_time'   => (empty($period->openTime)) ? null : $period->openTime,
                'close_time'  => (empty($period->closeTime)) ? null : $period->closeTime,
                'start_date'  => empty($period->startDate) ? null : $this->transformGoogleDate($period->startDate),
                'end_date'    => empty($period->endDate) ? null : $this->transformGoogleDate($period->endDate),
            ];
            $locationSpecialHoursModel->insertLocationSpecialHours($insertData);
        }
    }

    /**
     * Fetches locations from GMB API.
     *
     * @param array $accounts GMB accounts
     *
     * @return array ['account' => GMBAccount, 'locations' => Collection]
     */
    private function getLocations($accounts)
    {
        $locations = [];
        foreach ($accounts as $account) {
            if (strtolower($account->role) === 'owner'
                && strtolower($account->type) === 'location_group'
            ) {
                $locations[] = [
                    'account'   => $account,
                    'locations' => $this->gmbService->getAccountLocations($account->name)
                ];
            }
        }
        return $locations;
    }

    /**
     * Captures numeric ID from GMB name
     *
     * @param string $name account or location anem
     *
     * @return string
     */
    private function getIdFromName(string $name)
    {
        $position = strrpos($name, '/') + 1;
        return substr($name, $position);
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
     * Prepares location data
     *
     * @param string   $locationId GMB location ID
     * @param Location $location   GMB location
     *
     * @return array
     */
    private function prepareLocationData(string $locationId, Location $location)
    {
        $data = [
            'location_id'    => $locationId,
            'location_name'  => $location->locationName,
            'primary_phone'  => $location->primaryPhone,
            'website_url'    => $location->websiteUrl,
            'description'    => (empty($location->profile['description']))
                ? null : $location->profile['description'],
            'open_status'    => $location->openInfo->status,
            'opening_date'   => $this->getOpeningDate($location),
            'maps_url'       => (empty($location->metadata->mapsUrl))
                ? null : $location->metadata->mapsUrl,
            'new_review_url' => (empty($location->metadata->newReviewUrl))
                ? null : $location->metadata->newReviewUrl,
            'address_line_1' => (empty($location->address->addressLines[0]))
                ? null : $location->address->addressLines[0],
            'address_line_2' => (empty($location->address->addressLines[1]))
                ? null : $location->address->addressLines[1],
            'city'           => $location->address->locality,
            'state'          => $location->address->administrativeArea,
            'postal_code'    => $location->address->postalCode,
            'region_code'    => $location->address->regionCode,
        ];
        return $data;
    }

    /**
     * Prepares GMB attributes for DB table
     *
     * @param string $locationId GMB location ID
     * @param array  $attributes location attributes
     *
     * @return array [[location_id => , attribute => , value => ]]
     */
    private function prepareAttributesData(string $locationId, array $attributes)
    {
        $data = [];
        foreach ($attributes as $attribute) {
            $data[] = [
                'location_id' => $locationId,
                'attribute'   => $attribute->attributeId,
                'value'       => $this->getAttributeValue($attribute),
            ];
        }
        return $data;
    }

    /**
     * Fetches attribute value
     *
     * @param \Google_Service_MyBusiness_Attribute $attribute GMB attribute
     *
     * @return string
     */
    private function getAttributeValue(\Google_Service_MyBusiness_Attribute $attribute)
    {
        $values = [];
        if ($attribute->valueType === 'URL') {
            foreach ($attribute->urlValues as $urlValue) {
                $values[] = $urlValue->url;
            }
        } elseif ($attribute->valueType === 'REPEATED_ENUM') {
            $values = $attribute->repeatedEnumValue->setValues;
        } else {
            $values = $attribute->values;
        }
        $value = implode(',', $values);
        return $value;
    }

    /**
     * Returns formatted opening date or null
     *
     * @param Location $location GMB location data
     *
     * @return string|null
     */
    private function getOpeningDate(Location $location)
    {
        if (empty($location->openInfo->openingDate)) {
            return null;
        }
        $date = $this->transformGoogleDate($location->openInfo->openingDate);
        return $date;
    }

    /**
     * Returns formatted date Y-m-d or null
     *
     * @param \Google_Service_MyBusiness_Date $gmbDate date
     *
     * @return string|null
     */
    private function transformGoogleDate(\Google_Service_MyBusiness_Date $gmbDate)
    {
        $date = new \DateTime();
        $date->setDate($gmbDate->year, $gmbDate->month, $gmbDate->day);
        $date = $date->format('Y-m-d');
        return $date;
    }
}
