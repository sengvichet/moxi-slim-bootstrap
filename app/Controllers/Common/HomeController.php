<?php
/**
 * This file contains portal's HomeController.
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
namespace App\Controllers\Common;

use App\Kernel\Slim\App;
use App\Controllers\Dealers\DealersController;

/**
 * This controller contains actions for the home page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class HomeController extends DealersController
{

    /**
     * Renders the home page.
     *
     * @return string
     */
    public function home()
    {
        $user = $this->getService('session')->user;
        if (!$user) {
            return $this->render('Common/home.twig', compact('user'));
        }
        if (isAdmin($user)) {
            return $this->goAdmin();
        }
        if (isDealer($user)) {
            return $this->goDashboard();
        }
    }

    /**
     * Checks if user is admin.
     *
     * @param array $user user data
     *
     * @return boolean
     */
    function isAdmin(array $user)
    {
        return ($user['role'] === 'admin');
    }

    /**
     * Checks if user is dealer.
     *
     * @param array $user user data
     *
     * @return boolean
     */
    function isDealer(array $user)
    {
        return ($user['role'] === 'dealer');
    }
}
