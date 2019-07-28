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
namespace App\Controllers\Dealers\Website\Order\Create;

use App\Kernel\ControllerAbstract;
use App\Kernel\Slim\App;
use App\Controllers\Dealers\Website\Order\Create\CreateOrderController;
use App\Controllers\Dealers\CompanyProfile\CompanyProfileController;
use App\Models\Dealers\Company\CompanyContactModel;
use App\Models\Dealers\Order\OrderModel;

/**
 * This controller contains actions for the Website - Place an Order page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class BusinessInformationController extends CreateOrderController
{
    private $companyProfileController;
    /**
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $this->companyProfileController = new CompanyProfileController($this->container);
        $data = $this->getIndexData();
        $config = $this->getService('config')->get();
        $routes = $config['routes'];
        $data['action'] = [
            'form' => $routes['order-business-information'],
        ];
        $data['contact_information'] = [
            'action' => $routes['contact-information-ajax'],
            'data'   => $this->getContactInformation($data['company']),
        ];
        $data['website_information'] = [
            'action' => $routes['website-information-ajax'],
            'data'   => $this->getWebsiteInformation($data['company']),
        ];
        $data['essential_information'] = [
            'action'          => $routes['essential-information-ajax'],
            'all_hours_label' => $config['misc']['essential_information']['24_hours_label'],
            'hours'           => $this->getHoursList(),
            'days'            => $this->getDaysList(),
            'payment_methods' => $this->getPaymentMethods(),
            'data'            => $this->getEssentialInformation($data['company']),
        ];
        $data['social_media'] = [
            'action'       => $routes['social-media-ajax'],
            'social_media' => $this->getSocialMedia(),
            'data'         => $this->getSocialMediaInformation($data['company']),
        ];
        $data['tabs'] = $this->getTabs();
        $data['page'] = $this->getPage($data['route']);
        $data['icon'] = true;
        $data['gmb'] = $this->hasGmbAccount($data['user']->id);
        return $this->render('Dealers/website/order/business-information.twig', $data);
    }

    public function __call($method, $args)
    {
        return call_user_func_array([$this->companyProfileController, $method], $args);
    }

    /**
     * Handles form
     *
     * @return string
     */
    public function store()
    {
        $request = $this->getRequest();

        if (!$request->isPost()) {
            return $this->goBack('business-information');
        }

        $data = $request->getParams();
        $orderModel = new OrderModel($this->getService('db'));
        $orderModel->updateOrder(['completed' => 0, 'ready' => 1, 'id' => $data['order_id']]);

        return $this->handleNextAction($data['action'], 'end', 'design');
    }

    /**
     * Fetches company and contacts information from DB
     *
     * @param object $company company basic information
     *
     * @return array
     */
    private function getContactInformation($company)
    {
        $information = ['company' => [], 'contacts' => []];
        if (!$company) {
            return $information;
        }

        $dbService = $this->getService('db');
        $companyContactModel = new CompanyContactModel($dbService);
        $contacts['primary'] = $companyContactModel->getCompanyContacts(
            ['company_id' => $company->id, 'is_primary' => 1]
        );
        $companyContactModel = new CompanyContactModel($dbService);
        $contacts['additional'] = $companyContactModel->getCompanyContacts(
            ['company_id' => $company->id, 'is_primary' => 0]
        );
        $information = compact('company', 'contacts');
        return $information;
    }
}
