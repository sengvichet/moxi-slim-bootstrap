<?php
/**
 * This file contains admin's ServicesController.
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
use App\Models\Common\ServiceModel;
use App\Models\Common\DealerServiceDataModel;
use Illuminate\Support\Collection;

/**
 * This controller contains actions for the Services page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class ServicesController extends ControllerAbstract
{
    /**
     * DB service
     *
     * @var \Illuminate\Database\Capsule\Manager
     */
    private $dbService;
    /**
     * Log service
     *
     * @var \Monolog\Logger
     */
    private $logger;
    /**
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $this->dbService = $this->getService('db');
        $this->logger    = $this->getService('logger');
        $config          = $this->getService('config')->get();

        $user = $this->getService('session')->user;
        $dealers = $this->getDealers();
        $services = $this->getServices();

        $routes = $config['routes'];
        $action = [
            'home'   => $routes['admin'],
            'save'   => $routes['admin-services'],
            'update' => $routes['admin-services-update'],
        ];
        $fields = $config['fields']['admin_services'];
        $messages = $this->getService('flash')->getMessages();
        foreach ($messages as $key => $value) {
            if (!empty($value)) {
                $messages[$key] = $value[0];
            }
        }
        $data = $this->getDealerServiceData($dealers, $services);

        $data = compact('user', 'action', 'messages', 'fields', 'dealers', 'services', 'data');
        return $this->render('Admin/services/index.twig', $data);
    }

    /**
     * Stores dealer's services data
     *
     * @return string
     */
    public function store()
    {
        $this->dbService = $this->getService('db');
        $this->logger    = $this->getService('logger');

        $request = $this->getRequest();
        if (!$request->isPost()) {
            return $this->goBack();
        }

        $data = $request->getParams();
        $services = $this->getServices();

        $errors = $this->validateData($services, $data);
        if (!empty($errors['count'])) {
            $this->displayFormInput($data);
            $this->displayFormErrors($errors);
            $this->displayFormMessage('error');
            return $this->goBack();
        }
        $this->dbService = $this->getService('db');
        $this->logger    = $this->getService('logger');

        $status = $this->storeData($services, $data);
        if ($status) {
            $this->displayFormMessage('success');
        } else {
            $this->displayFormInput($data);
            $this->displayFormMessage('error');
        }

        return $this->goBack();
    }

    /**
     * Updates dealer's services data
     *
     * @return string
     */
    public function update()
    {
        $request = $this->getRequest();
        if (!$request->isXhr()) {
            return $this->goBack();
        }

        if (!$request->isPost()) {
            return $this->getAjaxResponse('error');
        }

        $this->dbService = $this->getService('db');
        $this->logger    = $this->getService('logger');
        $config          = $this->getService('config')->get();

        $data = $request->getParams();
        $services = $this->getServices();

        $status = $this->updateData($services, $data);
        if ($status) {
            return $this->getAjaxResponse('success');
        } else {
            $error = $config['errors']['not_saved'];
            return $this->getAjaxResponse('error', null, [$error]);
        }
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
            $services[$row->id] = $row;
        }
        return $services;
    }

    /**
     * Validates form data
     *
     * @param array $services services
     * @param array $data     form data
     *
     * @return array of errors
     */
    private function validateData(array $services, array $data)
    {
        $errors = ['count' => 0];
        $formErrorsService = $this->getService('formErrors');

        $fieldsValidation = [
            'dealer' => ['empty'],
        ];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $errors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data,
                    ['form' => 'admin_services', 'field' => $field],
                    &$errors]
                );
            }
        }

        $field = 'quarters';
        $rules = ['integer', 'min_value'];
        foreach ($services as $service) {
            if (!array_key_exists($service->name . '_quarters', $data)) {
                continue;
            }
            $errors[$service->name] = [];
            $formData['quarters'] = $data[$service->name . '_quarters'];
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $errors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$formData,
                    ['form' => 'admin_services', 'field' => $field],
                    &$errors[$service->name]]
                );
            }
        }

        return $errors;
    }

    /**
     * Stores dealer's services data into DB
     *
     * @param array $services services
     * @param array $data     form data
     *
     * @return bool status
     */
    private function storeData(array $services, array $data)
    {
        $status = true;
        $dealerServiceModel = new DealerServiceDataModel(
            $this->dbService,
            $this->logger
        );
        $dealerServiceModel->deleteDealerServiceData($data['dealer']);
        foreach ($services as $service) {
            if (!empty($data[$service->name . '_quarters'])) {
                $insertData = [
                    'dealer_id'       => $data['dealer'],
                    'service_id'      => $service->id,
                    'quarters'        => $data[$service->name . '_quarters'],
                    'is_approved'     => 1,
                    'updated_at'      => gmdate('Y-m-d H:i:s'),
                ];
                $status &= $dealerServiceModel->insertDealerServiceData($insertData);
            }
        }
        return $status;
    }

    /**
     * Updates dealer's services data into DB
     *
     * @param array $services services
     * @param array $data     form data
     *
     * @return bool status
     */
    private function updateData(array $services, array $data)
    {
        $status = true;
        $dealerServiceModel = new DealerServiceDataModel(
            $this->dbService,
            $this->logger
        );
        $updateData = [
            'dealer_id'   => $data['dealer'],
            'service_id'  => $data['service'],
            'is_approved' => $data['approved'],
            'updated_at'  => gmdate('Y-m-d H:i:s'),
        ];
        $status = $dealerServiceModel->updateDealerServiceData($updateData);
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
        $redirectUrl = '/' . $config['routes']['admin-services'];
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
                'text' => $config['messages']['admin_services'][$status]
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

    /**
     * Returns prepared dealer service data
     *
     * @param array $dealers  dealers
     * @param array $services services
     *
     * @return array
     */
    private function getDealerServiceData(array $dealers, array $services)
    {
        $data = [];
        foreach ($dealers as $dealerId => $dealer) {
            $data[$dealerId] = ['total' => 0];
            foreach ($services as $service) {
                $data[$dealerId][$service->id] = null;
            }

            $dealerServiceModel = new DealerServiceDataModel(
                $this->dbService,
                $this->logger
            );
            $dealerServices = $dealerServiceModel->getDealersServiceData(
                ['dealer_id' => $dealerId]
            );
            foreach ($dealerServices as $dealerService) {
                $serviceId = $dealerService->service_id;
                $data[$dealerId][$serviceId] = [
                    'quarters'    => $dealerService->quarters,
                    'is_approved' => $dealerService->is_approved,
                ];
                $data[$dealerId]['total']
                    += $services[$serviceId]->cost * $dealerService->quarters;
            }
        }
        return $data;
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
}
