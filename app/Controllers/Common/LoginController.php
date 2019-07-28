<?php
/**
 * This file contains portal's HomeController.
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
namespace App\Controllers\Common;

use App\Kernel\ControllerAbstract;
use App\Kernel\Slim\App;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Dealers\User\UserModel;
use App\Models\Dealers\User\UserTypeModel;

/**
 * This controller contains actions for users authentication.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class LoginController extends ControllerAbstract
{
    /**
     * Renders the login page.
     *
     * @return string
     */
    public function index()
    {
        $messages = $this->getService('flash')->getMessages();
        $settings = $this->getService('config')->get();
        $fields = $settings['fields']['user'];
        $action = $settings['routes']['login'];
        $links  = [
            'reset' => $settings['routes']['password-reset']
        ];
        $data = compact('messages', 'fields', 'action', 'links');

        return $this->render('Common/login.twig', $data);
    }

    /**
     * Processes users' credentials and login users or return errors.
     *
     * @return void
     */
    public function login()
    {
        $request = $this->getRequest();

        if (!$request->isPost()) {
            return $this->goBack();
        }

        $data = $request->getParams();

        if ($errors = $this->getFormErrors($data)) {
            $this->displayFormErrors($errors);
            return $this->goBack();
        }

        if (false === $user = $this->getUser($data)) {
            $this->displayLoginError();
            return $this->goBack();
        }
        $this->saveSession($user);
        if ($this->isAdmin()) {
            return $this->goAdmin();
        } elseif ($this->isDealer()) {
            return $this->goDashboard();
        }

        return $this->logout();
    }

    /**
     * Logs user out.
     *
     * @return void
     */
    public function logout()
    {
        $this->unsetSession();
        return $this->goBack();
    }

    /**
     * Validates form inputs.
     *
     * @param array $data form inputs
     *
     * @return array errors
     */
    private function getFormErrors(array $data)
    {
        $errors = [];

        $this->addEmailErrors($data, $errors);
        $this->addPasswordErrors($data, $errors);

        return $errors;
    }

    /**
     * Validates email input.
     *
     * @param array $data       form inputs
     * @param array $formErrors form errors
     *
     * @return void
     */
    private function addEmailErrors(array $data, array &$formErrors)
    {
        $settings = $this->getService('config')->get();
        $errors = $settings['errors']['login']['email'];
        $fields = $settings['fields']['user']['email'];

        if (empty($data['email'])) {
            $formErrors[] = $errors['empty'];
        }

        if (strlen($data['email']) > $fields['max_length']) {
            $formErrors[] = str_replace(
                ':length',
                $fields['max_length'],
                $errors['max_length']
            );
        }

        if (false === filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $formErrors[] = $errors['invalid'];
        }
    }

    /**
     * Validates password inputs.
     *
     * @param array $data       form inputs
     * @param array $formErrors form errors
     *
     * @return void
     */
    private function addPasswordErrors(array $data, array &$formErrors)
    {
        $settings = $this->getService('config')->get();
        $errors = $settings['errors']['login']['password'];
        $fields = $settings['fields']['user']['password'];

        if (empty($data['password'])) {
            $formErrors[] = $errors['empty'];
        }

        if (strlen($data['password']) < $fields['min_length']) {
            $formErrors[] = str_replace(
                ':length',
                $fields['min_length'],
                $errors['min_length']
            );
        }
    }

    /**
     * Checks user record in the DB.
     *
     * @param array $data user data
     *
     * @return object | bool
     */
    private function getUser(array $data)
    {
        $userModel = new UserModel($this->getService('db'));
        $user = $userModel->getUserByCredentials($data);

        return (!empty($user)) ? $user : false;
    }

    /**
     * Adds error message to the session.
     *
     * @return void
     */
    private function displayLoginError()
    {
        $error = $this->getService('config')
            ->get()['errors']['login']['not_exist'];
        $this->getService('flash')->addMessage('error', $error);
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
        foreach ($errors as $error) {
            $this->getService('flash')->addMessage('error', $error);
        }
    }

    /**
     * Redirects user to the form page.
     *
     * @return Response
     */
    private function goBack()
    {
        $redirectUrl = $this->getService('config')->get()['routes']['login'];
        return $this->getResponse()->withRedirect($redirectUrl, 301);
    }

    /**
     * Redirects user to the dashboard.
     *
     * @return Response
     */
    private function goDashboard()
    {
        $redirectUrl = $this->getService('config')->get()['routes']['dashboard'];
        return $this->getResponse()->withRedirect($redirectUrl, 301);
    }

    /**
     * Redirects user to the admin dashboard.
     *
     * @return Response
     */
    private function goAdmin()
    {
        $redirectUrl = $this->getService('config')->get()['routes']['admin'];
        return $this->getResponse()->withRedirect($redirectUrl, 301);
    }

    /**
     * Stores user data into session.
     *
     * @param object $user user data
     *
     * @return void
     */
    private function saveSession($user)
    {
        $this->getService('session')->user = [
            'id'    => $user->id,
            'email' => $user->email,
            'role'  => $this->getUserRole($user->type_id),
            'portal_type' => $user->portal_type

        ];
    }

    /**
     * Unsets user session
     *
     * @return void
     */
    private function unsetSession()
    {
        unset($this->getService('session')->user);
    }

    /**
     * Returns user's role
     *
     * @param int $userTypeId user ID
     *
     * @return string 'admin'|'dealer'|'vendor'
     */
    private function getUserRole(int $userTypeId)
    {
        $userTypeModel = new UserTypeModel($this->getService('db'), $this->getService('logger'));
        $role = $userTypeModel->getUserType($userTypeId);
        return $role;
    }

    /**
     * Checks if user is admin.
     *
     * @return boolean
     */
    private function isAdmin()
    {
        return ($this->getService('session')->user['role'] === 'admin');
    }

    /**
     * Checks if user is dealer.
     *
     * @return boolean
     */
    private function isDealer()
    {
        return ($this->getService('session')->user['role'] === 'dealer');
    }
}
