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
namespace App\Controllers\Dealers\CompanyProfile;

use App\Kernel\Slim\App;
use App\Controllers\Dealers\CompanyProfile\CompanyProfileController;
use App\Models\Dealers\Company\CompanySocialMediaModel;
use App\Models\Dealers\Company\CompanyModel;

/**
 * This controller contains actions for the Contact Information page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class SocialMediaController extends CompanyProfileController
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
        $this->displayTab('social-media');

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
     * Stores company and contact data.
     *
     * @param array $data form data
     *
     * @return bool
     */
    private function storeData(array $data)
    {
        if (empty($data['user_id']) || empty($data['social_media'])) {
            return false;
        }

        $companyId = (empty($data['company_id']))
            ? $this->storeUserCompany($data['user_id']) : $data['company_id'];

        $status = $this->storeCompanySocialMedia($data, $companyId);
        return $status;
    }

    /**
     * Stores company social media data in DB.
     *
     * @param array $data      form data
     * @param int   $companyId company ID
     *
     * @return bool
     */
    private function storeCompanySocialMedia(array $data, int $companyId)
    {
        if (!$data || !$companyId) {
            return false;
        }

        $status = true;
        $dbService = $this->getService('db');
        foreach ($data['social_media'] as $id => $url) {
            $companySocialMediaModel = new CompanySocialMediaModel($dbService);
            $media = $companySocialMediaModel->getCompanySocialMedia($companyId, $id);
            if ($media) {
                if (empty($media->name) && !$url) {
                    $companySocialMediaModel->deleteCompanySocialMedia($companyId, $id);
                }
            } elseif (!$url) {
                continue;
            }

            $mediaData = [
                'company_id'      => $companyId,
                'social_media_id' => $id,
                'url'             => $url,
            ];
            if (!empty($data['social_media_username'][$id])) {
                $mediaData['username'] = $data['social_media_username'][$id];
                if (!empty($data['social_media_password'][$id])) {
                    $mediaData['password'] = $data['social_media_password'][$id];
                }
            }
            $status &= ($media)
                ? $companySocialMediaModel->updateCompanySocialMedia($mediaData)
                : $companySocialMediaModel->insertCompanySocialMedia($mediaData);
        }
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
            'count'                 => 0,
            'social_media'          => [],
            'social_media_username' => [],
            'social_media_password' => [],
        ];
        $this->validateSocialMedia($data, $errors);
        $this->validateSocialMediaUsernames($data, $errors);
        $this->validateSocialMediaPasswords($data, $errors);

        return $errors;
    }

    /**
     * Validates social media pages names
     *
     * @param array $data   form data
     * @param array $errors errors array
     *
     * @return void
     */
    private function validateSocialMedia(array $data, array &$errors)
    {
        $formErrorsService = $this->getService('formErrors');

        $socialMedia = $this->getSocialMedia();
        $preparedData = [];
        foreach ($socialMedia as $media) {
            $preparedData[$media->name] = $data['social_media'][$media->id];
        }
        $rules = ['max_length'];
        $fieldsValidation = array_fill_keys(array_keys($preparedData), $rules);

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $errors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$preparedData,
                    ['form' => 'social_media', 'field' => $field],
                    &$errors['social_media']]
                );
            }
        }
    }

    /**
     * Validates social media usernames
     *
     * @param array $data   form data
     * @param array $errors errors array
     *
     * @return void
     */
    private function validateSocialMediaUsernames(array $data, array &$errors)
    {
        $formErrorsService = $this->getService('formErrors');

        $socialMedia = $this->getSocialMedia();
        $preparedData = [];
        foreach ($socialMedia as $media) {
            $preparedData[$media->name] = $data['social_media_username'][$media->id];
        }
        $rules = ['max_length'];
        $fieldsValidation = array_fill_keys(array_keys($preparedData), $rules);

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $errors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$preparedData,
                    ['form' => 'social_media_username', 'field' => $field],
                    &$errors['social_media_username']]
                );
            }
        }
    }

    /**
     * Validates social media passwords
     *
     * @param array $data   form data
     * @param array $errors errors array
     *
     * @return void
     */
    private function validateSocialMediaPasswords(array $data, array &$errors)
    {
        $formErrorsService = $this->getService('formErrors');

        $socialMedia = $this->getSocialMedia();
        $preparedData = [];
        foreach ($socialMedia as $media) {
            $preparedData[$media->name] = $data['social_media_password'][$media->id];
        }
        $rules = ['max_length'];
        $fieldsValidation = array_fill_keys(array_keys($preparedData), $rules);

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $errors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$preparedData,
                    ['form' => 'social_media_password', 'field' => $field],
                    &$errors['social_media_password']]
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
                'text'   => $config['messages']['social_media_information'][$type]
            ]]
        );
    }
}
