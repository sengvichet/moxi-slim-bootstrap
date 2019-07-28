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
namespace App\Controllers\Dealers\Website\Order\Create\WebsitePackage;

use App\Kernel\ControllerAbstract;
use App\Kernel\Slim\App;
use App\Controllers\Dealers\Website\Order\Create\CreateOrderController;
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
class ProductsNumberController extends CreateOrderController
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
            'form' => $this->getService('config')->get()['routes']['order-number-of-products'],
        ];
        $data['percentage'] = (empty($data['order']))
            ? $this->getPercentage([]) : $this->getPercentage($data['order']);

        return $this->render('Dealers/website/order/website-package/number-of-products.twig', $data);
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
            return $this->goBack('number-of-products');
        }

        $data = $request->getParams();
        $data['user_id'] = $this->getService('session')->user['id'];
        if (empty($data['order_id'])) {
            $data['order_id'] = $this->openOrder($data);
        }
        $status = $this->storeCosts($data, 'products');
        if (!$status) {
            return $this->goBack('number-of-products');
        }

        return $this->handleNextAction($data['action'], 'start', 'spec-sheets');
    }

    /**
     * Stores order into DB
     *
     * @param array $data form data
     *
     * @return int | bool order id or false
     */
    private function openOrder(array $data)
    {
        if (!$data || empty($data['user_id'])) {
            return false;
        }

        $order = [
            'user_id'   => $data['user_id'],
            'datetime'  => date('Y-m-d H:i:s'),
            'completed' => 0,
        ];
        $orderModel = new OrderModel($this->getService('db'));
        $orderId = $orderModel->insertOrder($order);
        if (!$orderId) {
            return false;
        }

        return $orderId;
    }
}
