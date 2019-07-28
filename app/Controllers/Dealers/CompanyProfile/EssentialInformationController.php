<?php
/**
 * This file contains portal's EssentialInformationController.
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
use App\Models\Dealers\Company\CompanyHoursModel;
use App\Models\Dealers\Company\CompanyPaymentMethodModel;
use App\Models\Dealers\Company\CompanyInformationModel;
use App\Models\Dealers\Company\CompaniesKeywordsModel;
use App\Models\Dealers\Company\CompanyModel;

/**
 * This controller contains actions for the Essential Information page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class EssentialInformationController extends CompanyProfileController
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
        $this->displayTab('essential-information');

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

        $config   = $this->getService('config')->get();
        $routes   = $config['routes'];
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
                    'Essential information fields',
                    $messages['success']
                )]
            );
        }
        $errors = [str_replace(
            ':instance',
            'Essential information fields',
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
            $data['company_id'] = $this->storeUserCompany($data['user_id']);
        }
        $status = ($this->updateHours($data)
            && $this->updatePaymentMethodsData($data)
            && $this->updateInformationData($data)
            && $this->updateKeywordsData($data));
        return $status;
    }

    /**
     * Updates hours data.
     *
     * @param array $data form data
     *
     * @return bool
     */
    private function updateHours(array $data)
    {
        $status = true;
        $preparedData = $this->prepareHoursData($data);
        $hoursModel = new CompanyHoursModel($this->getService('db'));
        $hoursModel->deleteCompanyHours($data['company_id']);
        foreach ($preparedData as $value) {
            $status &= $hoursModel->insertCompanyHours($value);
        }
        return $status;
    }

    /**
     * Updates payment methods data.
     *
     * @param array $data payment methods data
     *
     * @return bool
     */
    private function updatePaymentMethodsData(array $data)
    {
        $status = true;
        $preparedData = $this->preparePaymentMethodsData($data);
        $companyPaymentMethodModel = new CompanyPaymentMethodModel($this->getService('db'));
        $companyPaymentMethodModel->deleteCompanyPaymentMethods($data['company_id']);
        foreach ($preparedData as $value) {
            $status &= $companyPaymentMethodModel->insertCompanyPaymentMethod($value);
        }
        return $status;
    }

    /**
     * Updates information data.
     *
     * @param array $data information data
     *
     * @return bool
     */
    private function updateInformationData(array $data)
    {
        $companyInformationModel = new CompanyInformationModel($this->getService('db'));
        $preparedData = $this->prepareInformationData($data);
        $companyInformationModel->deleteCompanyInformation($data['company_id']);
        $status = $companyInformationModel->insertCompanyInformation($preparedData);
        return $status;
    }

    /**
     * Updates keywords data.
     *
     * @param array $data keywords data
     *
     * @return bool
     */
    private function updateKeywordsData(array $data)
    {
        $companiesKeywordsModel = new CompaniesKeywordsModel(
            $this->getService('db'),
            $this->getService('logger')
        );
        $companiesKeywordsModel->deleteCompanyKeywords($data['company_id']);

        $keywords = explode(',', $data['keywords']);
        $status = true;
        foreach ($keywords as $keyword) {
            $status &= $companiesKeywordsModel->insertCompanyKeyword(
                ['company_id' => $data['company_id'], 'keyword' => $keyword]
            );
        }

        return $status;
    }

    /**
     * Prepares hours data.
     *
     * @param array $data form data
     *
     * @return bool
     */
    private function prepareHoursData(array $data)
    {
        $preparedData = [];
        $hours = $this->getHoursList();
        $label = $this->getService('config')->get()
            ['misc']['essential_information']['24_hours_label'];
        foreach ($data['days'] as $day => $on) {
            foreach ($data['start'][$day] as $key => $hour) {
                $start = $hours[(int) $data['start'][$day][$key]];
                $end   = $hours[(int) $data['end'][$day][$key]];
                $preparedData[] = [
                    'company_id' => $data['company_id'],
                    'day'        => $day,
                    'start'      => ($start === $label) ? '00:00:00' : $this->clockToTime($start),
                    'end'        => ($end   === $label) ? '24:00:00' : $this->clockToTime($end),
                ];
            }
        }
        return $preparedData;
    }

    /**
     * Prepares payment methods data.
     *
     * @param array $data form data
     *
     * @return bool
     */
    private function preparePaymentMethodsData(array $data)
    {
        $preparedData = [];
        foreach ($data['payment_methods'] as $methodId => $on) {
            $preparedData[] = [
                'company_id'        => $data['company_id'],
                'payment_method_id' => $methodId,
            ];
        }
        return $preparedData;
    }

    /**
     * Prepares information data.
     *
     * @param array $data form data
     *
     * @return bool
     */
    private function prepareInformationData(array $data)
    {
        $preparedData = [
            'company_id'           => $data['company_id'],
            'notes'                => (empty($data['notes']))
                ? '' : $data['notes'],
            'business_description' => (empty($data['business_description']))
                ? '' : $data['business_description'],
            'business_tagline'     => (empty($data['business_tagline']))
                ? '' : $data['business_tagline'],
        ];
        return $preparedData;
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
            'hours'           => [],
            'payment_methods' => [],
            'information'     => [],
            'keywords'        => [],
            'count'           => 0
        ];
        $this->validateHoursData($data, $errors);
        $this->validatePaymentMethodsData($data, $errors);
        $this->validateInformationData($data, $errors);
        $this->validateKeywordsData($data, $errors);
        return $errors;
    }

    /**
     * Validates hours form data.
     *
     * @param array $data       hours form data
     * @param array $formErrors errors
     *
     * @return void
     */
    private function validateHoursData(array $data, array &$formErrors)
    {
        $errors = $this->getService('config')->get()['errors']['essential_information'];

        if (empty($data['days'])) {
            $formErrors['count']++;
            $formErrors['hours'][] = $errors['hours']['empty'];
            return;
        }

        $days = $this->getDaysList();
        $days = array_merge($days, ['holiday']);
        $hours = $this->getHoursList();
        unset($hours[0]);
        $hoursIndexes = array_keys($hours);

        foreach ($data['days'] as $day => $on) {
            if (!in_array($day, $days)) {
                $formErrors['count']++;
                $formErrors['hours'][] = $errors['hours']['invalid'];
                continue;
            }
            foreach ($data['start'][$day] as $startHour) {
                if (!in_array($startHour, $hoursIndexes)) {
                    $formErrors['count']++;
                    $formErrors['hours'][] = $errors['hours']['invalid'];
                }
            }
            foreach ($data['end'][$day] as $endHour) {
                if (!in_array($endHour, $hoursIndexes)) {
                    $formErrors['count']++;
                    $formErrors['hours'][] = $errors['hours']['invalid'];
                }
            }
        }
    }

    /**
     * Validates payement methods form data.
     *
     * @param array $data       payment methods form data
     * @param array $formErrors errors
     *
     * @return void
     */
    private function validatePaymentMethodsData(array $data, array &$formErrors)
    {
        $errors = $this->getService('config')->get()['errors']['essential_information'];

        if (empty($data['payment_methods'])) {
            $formErrors['count']++;
            $formErrors['payment_methods'][] = $errors['payment_methods']['empty'];
            return;
        }

        $methods = $this->getPaymentMethods();
        $methodsIds = [];
        foreach ($methods as $method) {
            $methodsIds[] = $method->id;
        }

        foreach ($data['payment_methods'] as $methodId => $on) {
            if (!in_array($methodId, $methodsIds)) {
                $formErrors['count']++;
                $formErrors['payment_methods'][] = $errors['payment_methods']['invalid'];
            }
        }
    }

    /**
     * Validates information form data.
     *
     * @param array $data       information form data
     * @param array $formErrors errors
     *
     * @return void
     */
    private function validateInformationData(array $data, array &$formErrors)
    {
        if (empty($data['business_description']) && empty($data['business_tagline'])) {
            return;
        }

        $formErrorsService = $this->getService('formErrors');

        $fieldsValidation = [
            'business_description' => ['max_length'],
            'business_tagline'     => ['max_length'],
        ];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $formErrors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data,
                    ['form' => 'essential_information', 'field' => $field],
                    &$formErrors['information']]
                );
            }
        }
    }

    /**
     * Validates keywords form data.
     *
     * @param array $data       keywords form data
     * @param array $formErrors errors
     *
     * @return void
     */
    private function validateKeywordsData(array $data, array &$formErrors)
    {
        if (empty($data['keywords'])) {
            return;
        }

        $data['keywords'] = explode(',', $data['keywords']);

        $formErrorsService = $this->getService('formErrors');

        $fieldsValidation = [
            'keywords' => ['array_max_length'],
        ];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $formErrors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data,
                    ['form' => 'essential_information', 'field' => $field],
                    &$formErrors['keywords']]
                );
            }
        }
    }

    /**
     * Converts time in format 'H:i am' to 'H:i:s'
     *
     * @param string $clock time in format 'H:i am'
     *
     * @return string        time in format 'H:i:s'
     */
    private function clockToTime(string $clock)
    {
        $label = $this->getService('config')->get()
            ['misc']['essential_information']['24_hours_label'];
        if ($clock === $label) {
            return '00:00:00';
        }
        return date('H:i:s', strtotime($clock));
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
        $company = $companyModel->getCompany(['user_id' => $userId]);

        $companyHoursModel = new CompanyHoursModel($this->dbService);
        $updateData['company_hours'] = $companyHoursModel->getCompanyHours($company->id);

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
            'location'      => $location,
            'company_hours' => $data['company_hours'],
        ];
        $status = $this->gmbService->updateLocationInformation($updateData);
        return $status;
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
                'text'   => $config['messages']['essential_information'][$type]
            ]]
        );
    }
}
