<?php
/**
 * This file contains portal's StartOrderController.
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

/**
 * This controller contains actions for the Website - Place an Order page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class StartOrderController extends CreateOrderController
{
    /**
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $data = $this->getIndexData();
        if ($this->hasCompletedOrder($data['user']->id)) {
            return $this->goWebsite();
        }

        $data['action'] = [
            'form' => $this->getService('config')->get()['routes']['order-start'],
        ];
        $data['start'] = true;

        return $this->render('Dealers/website/order/start-order.twig', $data);
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
            return $this->goBack('start-order');
        }

        $data = $request->getParams();

        return $this->handleNextAction($data['action'], null, 'website-package');
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
