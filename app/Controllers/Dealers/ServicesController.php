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
namespace App\Controllers\Dealers;

use App\Kernel\Slim\App;
use App\Controllers\Dealers\DealersController;
use App\Models\Dealers\Costs\CostsOptionsModel;
use App\Models\Dealers\Costs\CostsTypesModel;
use App\Models\Dealers\Order\OrderModel;
use App\Models\Dealers\Order\OrderCostsModel;
use App\Models\Common\ServiceModel;
use App\Models\Common\DealerServiceDataModel;
use App\Models\Common\DealerBillingDataModel;
use App\Models\Dealers\User\UserModel;
use Illuminate\Support\Collection;

/**
 * This controller contains actions for the Social Media page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class ServicesController extends DealersController
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

        $config = $this->getService('config')->get();
        $menu   = $this->getMenuItems();
        $route  = $this->getCurrentRoute();
        $action = $config['routes']['services'];

        $user    = $this->getService('session')->user;
        $company = $this->getCompany($user['id']);

        $costs         = $this->getCosts();
        $order         = $this->getCompletedOrder($user['id']);
        $services      = $this->getServices();
        $subscriptions = $this->getDealerServices($services, $user['id']);
        $billing       = $this->getDealerBilling($user['id']);

        $data = compact(
            'menu', 'route', 'action', 'user', 'company', 'costs', 'order',
            'services', 'subscriptions', 'billing'
        );

        return $this->render('Dealers/services/index.twig', $data);
    }

    public function store()
    {
        $this->dbService = $this->getService('db');
        $this->logger    = $this->getService('logger');

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
        $config = $this->getService('config')->get();

        $data['user_id'] = $this->getService('session')->user['id'];
        $status = $this->storeData($data);
        if (!$status) {
            $error = $config['errors']['not_saved'];
            return $this->getAjaxResponse('error', null, [$error]);
        }
        $status = $this->sendEmail($data);
        if (!$status) {
            $error = $config['errors']['not_saved'];
            return $this->getAjaxResponse('error', null, [$error]);
        }

        return $this->getAjaxResponse('success');
    }

    /**
     * Returns costs options grouped by types.
     *
     * @param string $group costs' group
     *
     * @return array              [[type_name => [options]]]
     */
    private function getCosts(string $group = null)
    {
        $types = $this->getCostsTypes($group);
        if (!$types) {
            return false;
        }

        $dbService = $this->getService('db');
        $costs = [];
        foreach ($types as $type) {
            $optionsModel = new CostsOptionsModel($dbService);
            $options = $optionsModel->getCostsOptions($type->id);
            $optionsCount = 0;
            foreach ($options as $option) {
                if ($option->title) {
                    $optionsCount++;
                }
            }
            $costs[$type->name] = [
                'group'          => $type->group,
                'subgroup'       => $type->subgroup,
                'title'          => $type->title,
                'default'        => $type->default_option_id,
                'options'        => $options,
                'options_count'  => $optionsCount
            ];
        }
        return $costs;
    }

    /**
     * Returns costs types.
     *
     * @param string $group costs types' group
     *
     * @return array costs types
     */
    private function getCostsTypes(string $group = null)
    {
        $params = empty($group) ? [] : compact('group');
        $typesModel = new CostsTypesModel($this->getService('db'));
        $types = $typesModel->getCostsTypes($params);
        return $types;
    }

    /**
     * Returns completed order
     *
     * @param int $userId order's owner ID
     *
     * @return array|bool
     */
    protected function getCompletedOrder(int $userId)
    {
        $dbService = $this->getService('db');
        $orderModel = new OrderModel($dbService);
        $order = $orderModel->getCompletedOrder($userId);
        if (!$order) {
            return [];
        }

        $orderCostsModel = new OrderCostsModel($dbService);
        $orderCosts = $orderCostsModel->getOrderTypesCosts($order->id);

        $data = ['order' => $order, 'costs' => [], 'order_costs_ids' => []];

        foreach ($orderCosts as $row) {
            if (array_key_exists($row->name, $data['costs'])) {
                if (!is_array($data['costs'][$row->name])) {
                    $data['costs'][$row->name] = [$data['costs'][$row->name]];
                }
                $data['costs'][$row->name][] = $row->costs_option_id;
            } else {
                $data['costs'][$row->name] = $row->costs_option_id;
            }
            $data['order_costs_ids'][$row->name][] = $row->id;
        }
        return $data;
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
        $errors = ['services' => [], 'count' => 0];

        $formErrorsService = $this->getService('formErrors');

        $fieldsValidation = [
            'quarters'  => ['empty', 'integer', 'min_value'],
        ];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $errors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data,
                    ['form' => 'services', 'field' => $field],
                    &$errors['services']]
                );
            }
        }

        return $errors;
    }

    /**
     * Sends notification email
     *
     * @param array $data form data
     *
     * @return bool status
     */
    private function sendEmail(array $data)
    {
        $emailData = $this->prepareEmailData($data);
        $mailer = $this->getService('email');
        $config = $this->getService('config')->get()['email'];
        $adminEmails = $config['service_subscribe']['email'];

        $statuses = [];
        foreach ($adminEmails as $email) {
            $emailData['emails'] = [$email => ''];
            $statuses[] = $mailer->sendEmail($emailData);
            $mailer->refresh();
        }
        $status = array_sum($statuses);
        return $status;
    }

    /**
     * Prepares data for notification email
     *
     * @param array $data form data
     *
     * @return array
     */
    private function prepareEmailData(array $data)
    {
        $config = $this->getService('config')->get()['email']['service_subscribe'];

        $user = $this->getUser();
        $dealer = ($user->first_name || $user->last_name)
            ? $user->first_name . ' ' . $user->last_name : $user->email;

        $service = ucwords(str_replace('_', ' ', $data['service']));

        $html = file_get_contents($config['template']);
        $html = str_replace(
            [':dealer', ':service', ':quarters'],
            [$dealer, $service, $data['quarters']],
            $html
        );

        $text = str_replace(
            [':dealer', ':service', ':quarters'],
            [$dealer, $service, $data['quarters']],
            $config['message']
        );

        $emailData = [
            // 'emails'      => [$config['email'] => ''],
            'html'        => $html,
            'text'        => $text,
            'subject'     => $config['subject'],
            'attachments' => []
        ];
        return $emailData;
    }

    /**
     * Returns all services
     *
     * @return Collection|bool
     */
    private function getServices()
    {
        $serviceModel = new ServiceModel($this->dbService, $this->logger);
        $result = $serviceModel->getServices();
        if (!$result) {
            return false;
        }

        $services = $this->prepareServices($result);
        return $services;
    }

    /**
     * Prepares services array (key = service ID)
     *
     * @param Collection $rows DB rows
     *
     * @return array [[id => service], [id => service], ...]
     */
    private function prepareServices(Collection $rows)
    {
        $services = [];
        foreach ($rows as $row) {
            $services[$row->name] = $row;
        }
        return $services;
    }

    /**
     * Returns dealer services
     *
     * @param array $services services
     * @param int   $dealerId dealer ID
     *
     * @return array
     */
    private function getDealerServices(array $services, int $dealerId)
    {
        $dealerServiceModel = new DealerServiceDataModel(
            $this->dbService,
            $this->logger
        );
        $results = $dealerServiceModel->getDealersServiceData(
            ['dealer_id' => $dealerId]
        );
        if (!$results) {
            return false;
        }

        $dealerServices = $this->prepareDealerServices($results, $services);
        return $dealerServices;
    }

    /**
     * Prepares dealer services array (key = service name)
     *
     * @param Collection $rows     DB rows
     * @param array      $services services
     *
     * @return array [[name => service], [name => service], ...]
     */
    private function prepareDealerServices(Collection $rows, array $services)
    {
        $dealerServices = [];

        foreach ($services as $service) {
            foreach ($rows as $row) {
                if ($row->service_id === $service->id) {
                    $dealerServices[$service->name] = $row;
                }
            }
        }
        return $dealerServices;
    }

    /**
     * Returns dealer billing data if exists
     *
     * @param int $dealerId dealer ID
     *
     * @return Collection
     */
    private function getDealerBilling(int $dealerId)
    {
        $dealerBillingModel = new DealerBillingDataModel(
            $this->dbService,
            $this->logger
        );
        $billing = $dealerBillingModel->getDealerBillingData($dealerId);
        return $billing;
    }

    private function storeData(array $data)
    {
        $services = $this->getServices();

        $insertData = [
            'dealer_id'   => $data['user_id'],
            'service_id'  => $services[$data['service']]->id,
            'quarters'    => $data['quarters'],
            'is_approved' => 0,
            'updated_at'  => gmdate('Y-m-d H:i:s'),
        ];

        $dealerServiceModel = new DealerServiceDataModel(
            $this->dbService,
            $this->logger
        );
        $dealerServiceModel->deleteDealerServiceData(
            $data['user_id'],
            $services[$data['service']]->id
        );
        $status = $dealerServiceModel->insertDealerServiceData($insertData);
        return $status;
    }

    /**
     * Returns admins emails and names
     *
     * @return array [[email => name]]
     */
    private function getAdminEmails()
    {
        $emails = [];

        $userModel = new UserModel($this->dbService);
        $admins = $userModel->getAdmins();
        if (!$admins) {
            return $emails;
        }

        foreach ($admins as $admin) {
            $emails[$admin->email] = $admin->first_name . ' ' . $admin->last_name;
        }
        return $emails;
    }
}
