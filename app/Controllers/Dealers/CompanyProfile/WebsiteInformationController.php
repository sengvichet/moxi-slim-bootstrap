<?php
/**
 * This file contains portal's WebsiteInformationController.
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
use App\Models\Dealers\Company\WebsiteInformation\CompanyWebsiteInformationModel;
use App\Models\Dealers\Company\WebsiteInformation\CompanyEmailInformationModel;
use App\Models\Dealers\Company\WebsiteInformation\CompanyNewslettersInformationModel;
use App\Models\Dealers\Company\WebsiteInformation\CompanyWebsiteLiveInformationModel;

/**
 * This controller contains actions for the Contact Information page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class WebsiteInformationController extends CompanyProfileController
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
        $this->displayTab('website-information');

        $data = $request->getParams();
        $errors = $this->validateData($data);
        if (!empty($errors['count'])) {
            $this->displayFormInput($data);
            $this->displayFormErrors($errors);
            $this->displayFormMessage('error');
            return $this->goBack();
        }

        $data['user_id'] = $this->getService('session')->user['id'];
        $status = $this->storeData($data);
        ($status)
            ? $this->displayFormMessage('success')
            : $this->displayFormMessage('error');

        $locations = $this->getGmbLocations($data['user_id']);
        if ($locations && $locations->isNotEmpty()) {
            $location['location_id'] = $locations->first()->location_id;
            $location['location_update_time'] = gmdate('Y-m-d H:i:s');
            $this->getService('event')->emit(
                'gmb.location',
                ['container' => $this->getContainer(), 'instance' => $location]
            );
        }

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

        $data['user_id'] = $this->getService('session')->user['id'];
        $status = $this->storeData($data);
        if (!$status) {
            $error = $this->getService('config')->get()['errors']['not_saved'];
            return $this->getAjaxResponse('error', null, [$error]);
        }
        return $this->getAjaxFileResponse('success');
    }

    /**
     * Stores website information data.
     *
     * @param array $data form data
     *
     * @return bool
     */
    private function storeData(array $data)
    {
        $this->dbService = $this->getService('db');
        $this->logger    = $this->getService('logger');

        if (empty($data['company_id'])) {
            $data['company_id'] = $this->storeUserCompany($data['user_id']);
        }

        $status = $this->updateCompanyInformationData($data);
        $status &= $this->updateWebsiteInformationData($data);
        $status &= $this->updateEmailInformationData($data);
        $status &= $this->updateNewslettersData($data);
        $status &= $this->updateWebsiteLiveInformationData($data);
        return $status;
    }

    /**
     * Stores company information data.
     *
     * @param array $data form data
     *
     * @return bool
     */
    private function updateCompanyInformationData(array $data)
    {
        $updateData = [
            'id'             => $data['company_id'],
            'website'        => $data['website_url'],
            'phone'          => $data['website_phone'],
            'street'         => $data['website_street'],
            'address_line_2' => $data['website_address_line_2'],
            'city'           => $data['website_city'],
            'state'          => $data['website_state'],
            'zip'            => $data['website_zip'],
        ];
        $companyModel = new CompanyModel($this->dbService);
        $status = $companyModel->updateCompany($updateData);
        return $status;
    }

    /**
     * Stores website information data.
     *
     * @param array $data form data
     *
     * @return bool
     */
    private function updateWebsiteInformationData(array $data)
    {
        $websiteInformationModel = new CompanyWebsiteInformationModel(
            $this->dbService,
            $this->logger
        );
        $websiteInformationModel->deleteCompanyWebsiteInformation(
            $data['company_id']
        );

        $insertData = [
            'company_id' => $data['company_id'],
            'url'        => $data['website_url'],
            'name'       => $data['website_name'],
            'phone'      => $data['website_phone'],
            'address'    => $data['website_address'],
            'email'      => $data['website_email'],
            // 'contact_it' => $data['contact_it'],
        ];
        $websiteInformationModel = new CompanyWebsiteInformationModel(
            $this->dbService,
            $this->logger
        );
        $status = $websiteInformationModel->insertCompanyWebsiteInformation(
            $insertData
        );
        return $status;
    }

    /**
     * Stores email information data.
     *
     * @param array $data form data
     *
     * @return bool
     */
    private function updateEmailInformationData(array $data)
    {
        $emailInformationModel = new CompanyEmailInformationModel(
            $this->dbService,
            $this->logger
        );
        $emailInformationModel->deleteCompanyEmailInformation(
            $data['company_id']
        );

        $insertData = [
            'company_id' => $data['company_id'],
            'host'       => $data['email_host'],
            'login'      => $data['email_login'],
            'password'   => $data['email_password'],
            'email'      => $data['email_email'],
            'port'       => $data['email_port'],
            'protocol'   => $data['email_protocol'],
        ];
        $emailInformationModel = new CompanyEmailInformationModel(
            $this->dbService,
            $this->logger
        );
        $status = $emailInformationModel->insertCompanyEmailInformation(
            $insertData
        );
        return $status;
    }

    /**
     * Stores newsletters information data.
     *
     * @param array $data form data
     *
     * @return bool
     */
    private function updateNewslettersData(array $data)
    {
        $newslettersInformationModel = new CompanyNewslettersInformationModel(
            $this->dbService,
            $this->logger
        );
        $newslettersInformationModel->deleteCompanyNewslettersInformation(
            $data['company_id']
        );

        $insertData = [
            'company_id' => $data['company_id'],
            'api_key'    => $data['mailchimp_api_key'],
            'list'       => $data['mailchimp_list'],
        ];
        $newslettersInformationModel = new CompanyNewslettersInformationModel(
            $this->dbService,
            $this->logger
        );
        $status = $newslettersInformationModel->insertCompanyNewslettersInformation(
            $insertData
        );
        return $status;
    }

    /**
     * Stores website live information data.
     *
     * @param array $data form data
     *
     * @return bool
     */
    private function updateWebsiteLiveInformationData(array $data)
    {
        $websiteLiveInformationModel = new CompanyWebsiteLiveInformationModel(
            $this->dbService,
            $this->logger
        );
        $websiteLiveInformationModel->deleteCompanyWebsiteLiveInformation(
            $data['company_id']
        );

        $insertData = [
            'company_id'      => $data['company_id'],
            'need_contact_it' => (empty($data['live_need_contact'])) ? 0 : 1,
            'domain_host'     => $data['live_domain_host'],
            'username'        => $data['live_website_username'],
            'password'        => $data['live_website_password'],
        ];
        $websiteLiveModel = new CompanyWebsiteLiveInformationModel(
            $this->dbService,
            $this->logger
        );
        $status = $websiteLiveModel->insertCompanyWebsiteLiveInformation(
            $insertData
        );
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
            'count'                       => 0,
            'company_information'         => 0,
            'website_information'         => [],
            'email_information'           => [],
            'newsletters'                 => [],
            'website_live_information'    => [],
        ];
        $this->validateWebsiteInformationData($data, $errors);
        $this->validateEmailInformationData($data, $errors);
        $this->validateNewslettersData($data, $errors);
        $this->validateWebsiteLiveInformationData($data, $errors);
        return $errors;
    }

    /**
     * Validates form data.
     *
     * @param array $data   form data
     * @param array $errors errors messages
     *
     * @return array array with errors
     */
    private function validateWebsiteInformationData(array $data, array &$errors)
    {
        $formErrorsService = $this->getService('formErrors');

        $fieldsValidation = [
            'website_url'             => ['empty', 'max_length', 'url'],
            'website_name'            => ['max_length'],
            'website_phone'           => ['empty', 'max_length'],
            'website_street'          => ['empty', 'max_length'],
            'website_address_line_2'  => ['max_length'],
            'website_city'            => ['empty', 'max_length'],
            'website_state'           => ['empty', 'max_length'],
            'website_zip'             => ['empty', 'max_length'],
            'website_email'           => ['max_length', 'email'],
            //'contact_it'              => ['max_length'],
        ];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $errors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data,
                    ['form' => 'website_information', 'field' => $field],
                    &$errors['website_information']]
                );
            }
        }
    }

    /**
     * Validates form data.
     *
     * @param array $data   form data
     * @param array $errors errors messages
     *
     * @return array array with errors
     */
    private function validateEmailInformationData(array $data, array &$errors)
    {
        $formErrorsService = $this->getService('formErrors');

        $fieldsValidation = [
            'email_login'    => ['max_length'],
            'email_password' => ['max_length'],
            'email_email'    => ['max_length', 'email'],
            'email_port'     => ['max_length', 'integer'],
            'email_protocol' => ['max_length'],
        ];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $errors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data,
                    ['form' => 'email_information', 'field' => $field],
                    &$errors['email_information']]
                );
            }
        }
    }

    /**
     * Validates form data.
     *
     * @param array $data   form data
     * @param array $errors errors messages
     *
     * @return array array with errors
     */
    private function validateNewslettersData(array $data, array &$errors)
    {
        $formErrorsService = $this->getService('formErrors');

        $fieldsValidation = [
            'mailchimp_api_key' => ['max_length'],
            'mailchimp_list'    => ['max_length'],
        ];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $errors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data,
                    ['form' => 'newsletters', 'field' => $field],
                    &$errors['newsletters']]
                );
            }
        }
    }

    /**
     * Validates form data.
     *
     * @param array $data   form data
     * @param array $errors errors messages
     *
     * @return array array with errors
     */
    private function validateWebsiteLiveInformationData(array $data, array &$errors)
    {
        $formErrorsService = $this->getService('formErrors');

        $fieldsValidation = [
            'live_need_contact'     => ['boolean'],
            'live_domain_host'      => ['max_length'],
            'live_website_username' => ['max_length'],
            'live_website_password' => ['max_length'],
        ];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $errors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data,
                    ['form' => 'website_live_information', 'field' => $field],
                    &$errors['website_live_information']]
                );
            }
        }
    }

    /**
     * Displays general form message
     *
     * @param string $type message type
     *
     * @return void
     */
    private function displayFormMessage(string $type)
    {
        $config = $this->getService('config')->get();
        $this->getService('flash')->addMessage(
            'message',
            [[
                'status' => $type,
                'text'   => $config['messages']['website_information'][$type]
            ]]
        );
    }
}
