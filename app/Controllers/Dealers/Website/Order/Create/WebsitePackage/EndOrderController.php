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

/**
 * This controller contains actions for the Website - Place an Order page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class EndOrderController extends CreateOrderController
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
            'form' => $this->getService('config')->get()['routes']['order-end'],
        ];
        $data['percentage'] = (empty($data['order']))
            ? $this->getPercentage([]) : $this->getPercentage($data['order']);

        return $this->render('Dealers/website/order/website-package/end-order.twig', $data);
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
            return $this->goBack('end-order');
        }

        $data = $request->getParams();

        return $this->handleNextAction($data['action'], 'pricing', 'business-information');
    }
}
