<?php
/**
 * This file contains portal's StoreOrderController.
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
namespace App\Controllers\Dealers\Website\Order;

use App\Kernel\ControllerAbstract;
use App\Kernel\Slim\App;
use App\Controllers\Dealers\Website\Order\OrderController;
use App\Models\Dealers\Costs\CostsOptionsModel;
use App\Models\Dealers\Order\OrderModel;
use App\Models\Dealers\Order\OrderCostsModel;
use App\Models\Dealers\User\UserModel;
use App\Models\Dealers\Company\CompanyModel;
use App\Models\Dealers\Company\CompanySocialMediaModel;
use App\Models\Dealers\Company\CompanyGoogleServicesModel;
use App\Models\Dealers\SocialMediaModel;

/**
 * This controller contains store actions for the Website - Place an Order page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class StoreOrderController extends OrderController
{
    /**
     * Stores form data.
     *
     * @return string
     */
    public function store()
    {
        $request = $this->getRequest();

        if (!$request->isXhr()) {
            return $this->goBack();
        }
        
        if (!$request->isPost()) {
            return $this->getAjaxResponse('error');
        }

        $data = $request->getParams();
        $data['user_id'] = $this->getService('session')->user['id'];
        $errors = $this->validateData($data);
        if (!empty($errors['count'])) {
            return $this->getAjaxResponse('error', $data, $errors);
        }

        $data['user_id'] = $this->getService('session')->user['id'];
        $status = $this->storeData($data);
        if (!array_product($status)) {
            $error = $this->getService('config')
                ->get()['errors']['order_create']['error'];
            return $this->getAjaxResponse('error', null, [$error]);
        }

        $response = [
            'url' => $this->getService('config')->get()['routes']['website'],
            'order_id' => $status['order_id']
        ];
        if (!empty($status['company_id'])) {
            $response['company_id'] = $status['company_id'];
        }
        return $this->getAjaxResponse('success', $response);
    }

    /**
     * Validates form data
     *
     * @param array $data form data
     *
     * @return array errors
     */
    private function validateData(array $data)
    {
        $formErrors = [
            'count'   => 0,
            'costs'   => [],
            'company' => [
                'contact'         => [],
                'general'         => [],
                'social_media'    => [],
                'google_services' => [],
            ],
        ];

        $this->validateCostsData($data, $formErrors);
        $this->validateCompanyContactData($data, $formErrors);
        $this->validateCompanyGeneralData($data, $formErrors);
        $this->validateCompanySocialMediaData($data, $formErrors);
        $this->validateCompanyGoogleServicesData($data, $formErrors);
        
        return $formErrors;
    }

    /**
     * Validates costs form data (Step 1)
     *
     * @param array $data       form data
     * @param array $formErrors form errors messages
     *
     * @return array errors
     */
    private function validateCostsData(array $data, array &$formErrors)
    {
        $userGroups = $this->getUserGroups($data['user_id']);
        $costsTypes = $this->getCostsTypes($userGroups);

        $errors = $this->getService('config')->get()['errors']['order_create'];

        foreach ($costsTypes as $type) {
            if (empty($data[$type->name])) {
                $formErrors['costs'][] = str_replace(':field', $type->name, $errors['invalid']);
            }

            $costsOptionsModel = new CostsOptionsModel($this->getService('db'));
            $costsOptions = $costsOptionsModel->getCostsOptions($type->id);
            $found = false;
            foreach ($costsOptions as $option) {
                if ((int) $data[$type->name] === $option->id) {
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $formErrors['costs'][] = str_replace(':field', $type->name, $errors['invalid']);
            }
        }
    }

    /**
     * Validates company contact form data (Step 2.1)
     *
     * @param array $data       form data
     * @param array $formErrors form errors messages
     *
     * @return array errors
     */
    private function validateCompanyContactData(array $data, array &$formErrors)
    {
        $formErrorsService = $this->getService('formErrors');

        $fieldsValidation = [
            'primary_contact_first_name'    => ['empty', 'max_length'],
            'primary_contact_last_name'     => ['empty', 'max_length'],
            'primary_contact_email'         => ['empty', 'email'],
        ];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $formErrors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data,
                    ['form' => 'contact', 'field' => $field],
                    &$formErrors['company']['contact']]
                );
            }
        }
    }

    /**
     * Validates company general form data (Step 2.1)
     *
     * @param array $data       form data
     * @param array $formErrors form errors messages
     *
     * @return array errors
     */
    private function validateCompanyGeneralData(array $data, array &$formErrors)
    {
        $formErrorsService = $this->getService('formErrors');

        $fieldsValidation = [
            'business_name'       => ['empty', 'max_length'],
            'street_address'      => ['empty', 'max_length'],
            'city'                => ['empty', 'max_length'],
            'state'               => ['empty', 'max_length'],
            'zip_code'            => ['empty', 'max_length'],
            'company_phone'       => ['empty', 'max_length'],
            'company_email'       => ['email'],
        ];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $formErrors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data,
                    ['form' => 'company', 'field' => $field],
                    &$formErrors['company']['general']]
                );
            }
        }
    }

    /**
     * Validates company social media form data (Step 2.1)
     *
     * @param array $data       form data
     * @param array $formErrors form errors messages
     *
     * @return array errors
     */
    private function validateCompanySocialMediaData(array $data, array &$formErrors)
    {
        $formErrorsService = $this->getService('formErrors');

        $fieldsValidation = [
            'facebook'      => ['boolean'],
            'twitter'       => ['boolean'],
            'facebook_name' => ['max_length'],
            'twitter_name'  => ['max_length'],
        ];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $formErrors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data,
                    ['form' => 'company_social_media', 'field' => $field],
                    &$formErrors['company']['social_media']]
                );
            }
        }
    }

    /**
     * Validates company Google services form data (Step 2.1, 2.2)
     *
     * @param array $data       form data
     * @param array $formErrors form errors messages
     *
     * @return array errors
     */
    private function validateCompanyGoogleServicesData(array $data, array &$formErrors)
    {
        $formErrorsService = $this->getService('formErrors');

        $fieldsValidation = [
            'has_analytics'      => ['integer', 'min_value', 'max_value'],
            'has_gmb'            => ['boolean'],
            'has_adwords_ppc'    => ['boolean'],
        ];
        if (array_key_exists('has_adwords_ppc', $data) && $data['has_adwords_ppc']) {
            $fieldsValidation['adwords_ppc_budget'] = ['integer', 'min_value', 'max_value'];
        }

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $formErrors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data,
                    ['form' => 'company_google_services', 'field' => $field],
                    &$formErrors['company']['google_services']]
                );
            }
        }
    }

    /**
     * Stores form data into DB
     *
     * @param array $data form data
     *
     * @return bool operation status
     */
    private function storeData(array $data)
    {
        $status['order_id'] = $this->storeOrder($data);
        $status['order_costs'] = $this->storeOrderCosts($status['order_id'], $data);
        if (empty($data['company_id'])) {
            $status['company_id'] = $this->storeCompanyData($data);
        } else {
            $status['company_update'] = $this->updateCompanyData($data);
        }
        return $status;
    }

    /**
     * Stores order into DB
     *
     * @param array $data form data
     *
     * @return int | bool order id or false
     */
    private function storeOrder(array $data)
    {
        if (!$data || empty($data['user_id'])) {
            return false;
        }

        $order = [
            'user_id' => $data['user_id'],
            'datetime' => date('Y-m-d H:i:s')
        ];
        $orderModel = new OrderModel($this->getService('db'));
        $orderId = $orderModel->insertOrder($order);
        if (!$orderId) {
            return false;
        }

        return $orderId;
    }

    /**
     * Stores order costs into DB
     *
     * @param int   $orderId order id
     * @param array $data    form data
     *
     * @return bool operation status
     */
    private function storeOrderCosts(int $orderId, array $data)
    {
        if (!$orderId || !$data || empty($data['user_id'])) {
            return false;
        }

        $userGroups = $this->getUserGroups($data['user_id']);
        $costsTypes = $this->getCostsTypes($userGroups);
        if (!$costsTypes) {
            return false;
        }

        $status = true;

        foreach ($costsTypes as $type) {
            $orderCostsModel = new OrderCostsModel($this->getService('db'));
            $costs = [
                'order_id'        => $orderId,
                'costs_type_id'   => $type->id,
                'costs_option_id' => $data[$type->name]
            ];
            $status &= $orderCostsModel->insertOrderCosts($costs);
        }

        return $status;
    }

    /**
     * Stores company related data.
     *
     * @param array $data form data
     *
     * @return bool operation status
     */
    private function storeCompanyData(array $data)
    {
        $status = $this->updateCompanyContactData($data);
        $companyId = $this->storeCompanyGeneralData($data);
        $data['company_id'] = $companyId;
        $status &= $this->updateCompanySocialMediaData($data)
            && $this->updateCompanyGoogleServicesData($data);
        return $status;
    }

    /**
     * Stores company information.
     *
     * @param array $data form data
     *
     * @return bool operation status
     */
    private function storeCompanyGeneralData(array $data)
    {
        if (!$data) {
            return false;
        }

        $company = [
            'user_id'       => $data['user_id'],
            'business_name' => $data['business_name'],
            'street'        => $data['street_address'],
            'city'          => $data['city'],
            'state'         => $data['state'],
            'zip'           => $data['zip_code'],
            'email'         => $data['company_email'],
            'phone'         => $data['company_phone'],
        ];
        $companyModel = new CompanyModel($this->getService('db'));
        $companyId = $companyModel->insertCompany($company);
        return $companyId;
    }

    /**
     * Updates company related data.
     *
     * @param array $data form data
     *
     * @return bool operation status
     */
    private function updateCompanyData(array $data)
    {
        $status = $this->updateCompanyContactData($data)
            && $this->updateCompanyGeneralData($data)
            && $this->updateCompanySocialMediaData($data)
            && $this->updateCompanyGoogleServicesData($data);
        return $status;
    }

    /**
     * Updates company contact data.
     *
     * @param array $data form data
     *
     * @return bool operation status
     */
    private function updateCompanyContactData(array $data)
    {
        if (!$data) {
            return false;
        }

        $user = [
            'id'         => $data['user_id'],
            'first_name' => $data['primary_contact_first_name'],
            'last_name'  => $data['primary_contact_last_name'],
            'email'      => $data['primary_contact_email'],
        ];
        $userModel = new UserModel($this->getService('db'));
        $status = $userModel->updateUser($user);
        return $status;
    }

    /**
     * Updates company information.
     *
     * @param array $data form data
     *
     * @return bool operation status
     */
    private function updateCompanyGeneralData(array $data)
    {
        if (!$data || empty($data['company_id'])) {
            return false;
        }

        $company = [
            'id'            => $data['company_id'],
            'business_name' => $data['business_name'],
            'street'        => $data['street_address'],
            'city'          => $data['city'],
            'state'         => $data['state'],
            'zip'           => $data['zip_code'],
            'email'         => $data['company_email'],
            'phone'         => $data['company_phone'],
        ];
        $companyModel = new CompanyModel($this->getService('db'));
        $status = $companyModel->updateCompany($company);
        return $status;
    }

    /**
     * Updates company social media data.
     *
     * @param array $data form data
     *
     * @return bool operation status
     */
    private function updateCompanySocialMediaData(array $data)
    {
        if (empty($data['company_id'])) {
            return false;
        }
        $status = true;
        $formSocialMedia = ['facebook', 'twitter'];

        foreach ($formSocialMedia as $field) {
            $socialMediaId   = $this->getSocialMediaId($field);
            $existsDb        = $this->existsDb($socialMediaId, $data['company_id']);
            $existsForm      = $this->existsForm($field, $data);
            $socialMediaPage = $this->getSocialMediaPage($field, $data);

            $companySocialMediaModel = new CompanySocialMediaModel($this->getService('db'));
            if ($existsForm) {
                $companySocialMedia = [
                    'company_id'      => $data['company_id'],
                    'social_media_id' => $socialMediaId,
                    'name'            => $socialMediaPage,
                ];
                if ($existsDb) {
                    $status &= $companySocialMediaModel->updateCompanySocialMedia(
                        $companySocialMedia
                    );
                } else {
                    $status &= $companySocialMediaModel->insertCompanySocialMedia(
                        $companySocialMedia
                    );
                }
            } elseif ($existsDb) {
                $status &= $companySocialMediaModel->deleteCompanySocialMedia(
                    $data['company_id'], $socialMediaId
                );
            }
        }
        return $status;
    }

    /**
     * Get social media id by name in DB
     *
     * @param string $socialMediaName social media name
     *
     * @return int
     */
    private function getSocialMediaId(string $socialMediaName)
    {
        $socialMediaId = 0;

        $socialMediaModel = new SocialMediaModel($this->getService('db'));
        $socialMedia = $socialMediaModel->getSocialMedia();
        foreach ($socialMedia as $media) {
            if ($socialMediaName === $media->name) {
                $socialMediaId = $media->id;
                break;
            }
        }
        return $socialMediaId;
    }

    /**
     * Checks if company social media record exists in DB
     *
     * @param int $socialMediaId social media ID
     * @param int $companyId     company ID
     *
     * @return bool
     */
    private function existsDb(int $socialMediaId, int $companyId)
    {
        if (!$socialMediaId || !$companyId) {
            return false;
        }

        $exists = false;

        $companySocialMediaModel = new CompanySocialMediaModel($this->getService('db'));
        $companySocialMedia = $companySocialMediaModel->getCompanySocialMedia($companyId);
        foreach ($companySocialMedia as $media) {
            if ($socialMediaId === $media->social_media_id) {
                $exists = true;
                break;
            }
        }
        return $exists;
    }

    /**
     * Checks if user selected social media on the form
     *
     * @param string $field social media name
     * @param array  $data  form data
     *
     * @return bool
     */
    private function existsForm(string $field, array $data)
    {
        $exists = !empty($data[$field]);

        return $exists;
    }

    /**
     * Gets company's social media page name
     *
     * @param string $field social media
     * @param array  $data  form data
     *
     * @return string
     */
    private function getSocialMediaPage(string $field, array $data)
    {
        $page = '';

        if (array_key_exists($field . '_name', $data)) {
            $page = $data[$field . '_name'];
        }

        return $page;
    }

    /**
     * Updates company Google services data.
     *
     * @param array $data form data
     *
     * @return bool operation status
     */
    private function updateCompanyGoogleServicesData(array $data)
    {
        if (empty($data['company_id'])) {
            return false;
        }
        $services = [
            'company_id'         => $data['company_id'],
            'has_analytics'      => empty($data['has_analytics'])   ? 0 : $data['has_analytics'],
            'has_gmb'            => empty($data['has_gmb'])         ? 0 : 1,
            'has_adwords_ppc'    => empty($data['has_adwords_ppc']) ? 0 : 1,
            'adwords_ppc_budget' => empty($data['adwords_ppc_budget'])
                ? null : $data['adwords_ppc_budget'],
        ];
        $companyGoogleServicesModel = new CompanyGoogleServicesModel($this->getService('db'));
        $companyGoogleServices = $companyGoogleServicesModel->getCompanyGoogleServices($data['company_id']);

        $companyGoogleServicesModel = new CompanyGoogleServicesModel($this->getService('db'));
        if ($companyGoogleServices) {
            $status = $companyGoogleServicesModel->updateCompanyGoogleServices($services);
        } else {
            $status = $companyGoogleServicesModel->insertCompanyGoogleServices($services);
        }
        return $status;
    }
}
