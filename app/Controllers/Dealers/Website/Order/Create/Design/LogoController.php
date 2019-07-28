<?php
/**
 * This file contains portal's CreateOrderController.
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
namespace App\Controllers\Dealers\Website\Order\Create\Design;

use App\Kernel\ControllerAbstract;
use App\Kernel\Slim\App;
use App\Controllers\Dealers\Website\Order\Create\CreateOrderController;
use App\Models\Dealers\Company\CompanyLogosModel;

/**
 * This controller contains actions for the Website - Place an Order page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class LogoController extends CreateOrderController
{
    private $page = 'logo';
    /**
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $data = $this->getIndexData();
        $data['action'] = [
            'form' => $this->getService('config')->get()['routes']['order-logo'],
        ];
        $data['percentage'] = (empty($data['order']))
            ? $this->getPercentage([]) : $this->getPercentage($data['order']);
        $data['company_logo'] = $this->getCompanyLogo($data['company']->id);
        $messages = $this->getService('flash')->getMessages();
        foreach ($messages as $key => $value) {
            if (!empty($value)) {
                $messages[$key] = $value[0];
            }
        }
        $data['messages'] = $messages;

        return $this->render('Dealers/website/order/design/logo.twig', $data);
    }

    /**
     * Stores logo data
     *
     * @return void
     */
    public function store()
    {
        $request = $this->getRequest();
        
        if (!$request->isPost()) {
            return $this->goBack($this->page);
        }
        $user = $this->getService('session')->user;
        /*$errors = $this->getService('config')->get()['errors']['order_logo']['logo'];

        $files = $request->getUploadedFiles();
        if (empty($files['logo_file'])) {
            $error = $errors['empty'];
            $this->getService('flash')->addMessage('error', $error);
            return $this->goBack($this->page);
        }

        $logo = $files['logo_file'];
        $errors = $this->validateLogo($logo);
        if (!empty($errors['count'])) {
            $this->displayFormErrors($errors);
            return $this->goBack($this->page);
        }

        $file = [];
        $company = $this->getCompany($user['id']);
        $this->uploadLogo($company->id, $logo, $file, $errors);
        if (!empty($errors['count'])) {
            $this->displayFormErrors($errors);
            return $this->goBack($this->page);
        }
        $status = $this->storeLogo($company->id, $file);
        if (!$status) {
            $this->getService('flash')->addMessage('error', $error);
            return $this->goBack($this->page);
        }*/

        $data = $request->getParams();
        $data['user_id'] = $user['id'];
        $status = $this->storeCosts($data, 'logo');
        if (!$status) {
            return $this->goBack($this->page);
        }

        return $this->handleNextAction($data['action'], 'website-information', 'color');
    }

    private function getCompanyLogo(int $companyId)
    {
        $companyLogosModel = new CompanyLogosModel($this->getService('db'));
        $logo = $companyLogosModel->getCompanyLogo($companyId);
        return $logo;
    }

    /**
     * Validates uploaded file.
     *
     * @param mixed $logo uploaded logo
     *
     * @return array array with errors
     */
    private function validateLogo($logo)
    {
        $formErrors = [
            'count' => 0,
            'logo' => []
        ];
        $settings = $this->getService('config')->get();
        $errors = $settings['errors']['order_logo']['logo'];
        $field = $settings['fields']['order_logo']['logo'];
        $error = $logo->getError();
        switch ($error) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                $formErrors['logo'][] = str_replace(
                    ':size', $this->formatFileSize($field['max_size']), $errors['max_size']
                );
                $formErrors['count']++;
                break;
            case UPLOAD_ERR_EXTENSION:
                $formErrors['logo'][] = str_replace(
                    ':format', $this->formatFileSize($field['format']), $errors['format']
                );
                $formErrors['count']++;
                break;
            default:
                $formErrors['logo'][] = $errors['upload'];
                $formErrors['count']++;
                break;
        }
        if ($logo->getSize() > $field['max_size']) {
            $formErrors['logo'][] = str_replace(
                ':size', $this->formatFileSize($field['max_size']), $errors['max_size']
            );
            $formErrors['count']++;
        }
        if (!in_array($logo->getClientMediaType(), $field['types'])) {
            $formErrors['logo'][] = str_replace(
                ':format', $field['format'], $errors['format']
            );
            $formErrors['count']++;
        }
        return $formErrors;
    }

    /**
     * Validates logo form data.
     *
     * @param array $data logo form data
     *
     * @return void
     */
    private function validateData(array $data)
    {
        $formErrors = ['logo' => [], 'count' => 0];
        return $formErrors;
    }

    /**
     * Uploads logo.
     *
     * @param int   $companyId company ID
     * @param mixed $logo      logo to upload
     * @param array $file      file data
     *
     * @return bool
     */
    private function uploadLogo(int $companyId, $logo, &$file, array &$formErrors)
    {
        if (!$companyId || !$logo || is_null($file)) {
            return false;
        }

        $directory = $this->getCompanyLogosDirectory($companyId);
        $uploadService = $this->getService('upload');

        $errors = $this->getService('config')->get()['errors']['order_logo']['logo'];

        $filename = $uploadService->moveUploadedFile($logo, $directory, true);
        if ($filename) {
            $file = [
                'filename' => $filename,
                'size'     => $logo->getSize(),
                'type'     => $logo->getClientMediaType(),
            ];
        } else {
            $formErrors['logo'][] = $errors['filename'];
            $formErrors['count']++;
        }
        return true;
    }

    /**
     * Returns path to company's logos directory
     *
     * @param int $companyId company ID
     *
     * @return string | bool
     */
    private function getCompanyLogosDirectory(int $companyId)
    {
        if (!$companyId) {
            return false;
        }

        return $this->getService('config')->get()['paths']['company_logos']['storage']
               . $companyId . DIRECTORY_SEPARATOR;
    }

    /**
     * Stores logo into DB.
     *
     * @param int   $companyId company ID
     * @param array $file      logo data
     *
     * @return bool
     */
    private function storeLogo(int $companyId, array &$file)
    {
        if (!$companyId || is_null($file)) {
            return false;
        }

        $companyLogosModel = new CompanyLogosModel($this->getService('db'));
        $file['id'] = $companyLogosModel->insertCompanyLogo([
            'company_id' => $companyId,
            'filename'   => $file['filename']
        ]);
        return true;
    }
}
