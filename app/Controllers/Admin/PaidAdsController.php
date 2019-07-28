<?php
/**
 * This file contains admin's PaidAdsController.
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
use App\Models\Common\DealerPaidAdsDataModel;
use Illuminate\Support\Collection;

/**
 * This controller contains actions for the Paid Ads page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class PaidAdsController extends ControllerAbstract
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
            'save' => $config['routes']['admin-paid-ads'],
        ];
        $fields = $config['fields']['admin_paid_ads'];
        $messages = $this->getService('flash')->getMessages();
        foreach ($messages as $key => $value) {
            if (!empty($value)) {
                $messages[$key] = $value[0];
            }
        }

        $dealers   = $this->getDealers();
        $data      = $this->getPaidAdsData();

        $data = compact('user', 'action', 'fields', 'messages', 'dealers', 'data');
        return $this->render('Admin/paid_ads/index.twig', $data);
    }

    /**
     * Stores dealer's social media data
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
     * Returns all paid ads data for all dealers
     *
     * @return Collection|bool
     */
    private function getPaidAdsData()
    {
        $dealerPaidAdsModel = new DealerPaidAdsDataModel(
            $this->dbService,
            $this->logger
        );
        $data = $dealerPaidAdsModel->getDealersPaidAdsData();
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
            'dealer'      => ['empty'],
            'year'        => ['empty', 'integer', 'min_value', 'max_value'],
            'month'       => ['empty', 'integer', 'min_value', 'max_value'],
            'impressions' => ['integer', 'min_value', 'max_value'],
            'clicks'      => ['integer', 'min_value', 'max_value'],
            'conversions' => ['integer', 'min_value', 'max_value'],
            'spend'       => ['integer', 'min_value', 'max_value'],
        ];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $errors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data,
                    ['form' => 'admin_paid_ads', 'field' => $field],
                    &$errors]
                );
            }
        }
        return $errors;
    }

    /**
     * Stores dealer's social media data into DB
     *
     * @param array $data form data
     *
     * @return bool status
     */
    private function storeData(array $data)
    {
        $dealerPaidAdsModel = new DealerPaidAdsDataModel(
            $this->dbService,
            $this->logger
        );
        $date = $this->getDate((int) $data['year'], (int) $data['month']);
        $params = [
            'dealer_id' => $data['dealer'],
            'date'      => $date
        ];
        $row = $dealerPaidAdsModel->getDealerPaidAdsData($params);
        if ($row) {
            $updateData = [
                'id'          => $row->id,
                'impressions' => $data['impressions'],
                'clicks'      => $data['clicks'],
                'conversions' => $data['conversions'],
                'spend'       => $data['spend'],
                'updated_at'  => gmdate('Y-m-d H:i:s'),
            ];

            $status = $dealerPaidAdsModel->updateDealerPaidAdsData($updateData);
            return $status;
        }
        $insertData = [
            'dealer_id'       => $data['dealer'],
            'date'            => $date,
            'impressions'     => $data['impressions'],
            'clicks'          => $data['clicks'],
            'conversions'     => $data['conversions'],
            'spend'           => $data['spend'],
            'updated_at'      => gmdate('Y-m-d H:i:s'),
        ];

        $status = $dealerPaidAdsModel->insertDealerPaidAdsData($insertData);
        return $status;
    }

    /**
     * Returns formated date Y-m-d
     *
     * @param int $year  year
     * @param int $month month
     *
     * @return string
     */
    private function getDate(int $year, int $month)
    {
        $date = new \DateTime();
        $date->setDate($year, $month, 1);
        $date = $date->format('Y-m-d');
        return $date;
    }

    /**
     * Redirects user to the form page.
     *
     * @return Response
     */
    private function goBack()
    {
        $config = $this->getService('config')->get();
        $redirectUrl = '/' . $config['routes']['admin-paid-ads'];
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
                'text' => $config['messages']['admin_paid_ads'][$status]
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
