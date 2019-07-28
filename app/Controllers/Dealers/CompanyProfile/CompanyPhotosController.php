<?php
/**
 * This file contains portal's CompanyPhotosController.
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
use App\Models\Dealers\Company\CompanyPhotosModel;

/**
 * This controller contains actions for the Company Photos page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class CompanyPhotosController extends CompanyProfileController
{
    /**
     * Uploads and stores files (1 file per 1 request).
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
        $this->displayTab('company-photos');

        $files = $request->getUploadedFiles();
        if (empty($files['files'])) {
            return $this->getAjaxResponse('error');
        }
        $formFiles = $files['files'];
        $errors = $this->validateFiles($formFiles);
        if (!empty($errors['count'])) {
            return $this->getAjaxResponse('error', null, $errors);
        }

        $user = $this->getService('session')->user;
        $company = $this->getCompany($user['id']);
        $companyId = ($company) ? $company->id : $this->storeUserCompany($user['id']);

        $files = [];
        $this->uploadCompanyFiles($companyId, $formFiles, $files, $errors);
        if (!empty($errors['count'])) {
            return $this->getAjaxResponse('error', null, $errors);
        }
        $status = $this->storeCompanyFiles($companyId, $files);

        if (!$status) {
            $error = $this->getService('config')->get()['errors']['not_saved'];
            return $this->getAjaxResponse('error', null, [$error]);
        }
        $response = $this->prepareStoreResponse($companyId, $files);
        return $this->getAjaxFileResponse('success', $response);
    }

    /**
     * Deletes files.
     *
     * @param string $id company's photo ID
     *
     * @return string
     */
    public function delete($id)
    {
        $photoId = (int) $id;

        $dbService = $this->getService('db');

        $companyPhotosModel = new CompanyPhotosModel($dbService);
        $photo = $companyPhotosModel->getCompanyPhoto($photoId);
        if (!$photo) {
            return $this->getAjaxResponse('error');
        }

        $user = $this->getService('session')->user;
        $company = $this->getCompany($user['id']);

        $directory = $this->getCompanyPhotosDirectory($company->id);
        $status = unlink($directory . $photo->filename);
        if (!$status) {
            return $this->getResponse()->withJson([$directory . $photo->filename => 0]);
        }

        $companyPhotosModel = new CompanyPhotosModel($dbService);
        $status = $companyPhotosModel->deleteCompanyPhoto($photoId);

        return $this->getResponse()->withJson([$directory . $photo->filename => $status]);
    }

    /**
     * Uploads files.
     *
     * @param int   $companyId company ID
     * @param array $formFiles files to upload
     * @param array $files     files data
     *
     * @return bool
     */
    private function uploadCompanyFiles(int $companyId, array $formFiles, array &$files, array &$formErrors)
    {
        if (!$companyId || !$formFiles || is_null($files)) {
            return false;
        }

        $directory = $this->getCompanyPhotosDirectory($companyId);
        $uploadService = $this->getService('upload');

        $errors = $this->getService('config')->get()['errors']['company_photos']['files'];

        foreach ($formFiles as $file) {
            $filename = $uploadService->moveUploadedFile($file, $directory, true);
            if ($filename) {
                $files[] = [
                    'filename' => $filename,
                    'size'     => $file->getSize(),
                    'type'     => $file->getClientMediaType(),
                ];
            } else {
                $formErrors['files'][] = $errors['filename'];
                $formErrors['count']++;
            }
        }
        return true;
    }

    /**
     * Stores files data into DB.
     *
     * @param int   $companyId company ID
     * @param array $files     uploaded files
     *
     * @return bool
     */
    private function storeCompanyFiles(int $companyId, array &$files)
    {
        if (!$companyId || is_null($files)) {
            return false;
        }

        $companyPhotosModel = new CompanyPhotosModel($this->getService('db'));
        foreach ($files as $key => $file) {
            $files[$key]['id'] = $companyPhotosModel->insertCompanyPhoto([
                'company_id' => $companyId,
                'filename'   => $file['filename']
            ]);
        }
        return true;
    }

    /**
     * Validates uploaded files.
     *
     * @param array $files upload files
     *
     * @return array array with errors
     */
    private function validateFiles(array $files)
    {
        $formErrors = [
            'count' => 0,
            'files' => []
        ];
        $settings = $this->getService('config')->get();
        $errors = $settings['errors']['company_photos']['files'];
        $field = $settings['fields']['company_photos']['files'];
        foreach ($files as $file) {
            $error = $file->getError();
            switch ($error) {
                case UPLOAD_ERR_OK:
                    continue;
                    break;
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    $formErrors['files'][] = str_replace(
                        ':size',
                        $this->formatFileSize($field['max_size']),
                        $errors['max_size']
                    );
                    $formErrors['count']++;
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $formErrors['files'][] = str_replace(
                        ':format',
                        $this->formatFileSize($field['format']),
                        $errors['format']
                    );
                    $formErrors['count']++;
                    break;
                default:
                    $formErrors['files'][] = $errors['upload'];
                    $formErrors['count']++;
                    break;
            }
            if ($file->getSize() > $field['max_size']) {
                $formErrors['files'][] = str_replace(
                    ':size',
                    $this->formatFileSize($field['max_size']),
                    $errors['max_size']
                );
                $formErrors['count']++;
            }
            if (!in_array($file->getClientMediaType(), $field['types'])) {
                $formErrors['files'][] = str_replace(
                    ':format',
                    $field['format'],
                    $errors['format']
                );
                $formErrors['count']++;
            }
        }
        return $formErrors;
    }

    /**
     * Prepares array with files data
     *
     * @param int   $companyId company ID
     * @param array $files     files data
     *
     * @return array prepared file data
     */
    private function prepareStoreResponse(int $companyId, array $files)
    {
        $response = [];
        $settings = $this->getService('config')->get();
        $url = $settings['app']['url'] . '/'
             . $settings['paths']['company_photos']['relative']
             . $companyId . '/';
        $directory = $settings['paths']['company_photos']['storage'];
        foreach ($files as $file) {
            $size = (!empty($file['size']))
                ? $file['size'] : filesize($file['name']);
            $type = (!empty($file['type']))
                ? $file['type'] : getimagesize($filename)['mime'];
            $response[] = [
                'deleteType'   => 'DELETE',
                'deleteUrl'    => $settings['routes']['company-photos'] . '/' . $file['id'],
                'name'         => $file['filename'],
                'size'         => $size,
                'thumbnailUrl' => (strpos($type, 'image/') === false) ? null : $url . $file['filename'],
                'type'         => $type,
                'url'          => $url . $file['filename']
            ];
        }
        return $response;
    }

    /**
     * Returns path to company's photos directory
     *
     * @param int $companyId company ID
     *
     * @return string | bool
     */
    private function getCompanyPhotosDirectory(int $companyId)
    {
        if (!$companyId) {
            return false;
        }

        return $this->getService('config')->get()['paths']['company_photos']['storage']
               . $companyId . DIRECTORY_SEPARATOR;
    }

    /**
     * Returns file size in bytes in human readable format.
     *
     * @param int    $size     file size in bytes
     * @param string $userUnit size units to format
     *
     * @return string
     */
    private function formatFileSize(int $size, string $userUnit = '')
    {
        if (!$size) {
            return '';
        }

        $fileSize = number_format($size, 0) . ' bytes';
        $units = ['GB' => 30, 'MB' => 20, 'KB' => 10];
        foreach ($units as $unit => $power) {
            if ((!$userUnit && $size >= 1 << $power) || $userUnit == $unit) {
                $fileSize = number_format($size / (1 << $power), 0) . $unit;
                break;
            }
        }
        return $fileSize;
    }
}
