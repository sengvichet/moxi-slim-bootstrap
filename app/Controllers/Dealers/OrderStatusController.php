<?php
/**
 * This file contains DealersController.
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

use App\Kernel\ControllerAbstract;
use App\Kernel\Slim\App;
use App\Controllers\Dealers\DealersController;

/**
 * This controller contains common actions for all portal pages.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class OrderStatusController extends DealersController
{
    /**
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $menu = $this->getMenuItems();
        $route = $this->getCurrentRoute();

        $user = $this->getService('session')->user;
        $company = $this->getCompany($user['id']);

        $services = $this->getServices($menu);
        
        $data = compact('menu', 'route', 'user', 'company', 'services');

        return $this->render('Dealers/order-status.twig', $data);
    }

    private function getServices(array $items)
    {
        $services = [];
        $fields = ['website', 'gmb', 'social', 'local', 'sem'];
        foreach ($fields as $field) {
            $services[$field] = $items[$field];
        }
        return $services;
    }
}
