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
use App\Models\Dealers\Company\CompanyModel;

/**
 * This controller contains actions for the Website - Place an Order page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class WebsiteInformationController extends CreateOrderController
{
    /**
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $data = $this->getIndexData();
        $data['action'] = [
            'form' => $this->getService('config')->get()['routes']['order-website-information'],
        ];
        $data['percentage'] = (empty($data['order']))
            ? $this->getPercentage([]) : $this->getPercentage($data['order']);
        $messages = $this->getService('flash')->getMessages();
        foreach ($messages as $key => $value) {
            if (!empty($value)) {
                $messages[$key] = $value[0];
            }
        }
        $data['messages'] = $messages;

        return $this->render('Dealers/website/order/design/website-information.twig', $data);
    }

    /**
     * Stores products number data
     *
     * @return void
     */
    public function store()
    {
        $request = $this->getRequest();
        
        if (!$request->isPost()) {
            return $this->goBack('design');
        }

        $data = $request->getParams();
        $errors = $this->validateData($data);
        if (!empty($errors['count'])) {
            $this->displayFormInput($data);
            $this->displayFormErrors($errors);
            return $this->goBack('website-information');
        }

        $data['user_id'] = $this->getService('session')->user['id'];
        $status = $this->updateWebsiteInformation($data);
        if (!$status) {
            $error = $this->getService('config')
                ->get()['errors']['not_saved'];
            $this->getService('flash')->addMessage('error', $error);
            return $this->goBack('website-information');
        }

        return $this->handleNextAction($data['action'], 'design', 'logo');
    }

    /**
     * Validates company form data.
     *
     * @param array $data company form data
     *
     * @return void
     */
    private function validateData(array $data)
    {
        $formErrors = [
            'company' => [],
            'count' => 0
        ];
        $formErrorsService = $this->getService('formErrors');

        $fieldsValidation = [
            'business_name'  => ['empty', 'max_length'],
            'street_address' => ['empty', 'max_length'],
            'address_line_2' => ['max_length'],
            'city'           => ['empty', 'max_length'],
            'state'          => ['empty', 'max_length'],
            'zip_code'       => ['empty', 'max_length'],
            'website'        => ['empty', 'max_length', 'url'],
            'company_phone'  => ['empty', 'max_length'],
        ];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $formErrors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data,
                    ['form' => 'company', 'field' => $field],
                    &$formErrors['company']]
                );
            }
        }
        return $formErrors;
    }

    /**
     * Updates website information data in DB
     *
     * @param array $data form data
     *
     * @return bool
     */
    private function updateWebsiteInformation(array $data)
    {
        $companyModel = new CompanyModel($this->getService('db'));
        $updateData = [
            'id'             => $data['company_id'],
            'business_name'  => $data['business_name'],
            'street'         => $data['street_address'],
            'address_line_2' => (empty($data['address_line_2'])) ? '' : $data['address_line_2'],
            'city'           => $data['city'],
            'state'          => $data['state'],
            'zip'            => $data['zip_code'],
            'website'        => $data['website'],
        ];
        $status = $companyModel->updateCompany($updateData);
        return $status;
    }
}
