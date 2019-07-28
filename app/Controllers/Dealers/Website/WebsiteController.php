<?php
/**
 * This file contains portal's WebsiteController.
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
namespace App\Controllers\Dealers\Website;

use App\Kernel\Slim\App;
use App\Controllers\Dealers\DealersController;
use App\Models\Dealers\Order\OrderModel;

/**
 * This controller contains actions for the Website page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class WebsiteController extends DealersController
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
        $cards = $this->getCards();

        $user = $this->getService('session')->user;
        $company = $this->getCompany($user['id']);

        $data = compact('menu', 'route', 'cards', 'user', 'company');

        $data['has_completed_order'] = $this->hasCompletedOrder($user['id']);

        return $this->render('Dealers/website/index.twig', $data);
    }

    /**
     * Returns cards links for the page.
     *
     * @return array
     */
    private function getCards()
    {
        return $this->getService('config')->get()['cards']['website'];
    }

    /**
     * Checks if dealer has completed order
     *
     * @param int $userId order's owner ID
     *
     * @return array|bool
     */
    private function hasCompletedOrder(int $userId)
    {
        $orderModel = new OrderModel($this->getService('db'));
        return $orderModel->hasCompletedOrder($userId);
    }
}
