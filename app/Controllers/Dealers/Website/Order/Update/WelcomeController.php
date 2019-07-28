<?php
/**
 * This file contains portal's update WelcomeController.
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
namespace App\Controllers\Dealers\Website\Order\Update;

use App\Kernel\ControllerAbstract;
use App\Kernel\Slim\App;
use App\Controllers\Dealers\Website\Order\Update\UpdateOrderController;

/**
 * This controller contains actions for the update Website - Welcome page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class WelcomeController extends UpdateOrderController
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
        if (!$this->hasCompletedOrder($data['user']->id)) {
            return $this->goWebsite();
        }

        return $this->render('Dealers/website/order/update/welcome.twig', $data);
    }
}
