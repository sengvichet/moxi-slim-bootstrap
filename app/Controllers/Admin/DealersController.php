<?php
/**
 * This file contains admin's DealersController.
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
use App\Models\Common\Gmb\GmbLocationModel;
use App\Models\Common\Gmb\DealersGmbAccountsModel;
use App\Models\Dealers\User\UserModel;
use App\Models\Dealers\User\UserTypeModel;

/**
 * This controller contains actions for the Dealers page.
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
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $user = $this->getService('session')->user;
        $accounts = $this->getAccounts();
        $dealers = $this->getDealers();

        $routes = $this->getService('config')->get()['routes'];
        $action = [
            'home'   => $routes['admin'],
            'save'   => $routes['admin-dealers'],
            'delete' => $routes['admin-dealers'],
            'update' => $routes['admin-dealers-update'],
            'create' => $routes['admin-company-create'],
        ];
        $messages = $this->getService('flash')->getMessages();
        foreach ($messages as $key => $value) {
            if (!empty($value)) {
                $messages[$key] = $value[0];
            }
        }

        $data = compact('user', 'action', 'accounts', 'dealers', 'messages');
        return $this->render('Admin/dealers/index.twig', $data);
    }

    /**
     * Stores new dealer into DB
     *
     * @return string
     */
    public function store()
    {
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return $this->goBack();
        }

        $data = $request->getParams();
        $errors = $this->validateData($data);
        if (!empty($errors['count'])) {
            $this->displayFormInput($data);
            $this->displayFormErrors($errors);
            $this->displayFormMessage('error');
            return $this->goBack();
        }
        $status = (empty($data['id']))
            ? $this->storeData($data) : $this->editData($data);
        return;
        if ($status) {
            $this->displayFormMessage('success');
        } else {
            $this->displayFormInput($data);
            $this->displayFormMessage('error');
        }

        return $this->goBack();
    }

    /**
     * Updates dealer into DB
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

        $status = $this->updateData($data);

        return $this->goBack();
    }

    /**
     * Deletes dealer from DB
     *
     * @param string $id dealer ID
     *
     * @return string
     */
    public function delete($id)
    {
        $status = $this->deleteDealer($id);

        return $this->getResponse()->withJson(
            ['status'  => ($status) ? 'success' : 'error']
        );
    }

    /**
     * Returns GMB accounts
     *
     * @return Collection|bool
     */
    private function getAccounts()
    {
        $locationModel = new GmbLocationModel($this->getService('db'), $this->getService('logger'));
        $accounts = $locationModel->getAccounts();
        return $accounts;
    }

    /**
     * Returns GMB dealers
     *
     * @return Collection|bool
     */
    private function getDealers()
    {
        $userModel = new UserModel($this->getService('db'));
        $dealers = $userModel->getGmbDealers();
        return $dealers;
    }

    /**
     * Validates form data
     *
     * @param array $data form data
     *
     * @return array of errors
     */
    private function validateData(array $data)
    {
        $errors = ['count' => 0];
        $formErrorsService = $this->getService('formErrors');

        $fieldsValidation = [
            'email'    => ['empty', 'email'],
            'password' => ['empty'],
        ];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $errors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data, ['form' => 'dealers', 'field' => $field], &$errors]
                );
            }
        }
        return $errors;
    }

    /**
     * Stores dealer's data into DB
     *
     * @param array $data form data
     *
     * @return bool status
     */
    private function storeData(array $data)
    {
        $userId = $this->storeDealer($data);
        if ($userId && !empty($data['account_id'])) {
            return $this->storeDealerAccount($userId, $data['account_id']);
        }

        return $userId;
    }

    /**
     * Updates dealer's data into DB
     *
     * @param array $data form data
     *
     * @return bool status
     */
    private function editData(array $data)
    {
        $status = $this->editDealer($data);

        return $status;
    }

    /**
     * Updates dealer's data
     *
     * @param array $data form data
     *
     * @return bool status
     */
    private function updateData(array $data)
    {
        $status = $this->storeDealerAccount($data['dealer_id'], $data['account_id']);
        return $status;
    }

    /**
     * Stores dealer into DB
     *
     * @param array $data dealer data
     *
     * @return bool status
     */
    private function storeDealer(array $data)
    {
        $dealerTypeId = $this->getDealerTypeId();
        if (!$dealerTypeId) {
            return false;
        }
        $user = [
            'email'    => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'type_id'  => $dealerTypeId,
            'portal_type' => $data['portal_type']
        ];
        $userModel = new UserModel($this->getService('db'));
        $userId = $userModel->insertUser($user);
        return $userId;
    }

    /**
     * Edits dealer into DB
     *
     * @param array $data dealer data
     *
     * @return bool status
     */
    private function editDealer(array $data)
    {
        $user = [
            'id'       => $data['id'],
            'email'    => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT)
        ];
        $userModel = new UserModel($this->getService('db'));
        $status = $userModel->updateUser($user);
        return $status;
    }

    /**
     * Deletes dealer from DB
     *
     * @param int $id dealer ID
     *
     * @return bool status
     */
    private function deleteDealer(int $id)
    {
        $userModel = new UserModel($this->getService('db'));
        $status = $userModel->deleteUser($id);
        return $status;
    }

    /**
     * Stores dealer - GMB account relationship
     *
     * @param int    $dealerId  dealer ID
     * @param string $accountId GMB account ID
     *
     * @return bool status
     */
    private function storeDealerAccount(int $dealerId, string $accountId)
    {
        $data = ['user_id' => $dealerId, 'account_id' => $accountId];
        $dealerModel = new DealersGmbAccountsModel(
            $this->getService('db'),
            $this->getService('logger')
        );
        $status = $dealerModel->insertDealerAccount($data);
        return $status;
    }

    /**
     * Returns id of 'dealer' user type
     *
     * @return int|bool
     */
    private function getDealerTypeId()
    {
        $userTypeModel = new UserTypeModel(
            $this->getService('db'),
            $this->getService('logger')
        );
        $type = $userTypeModel->getDealerType();

        return (empty($type->id)) ? false : $type->id;
    }

    /**
     * Redirects user to the form page.
     *
     * @return Response
     */
    private function goBack()
    {
        $redirectUrl = '/' . $this->getService('config')->get()['routes']['admin-dealers'];
        return $this->getResponse()->withRedirect($redirectUrl, 301);
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
                'text' => $config['messages']['admin_dealers'][$status]
            ]]
        );
    }

    /**
     * Adds errors messages to the session.
     *
     * @param array $errors error messages
     *
     * @return void
     */
    private function displayFormErrors(array $errors)
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
    private function displayFormInput(array $data)
    {
        $this->getService('flash')->addMessage('input', $data);
    }
}
