<?php
/**
 * This file contains DealersController.
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
namespace App\Controllers\Dealers;

use App\Kernel\ControllerAbstract;
use App\Kernel\Slim\App;
use App\Models\Dealers\User\UserModel;
use App\Models\Dealers\Company\CompanyModel;

/**
 * This controller contains common actions for all portal pages.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class DealersController extends ControllerAbstract
{
    /**
     * Returns user's record from DB
     *
     * @return object
     */
    protected function getUser()
    {
        $user = $this->getService('session')->user;
        $userModel = new UserModel($this->getService('db'));
        $user = $userModel->getUser(['id' => $user['id']]);
        return $user;
    }

    /**
     * Returns user's company basic data.
     *
     * @param int $userId user ID
     *
     * @return mixed company data
     */
    protected function getCompany(int $userId)
    {
        if (!$userId) {
            return false;
        }

        $companyModel = new CompanyModel($this->getService('db'));
        $company = $companyModel->getCompany(['user_id' => $userId]);
        return $company;
    }

    /**
     * Returns menu items for sidebar.
     *
     * @return array
     */
    protected function getMenuItems()
    {
        $user = $this->getService('session')->user;
        $company = $this->getCompany($user['id']);
        if ($company->business_name == "Moxxi Marketing")
            return $this->getService('config')->get()['menu']['mmuser'];
        else
            return $this->getService('config')->get()['menu']['dealer'];
    }

    /**
     * Returns current route
     *
     * @return string
     */
    protected function getCurrentRoute()
    {
        return $this->getRequest()->getUri()->getPath();
    }

    /**
     * Redirects user to the dashboard.
     *
     * @return Response
     */
    protected function goDashboard()
    {
        $redirectUrl = '/' . $this->getService('config')->get()['routes']['dashboard'];
        return $this->getResponse()->withRedirect($redirectUrl, 301);
    }

    /**
     * Redirects user to the admin.
     *
     * @return Response
     */
    protected function goAdmin()
    {
        $redirectUrl = $this->getService('config')->get()['routes']['admin'];
        return $this->getResponse()->withRedirect($redirectUrl, 301);
    }

    /**
     * Returns response to AJAX request
     *
     * @param string $status response status
     * @param array  $data   response data
     * @param array  $errors response errors
     *
     * @return Response
     */
    protected function getAjaxResponse(string $status, array $data = null, array $errors = null)
    {
        $response = ['status' => $status];
        if ($data) {
            $response['data'] = $data;
        }
        if ($errors) {
            $response['errors'] = $errors;
        }
        $code = ($status == 'error') ? 400 : 200;
        return $this->getResponse()->withJson($response, $code);
    }

    /**
     * Returns response to AJAX request
     *
     * @param string $status response status
     * @param array  $data   response data
     * @param array  $errors response errors
     *
     * @return Response
     */
    protected function getAjaxFileResponse(string $status, array $data = null, array $errors = null)
    {
        $response = ['status' => $status];
        if ($data) {
            $response['files'] = $data;
        }
        if ($errors) {
            $response['errors'] = $errors;
        }
        return $this->getResponse()->withJson($response);
    }

    /**
     * Adds errors messages to the session.
     *
     * @param array $errors error messages
     *
     * @return void
     */
    protected function displayFormErrors(array $errors)
    {
        $this->getService('flash')->addMessage('error', $errors);
    }

    /**
     * Adds old form data to the session.
     *
     * @param array $data old form input
     *
     * @return void
     */
    protected function displayFormInput(array $data)
    {
        $this->getService('flash')->addMessage('input', $data);
    }

    /**
     * Finds page name by route
     *
     * @param string $route URI
     *
     * @return string page name
     */
    protected function getPage(string $route)
    {
        $routes = $this->getService('config')->get()['routes'];
        $preparedRoute = substr($route, 1);
        $result = array_search($preparedRoute, $routes);
        return ($result) ? $result : '';
    }
}
