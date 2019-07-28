<?php
/**
 * This file contains portal's ContactInformationController.
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
namespace App\Controllers\Dealers\CompanyProfile;

use App\Kernel\Slim\App;
use App\Controllers\Dealers\CompanyProfile\CompanyProfileController;
use App\Models\Dealers\Company\CompanyModel;
use App\Models\Dealers\Company\CompanyContactModel;
use App\Models\Dealers\Company\CompaniesCategoriesModel;

/**
 * This controller contains actions for the Contact Information page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class ContactInformationController extends CompanyProfileController
{
    /**
     * Stores form data.
     *
     * @return string
     */
    public function store()
    {
        $request = $this->getRequest();

        if (!$request->isPost()) {
            return $this->goBack();
        }
        $this->displayTab('contact-information');
        $config = $this->getService('config')->get();
        $data = $request->getParams();

        $errors = $this->validateData($data);
        if (!empty($errors['count'])) {
            $this->displayFormInput($data);
            $this->displayFormErrors($errors);
            $this->getService('flash')->addMessage(
                'message',
                [[
                    'status' => 'error',
                    'text' => $config['messages']['contact_information']['failure']
                ]]
            );
            return $this->goBack();
        }

        $data['user_id'] = $this->getService('session')->user['id'];
        $status = $this->storeData($data);
        if (!$status) {
            $this->getService('flash')->addMessage(
                'message',
                [[
                    'status' => 'error',
                    'text' => $config['messages']['contact_information']['failure']
                ]]
            );
        }

        $locations = $this->getGmbLocations($data['user_id']);
        if ($locations && $locations->isNotEmpty()) {
            $location['location_id'] = $locations->first()->location_id;
            $location['location_update_time'] = gmdate('Y-m-d H:i:s');
            $this->getService('event')->emit(
                'gmb.location',
                ['container' => $this->getContainer(), 'instance' => $location]
            );
        }

        $this->getService('flash')->addMessage(
            'message',
            [[
                'status' => 'success',
                'text' => $config['messages']['contact_information']['success']
            ]]
        );
        return $this->goBack();
    }

    /**
     * Stores form data sent with XHR request.
     *
     * @return string
     */
    public function storeAjax()
    {
        $request = $this->getRequest();

        if (!$request->isXhr()) {
            return $this->goBack();
        }

        if (!$request->isPost()) {
            return $this->getAjaxResponse('error');
        }

        $data = $request->getParams();
        $errors = $this->validateData($data);
        if (!empty($errors['count'])) {
            return $this->getAjaxResponse('error', $data, $errors);
        }
        $config = $this->getService('config')->get();

        $data['user_id'] = $this->getService('session')->user['id'];
        $status = $this->storeData($data);
        if (!$status) {
            $error = $config['errors']['not_saved'];
            return $this->getAjaxResponse('error', null, [$error]);
        }

        return $this->getAjaxFileResponse('success');
    }

    /**
     * Updates GMB data
     *
     * @return string
     */
    public function updateGmb()
    {
        $request = $this->getRequest();

        if (!$request->isXhr()) {
            return $this->goBack();
        }

        if (!$request->isPost()) {
            return $this->getAjaxResponse('error');
        }

        $data = $request->getParams();

        $this->dbService  = $this->getService('db');
        $this->logger     = $this->getService('logger');
        $this->gmbService = $this->getService('gmb_api');
        $config = $this->getService('config')->get();
        $routes = $config['routes'];
        $messages = $config['messages']['dealer_gmb'];

        if (!$this->gmbService->hasAccessToken()) {
            $this->getService('session')->redirect_url = '/' . $routes[$data['url']];
            return $this->getAjaxResponse('error', ['url' => '/' . $routes['oauth']]);
        }

        $userId = $this->getService('session')->user['id'];

        $locations = $this->getGmbLocations($userId);
        $statuses = [];
        if ($locations) {
            $updateData = $this->getUpdateGmbData($userId);
            foreach ($locations as $location) {
                $statuses[] = $this->updateGmbData($location, $updateData);
            }
        }

        if (array_sum($statuses)) {
            return $this->getAjaxResponse(
                'success',
                ['message' => str_replace(
                    ':instance',
                    'Contact information fields',
                    $messages['success']
                )]
            );
        }
        $errors = [str_replace(
            ':instance',
            'Contact information fields',
            $messages['error']
        )];
        return $this->getAjaxResponse('error', null, $errors);
    }

    /**
     * Stores company and contact data.
     *
     * @param array $data form data
     *
     * @return bool
     */
    private function storeData(array $data)
    {
        if (empty($data['company_id'])) {
            $companyId = $this->storeCompany($data);
        } elseif ($this->updateCompany($data)) {
            $companyId = $data['company_id'];
        }
        if (!$companyId) {
            return false;
        }

        $primaryContactId = (empty($data['primary_contact_id']))
            ? $this->storePrimaryContact($data, $companyId)
            : $this->updatePrimaryContact($data);
        $additionalContactsIds = $this->storeAdditionalContacts($data, $companyId);

        $this->storeCompanyCategories($data, $companyId);
        $status = $companyId && $primaryContactId && array_product($additionalContactsIds);
        return $status;
    }

    /**
     * Stores company data.
     *
     * @param array $data form data
     *
     * @return int | bool
     */
    private function storeCompany(array $data)
    {
        $companyModel = new CompanyModel($this->getService('db'));
        $companyData = [
            'user_id'       => $data['user_id'],
            'business_name' => $data['business_name'],
            'brand_name'    => $data['brand_name'],
            'street'        => $data['street_address'],
            'address_line_2'=> $data['address_line_2'],
            'city'          => $data['city'],
            'state'         => $data['state'],
            'zip'           => $data['zip_code'],
            'website'       => $data['website'],
            'phone'         => $data['company_phone'],
            'email'         => $data['company_email'],
            'opening_date'  => $data['opening_date'],
            'is_sync'       => 0,
        ];
        $id = $companyModel->insertCompany($companyData);
        return $id;
    }

    /**
     * Stores primary contact data.
     *
     * @param array $data      primary contact data
     * @param int   $companyId company id
     *
     * @return int | bool
     */
    private function storePrimaryContact(array $data, int $companyId)
    {
        $companyContactModel = new CompanyContactModel($this->getService('db'));
        $primaryContactData = [
            'company_id'    => $companyId,
            'first_name'    => $data['primary_contact_first_name'],
            'last_name'     => $data['primary_contact_last_name'],
            'position'      => $data['primary_contact_position'],
            'email'         => $data['primary_contact_email'],
            'mobile_number' => $data['primary_contact_mobile_number'],
            'is_primary'    => 1,
        ];
        $id = $companyContactModel->insertCompanyContact($primaryContactData);
        return $id;
    }

    /**
     * Stores additional contacts data.
     *
     * @param array $data      primary contact data
     * @param int   $companyId company id
     *
     * @return array
     */
    private function storeAdditionalContacts(array $data, int $companyId)
    {
        $contactsIds = [];
        if (empty($data['additional_contact_id'])) {
            return $contactsIds;
        }

        $dbService = $this->getService('db');
        $additionalContactData = [];
        foreach ($data['additional_contact_id'] as $key => $value) {
            if ($value) {
                $additionalContactData[$key]['id'] = $value;
            }
            $additionalContactData[$key]['first_name']
                = $data['additional_contact_first_name'][$key];
            $additionalContactData[$key]['last_name']
                = $data['additional_contact_last_name'][$key];
            $additionalContactData[$key]['position']
                = $data['additional_contact_position'][$key];
            $additionalContactData[$key]['email']
                = $data['additional_contact_email'][$key];
            $additionalContactData[$key]['mobile_number']
                = $data['additional_contact_mobile_number'][$key];
            $additionalContactData[$key]['is_primary'] = 0;
            $additionalContactData[$key]['company_id'] = $companyId;
            $companyContactModel = new CompanyContactModel($dbService);
            $contactsIds[] = ($value)
                ? $companyContactModel->updateCompanyContact($additionalContactData[$key])
                : $companyContactModel->insertCompanyContact($additionalContactData[$key]);
        }
        return $contactsIds;
    }

    /**
     * Stores company categories data.
     *
     * @param array $data      categories data
     * @param int   $companyId company id
     *
     * @return array
     */
    private function storeCompanyCategories(array $data, int $companyId)
    {
        if (empty($data['categories'])) {
            return false;
        }

        $dbService = $this->getService('db');
        $companyCategoriesModel = new CompaniesCategoriesModel(
            $dbService,
            $this->getService('logger')
        );
        $companyCategoriesModel->deleteCompanyCategories($companyId);

        $categories = explode(',', $data['categories']);
        foreach ($categories as $category) {
            $insertData = [
                'category_id' => $category,
                'company_id'  => $companyId
            ];
            $companyCategoriesModel->insertCompanyCategory($insertData);
        }
        return true;
    }

    /**
     * Updates company data.
     *
     * @param array $data form data
     *
     * @return bool
     */
    private function updateCompany(array $data)
    {
        $companyModel = new CompanyModel($this->getService('db'));
        $companyData = [
            'id'            => $data['company_id'],
            'business_name' => $data['business_name'],
            'brand_name'    => $data['brand_name'],
            'street'        => $data['street_address'],
            'address_line_2'=> $data['address_line_2'],
            'city'          => $data['city'],
            'state'         => $data['state'],
            'zip'           => $data['zip_code'],
            'website'       => $data['website'],
            'phone'         => $data['company_phone'],
            'email'         => $data['company_email'],
            'opening_date'  => $data['opening_date'],
            'is_sync'       => 0,
        ];
        $status = $companyModel->updateCompany($companyData);
        return $status;
    }

    /**
     * Updates primary contact data.
     *
     * @param array $data primary contact data
     *
     * @return bool
     */
    private function updatePrimaryContact(array $data)
    {
        $companyContactModel = new CompanyContactModel($this->getService('db'));
        $primaryContactData = [
            'id'            => $data['primary_contact_id'],
            'first_name'    => $data['primary_contact_first_name'],
            'last_name'     => $data['primary_contact_last_name'],
            'position'      => $data['primary_contact_position'],
            'email'         => $data['primary_contact_email'],
            'mobile_number' => $data['primary_contact_mobile_number'],
        ];
        $status = $companyContactModel->updateCompanyContact($primaryContactData);
        return $status;
    }

    /**
     * Validates form data.
     *
     * @param array $data form data
     *
     * @return array array with errors
     */
    private function validateData(array $data)
    {
        $errors = [
            'company' => [],
            'primary_contact' => [],
            'additional_contact' => [],
            'count' => 0
        ];
        $this->validateCompanyData($data, $errors);
        $this->validatePrimaryContactData($data, $errors);
        $this->validateAdditionalContactsData($data, $errors);
        return $errors;
    }

    /**
     * Validates company form data.
     *
     * @param array $data       company form data
     * @param array $formErrors errors
     *
     * @return void
     */
    private function validateCompanyData(array $data, array &$formErrors)
    {
        $formErrorsService = $this->getService('formErrors');

        $fieldsValidation = [
            'business_name'  => ['empty', 'max_length'],
            'brand_name'     => ['empty', 'max_length'],
            'street_address' => ['empty', 'max_length'],
            'address_line_2' => ['max_length'],
            'city'           => ['empty', 'max_length'],
            'state'          => ['empty', 'max_length'],
            'zip_code'       => ['empty', 'max_length'],
            'website'        => ['empty', 'max_length', 'url'],
            'company_phone'  => ['empty', 'max_length'],
            'company_email'  => ['empty', 'email'],
            'opening_date'   => ['date'],
        ];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $formErrors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data,
                    ['form' => 'company', 'field' => $field],
                    &$formErrors['company']]
                );
            }
        }
    }

    /**
     * Validates primary contact form data.
     *
     * @param array $data       primary contact form data
     * @param array $formErrors errors
     *
     * @return void
     */
    private function validatePrimaryContactData(array $data, array &$formErrors)
    {
        $formErrorsService = $this->getService('formErrors');

        $fieldsValidation = [
            'primary_contact_first_name'    => ['empty', 'max_length'],
            'primary_contact_last_name'     => ['empty', 'max_length'],
            'primary_contact_position'      => ['empty', 'max_length'],
            'primary_contact_email'         => ['empty', 'email'],
            'primary_contact_mobile_number' => ['max_length'],
        ];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $formErrors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data,
                    ['form' => 'contact', 'field' => $field],
                    &$formErrors['primary_contact']]
                );
            }
        }
    }

    /**
     * Validates additional contact form data.
     *
     * @param array $data       primary contact form data
     * @param array $formErrors errors
     *
     * @return void
     */
    private function validateAdditionalContactsData(array $data, array &$formErrors)
    {
        $formErrorsService = $this->getService('formErrors');

        $fieldsValidation = [
            'additional_contact_first_name'    => ['empty', 'max_length'],
            'additional_contact_last_name'     => ['empty', 'max_length'],
            'additional_contact_position'      => ['empty', 'max_length'],
            'additional_contact_email'         => ['empty', 'email'],
            'additional_contact_mobile_number' => ['max_length'],
        ];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                if (empty($data[$field])) {
                    continue;
                }
                foreach ($data[$field] as $key => $value) {
                    if (!in_array($key, array_keys($formErrors['additional_contact']))) {
                        $formErrors['additional_contact'][$key] = [];
                    }
                    $formErrors['count'] += call_user_func_array(
                        [$formErrorsService, $function],
                        [[$field => $value],
                        ['form' => 'contact', 'field' => $field],
                        &$formErrors['additional_contact'][$key]]
                    );
                }
            }
        }
    }

    /**
     * Returns prepared data for GMB update
     *
     * @param int $userId dealer's ID
     *
     * @return array
     */
    private function getUpdateGmbData(int $userId)
    {
        $updateData = [];
        if (!$userId) {
            return $updateData;
        }

        $companyModel = new CompanyModel($this->dbService);
        $updateData['company'] = $companyModel->getCompany(['user_id' => $userId]);

        $companyContactModel = new CompanyContactModel($this->dbService);
        $updateData['company_contacts'] = $companyContactModel->getCompanyContacts(
            ['company_id' => $updateData['company']->id]
        );

        return $updateData;
    }

    /**
     * Updates GMB locations
     *
     * @param mixed $location GMB location ID
     * @param array $data     company's data
     *
     * @return bool
     */
    private function updateGmbData($location, array $data)
    {
        $updateData = [
            'location'         => $location,
            'company'          => $data['company'],
            'company_contacts' => $data['company_contacts'],
        ];
        $status = $this->gmbService->updateLocationInformation($updateData);
        return $status;
    }
}
