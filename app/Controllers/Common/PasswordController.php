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
use App\Models\Dealers\PasswordResetModel;

/**
 * This controller contains actions for users authentication.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class PasswordController extends ControllerAbstract
{
    /**
     * Password reset token.
     */
    protected $token;

    /**
     * Renders the password reset page.
     *
     * @return string
     */
    public function index()
    {
        $action = $this->getService('config')->get()['routes']['password-reset'];
        $messages = $this->getService('flash')->getMessages();
        $data = compact('action', 'messages');

        return $this->render('Common/password_reset.twig', $data);
    }

    /**
     * Sends user an email with a reset password link.
     *
     * @return void
     */
    public function reset()
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
            $this->displayEmailError($data['email']);
            return $this->goBack();
        }

        if ($this->sendEmail($data['email'])) {
            $this->displayMessage('success');
        } else {
            $this->displayMessage('failure');
        }
        
        return $this->goBack();
    }

    /**
     * Handles password reset token.
     *
     * @return void
     */
    public function token()
    {
        $request = $this->getRequest();

        if (!$request->isGet()) {
            return $this->goBack();
        }

        $data = $request->getParams();

        if (false === $user = $this->getUserByToken($data)) {
            return $this->goBack();
        }

        $this->saveUserSession($user);

        return $this->goPassword();
    }

    /**
     * Renders create password page.
     *
     * @return string
     */
    public function create()
    {
        $settings = $this->getService('config')->get();
        $action = $settings['routes']['password-store'];
        $fields = $settings['fields']['user'];
        $messages = $this->getService('flash')->getMessages();
        $data = compact('action', 'messages', 'fields');

        return $this->render('Common/password_create.twig', $data);
    }

    /**
     * Handles new password form and stores new password.
     *
     * @return void
     */
    public function store()
    {
        $request = $this->getRequest();

        $userId = $this->getService('session')->password['user_id'];

        if (!$request->isPost() || !$userId) {
            $this->displayPasswordMessage('failure');
            return $this->goPassword();
        }

        $data = $request->getParams();

        if ($errors = $this->getPasswordFormErrors($data)) {
            $this->displayFormErrors($errors);
            return $this->goPassword();
        }

        $updateData = [
            'id' => $userId,
            'password' => password_hash($data['password'], PASSWORD_DEFAULT)
        ];

        $userModel = new UserModel($this->getService('db'));
        if (!$userModel->updateUser($updateData)) {
            $this->displayPasswordMessage('failure');
            return $this->goPassword();
        }

        $this->displayPasswordMessage('success');
        $this->removeUserSession();

        return $this->goLogin();
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

        return $errors;
    }

    /**
     * Validates password form inputs.
     *
     * @param array $data form inputs
     *
     * @return array errors
     */
    private function getPasswordFormErrors(array $data)
    {
        $errors = [];

        $this->addPasswordErrors($data, $errors);

        return $errors;
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
        foreach ($errors as $field => $error) {
            $this->getService('flash')->addMessage('error', $error);
        }
    }

    /**
     * Adds error message to the session.
     *
     * @param string $email
     *
     * @return void
     */
    private function displayEmailError(string $email)
    {
        $error = $this->getService('config')
            ->get()['errors']['password_reset']['not_exist'];
        $error = str_replace(':email', $email, $error);

        $this->getService('flash')->addMessage('error', $error);
    }

    /**
     * Adds status messages to the session.
     *
     * @param string $status 'success' / 'failure'
     *
     * @return void
     */
    private function displayMessage(string $status)
    {
        $message = [
            'status' => $status,
            'text'   => $this->getService('config')
                ->get()['messages']['password_reset'][$status]
        ];
        $this->getService('flash')->addMessage('message', $message);
    }

    /**
     * Adds status messages to the session.
     *
     * @param string $status 'success' / 'failure'
     *
     * @return void
     */
    private function displayPasswordMessage(string $status)
    {
        $message = [
            'status' => $status,
            'text'   => $this->getService('config')
                ->get()['messages']['password_create'][$status]
        ];
        $this->getService('flash')->addMessage('message', $message);
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
        $errors = $settings['errors']['password_reset']['email'];
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
        $errors = $settings['errors']['password_reset'];
        $fields = $settings['fields']['user']['password'];

        if (empty($data['password'])) {
            $formErrors[] = $errors['password']['empty'];
        }

        if (empty($data['password_confirm'])) {
            $formErrors[] = $errors['password_confirm']['empty'];
        }

        if (strlen($data['password']) < $fields['min_length']) {
            $formErrors[] = str_replace(
                ':length',
                $fields['min_length'],
                $errors['password']['min_length']
            );
        }

        if (strlen($data['password_confirm']) < $fields['min_length']) {
            $formErrors[] = str_replace(
                ':length',
                $fields['min_length'],
                $errors['password_confirm']['min_length']
            );
        }

        if ($data['password'] !== $data['password_confirm']) {
            $formErrors[] = $errors['password_confirm']['equal'];
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
        $user = $userModel->getUser($data);

        return (!empty($user)) ? $user : false;
    }

    /**
     * Redirects user to the token form page.
     *
     * @return Response
     */
    private function goBack()
    {
        $settings = $this->getService('config')->get();
        $redirectUrl = $settings['app']['url'] . '/' . $settings['routes']['password-reset'];
        return $this->getResponse()->withRedirect($redirectUrl, 301);
    }

    /**
     * Redirects user to the password form page.
     *
     * @return Response
     */
    private function goPassword()
    {
        $settings = $this->getService('config')->get();
        $redirectUrl = $settings['app']['url'] . '/' . $settings['routes']['password-create'];
        return $this->getResponse()->withRedirect($redirectUrl, 301);
    }

    /**
     * Redirects user to the login page.
     *
     * @return Response
     */
    private function goLogin()
    {
        $settings = $this->getService('config')->get();
        $redirectUrl = $settings['app']['url'] . '/' . $settings['routes']['login'];
        return $this->getResponse()->withRedirect($redirectUrl, 301);
    }


    /**
     * Sends email with reset password link.
     *
     * @param string $email
     *
     * @return bool
     */
    private function sendEmail(string $email)
    {
        if (!$this->handleToken($email)) {
            return false;
        }

        $link = $this->generateResetLink();

        $emailSettings = $this->getService('config')
            ->get()['email']['password_reset'];

        $subject = $emailSettings['subject'];
        $message = str_replace(':link', $link, $emailSettings['message']);

        return $this->getService('email')->sendEmail(
            [
                'emails' => [$email => ''],
                'subject' => $subject,
                'html' => $message,
            ]
        );
    }

    /**
     * Generates and stores password reset token.
     *
     * @param string $email user email
     *
     * @return bool
     */
    private function handleToken(string $email)
    {
        $this->generateToken($email);
        return $this->storeResetToken($email);
    }

    /**
     * Generates a reset password link.
     *
     * @return string
     */
    private function generateResetLink()
    {
        $link = $this->getService('config')->get()['app']['url'];
        $link .= '/' . $this->getService('config')->get()['routes']['token-reset']
              . '?token=' . $this->token;
        return $link;
    }

    private function generateToken(string $email)
    {
        $this->token = hash('sha256', $email . time());
    }

    /**
     * Stores generated reset token.
     *
     * @param string $email
     *
     * @return bool
     */
    private function storeResetToken(string $email)
    {
        $data = [
            'user_id'    => $this->getUserId($email),
            'token'      => $this->token,
            'expires_at' => date('Y-m-d H:i:s', time() + 86400),
            'used'       => false
        ];
        $passwordResetModel = new PasswordResetModel(
            $this->getService('db'),
            $this->getService('logger')
        );
        return $passwordResetModel->savePasswordReset($data);
    }

    /**
     * Get user id by user email.
     *
     * @param string $email user email
     *
     * @return int | bool
     */
    private function getUserId(string $email)
    {
        $userModel = new UserModel($this->getService('db'));
        $user = $userModel->getUser(compact('email'));
        if (!$user) {
            return false;
        }

        return $user->id;
    }

    /**
     * Get user record by token.
     *
     * @param array $data input data
     *
     * @return array | bool
     */
    private function getUserByToken(array $data)
    {
        $errorMessage = $this->getService('config')->get()
            ['errors']['password_reset']['token']['invalid'];

        if (empty($data['token'])) {
            $this->getService('flash')->addMessage('error', $errorMessage);
            return false;
        }

        $passwordResetModel = new PasswordResetModel(
            $this->getService('db'),
            $this->getService('logger')
        );
        $passwordReset = $passwordResetModel->getValidPasswordReset($data);

        if (!$passwordReset) {
            $this->getService('flash')->addMessage('error', $errorMessage);
            return false;
        }

        $userModel = new UserModel($this->getService('db'));
        $user = $userModel->getUser(['id' => $passwordReset->user_id]);

        if (!$user) {
            $this->getService('flash')->addMessage('error', $errorMessage);
            return false;
        }

        if (!$passwordResetModel->useToken($passwordReset->id)) {
            $this->getService('flash')->addMessage('error', $errorMessage);
            return false;
        }

        return $user;
    }

    /**
     * Stores user ID into session.
     *
     * @param mixed $user
     *
     * @return void
     */
    public function saveUserSession($user)
    {
        $this->getService('session')->password = [
            'user_id' => $user->id
        ];
    }

    /**
     * Removes user ID from session.
     *
     * @return void
     */
    public function removeUserSession()
    {
        unset($this->getService('session')->password);
    }
}
