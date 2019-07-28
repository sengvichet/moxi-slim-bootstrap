<?php
/**
 * This file contains portal's WelcomeController.
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
class WelcomeController extends CreateOrderController
{
    /**
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $data = [
            'menu'        => $this->getMenuItems(),
            'breadcrumbs' => $this->getBreadcrumbs(),
            'route'       => $this->getCurrentRoute(),
            'user'        => $this->getUser(),
            'company'     => $this->getCompanyData($this->getUser()->id),
            'routeGroup'  => $this->getRouteGroup($this->getCurrentRoute()),
        ];

        return $this->render('Dealers/website/order/welcome.twig', $data);
    }
}
