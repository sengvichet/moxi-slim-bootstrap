<?php
/**
 * This file contains admin's HomeController.
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

/**
 * This controller contains actions for the Admin Dashboard page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class HomeController extends ControllerAbstract
{
    /**
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $menu = $this->getMenuItems();
        $user = $this->getService('session')->user;

        return $this->render('Admin/index.twig', compact('menu', 'user'));
    }

    /**
     * Returns menu items for sidebar.
     *
     * @return array
     */
    protected function getMenuItems()
    {
        return $this->getService('config')->get()['menu']['admin'];
    }
}
