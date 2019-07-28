<?php
/**
 * This file contains admin's BillingController.
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
use App\Models\Dealers\User\UserModel;
use App\Models\Common\DealerBillingDataModel;
use Illuminate\Support\Collection;

/**
 * This controller contains actions for the Billing page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class BillingController extends ControllerAbstract
{
    /**
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $this->dbService = $this->getService('db');
        $this->logger    = $this->getService('logger');

        $user = $this->getService('session')->user;
        $config = $this->getService('config')->get();
        $action = [
            'home' => $config['routes']['admin'],
            'save' => $config['routes']['admin-billing'],
        ];
        $fields = $config['fields']['admin_billing'];
        $messages = $this->getService('flash')->getMessages();
        foreach ($messages as $key => $value) {
            if (!empty($value)) {
                $messages[$key] = $value[0];
            }
        }

        $dealers   = $this->getDealers();
        $data      = $this->getBillingData();

        $data = compact('user', 'action', 'fields', 'messages', 'dealers', 'data');
        return $this->render('Admin/billing/index.twig', $data);
    }

    /**
     * Stores dealer's billing data
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
        $this->dbService = $this->getService('db');
        $this->logger    = $this->getService('logger');

        $status = $this->storeData($data);
        if ($status) {
            $this->displayFormMessage('success');
        } else {
            $this->displayFormInput($data);
            $this->displayFormMessage('error');
        }

        return $this->goBack();
    }

    /**
     * Returns all dealers
     *
     * @return Collection|bool
     */
    private function getDealers()
    {
        $userModel = new UserModel($this->dbService);
        $result = $userModel->getDealers();
        if (!$result) {
            return false;
        }

        $dealers = $this->prepareDealers($result);
        return $dealers;
    }

    /**
     * Prepares dealers array (key = dealer ID)
     *
     * @param Collection $rows DB rows
     *
     * @return array [[id => dealer], [id => dealer], ...]
     */
    private function prepareDealers(Collection $rows)
    {
        $dealers = [];
        foreach ($rows as $row) {
            $dealers[$row->id] = $row;
        }
        return $dealers;
    }

    /**
     * Returns all billing data for all dealers
     *
     * @return Collection|bool
     */
    private function getBillingData()
    {
        $dealerBillingModel = new DealerBillingDataModel(
            $this->dbService,
            $this->logger
        );
        $data = $dealerBillingModel->getDealersBillingData();
        return $data;
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
            'dealer'                 => ['empty'],
            'billing_frequency'      => ['empty'],
            'next_bill_date'         => ['empty', 'date', 'min_value'],
            'billing_details'        => ['empty', 'max_length'],
            'payment_method'         => ['empty', 'max_length'],
        ];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $errors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data,
                    ['form' => 'admin_billing', 'field' => $field],
                    &$errors]
                );
            }
        }
        return $errors;
    }

    /**
     * Stores dealer's billing data into DB
     *
     * @param array $data form data
     *
     * @return bool status
     */
    private function storeData(array $data)
    {
        $dealerBillingModel = new DealerBillingDataModel(
            $this->dbService,
            $this->logger
        );
        $billing = $dealerBillingModel->getDealerBillingData($data['dealer']);
        if ($billing) {
            $updateData = [
                'dealer_id'         => $data['dealer'],
                'billing_frequency' => $data['billing_frequency'],
                'next_bill_date'    => $data['next_bill_date'],
                'billing_details'   => $data['billing_details'],
                'payment_method'    => $data['payment_method'],
                'updated_at'        => gmdate('Y-m-d H:i:s'),
            ];

            $status = $dealerBillingModel->updateDealerBillingData($updateData);
            return $status;
        }
        $insertData = [
            'dealer_id'         => $data['dealer'],
            'billing_frequency' => $data['billing_frequency'],
            'next_bill_date'    => $data['next_bill_date'],
            'billing_details'   => $data['billing_details'],
            'payment_method'    => $data['payment_method'],
            'updated_at'        => gmdate('Y-m-d H:i:s'),
        ];

        $status = $dealerBillingModel->insertDealerBillingData($insertData);
        return $status;
    }

    /**
     * Redirects user to the form page.
     *
     * @return Response
     */
    private function goBack()
    {
        $config = $this->getService('config')->get();
        $redirectUrl = '/' . $config['routes']['admin-billing'];
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
                'text' => $config['messages']['admin_billing'][$status]
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
