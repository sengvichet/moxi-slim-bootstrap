<?php
/**
 * This file contains portal's UpdateOrderController.
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
use App\Controllers\Dealers\Website\Order\Create\CreateOrderController;
use App\Models\Dealers\Order\OrderModel;
use App\Models\Dealers\Order\OrderCostsModel;

/**
 * This controller contains actions for the Website - Update Order page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class UpdateOrderController extends CreateOrderController
{
    /**
     * Returns all necessart data for children's index actions
     *
     * @param string $group costs' group
     *
     * @return array
     */
    public function getIndexData(string $group = null)
    {
        $data = [
            'menu'        => $this->getMenuItems(),
            'breadcrumbs' => $this->getBreadcrumbs(),
            'route'       => $this->getCurrentRoute(),
            'fields'      => $this->getService('config')->get()['fields'],
            'user'        => $this->getUser(),
            'costs'       => $this->getCosts($group),
        ];
        $data['routeGroup'] = $this->getRouteGroup($data['route']);
        $data['totals']     = $this->getCostsTotals($data['costs']);
        $data['company']    = $this->getCompanyData($data['user']->id);
        $data['order']      = $this->getCompletedOrder($data['user']->id);

        return $data;
    }

    /**
     * Returns breadcrumbs items for sidebar.
     *
     * @return array
     */
    protected function getBreadcrumbs()
    {
        return $this->getService('config')->get()['breadcrumbs']['update-order'];
    }

    /**
     * Returns completed order
     *
     * @param int $userId order's owner ID
     *
     * @return array|bool
     */
    protected function getCompletedOrder(int $userId)
    {
        $dbService = $this->getService('db');
        $orderModel = new OrderModel($dbService);
        $order = $orderModel->getCompletedOrder($userId);
        if (!$order) {
            return [];
        }

        $orderCostsModel = new OrderCostsModel($dbService);
        $orderCosts = $orderCostsModel->getOrderTypesCosts($order->id);

        $data = ['order' => $order, 'costs' => [], 'order_costs_ids' => []];

        foreach ($orderCosts as $row) {
            if (array_key_exists($row->name, $data['costs'])) {
                if (!is_array($data['costs'][$row->name])) {
                    $data['costs'][$row->name] = [$data['costs'][$row->name]];
                }
                $data['costs'][$row->name][] = $row->costs_option_id;
            } else {
                $data['costs'][$row->name] = $row->costs_option_id;
            }
            $data['order_costs_ids'][$row->name][] = $row->id;
        }
        return $data;
    }

    /**
     * Redirects user to the next page.
     *
     * @param string $action   direction
     * @param string $previous previous route
     * @param string $next     next route
     *
     * @return Response
     */
    protected function handleNextAction(string $action, string $previous = null, string $next = null)
    {
        if ($action === 'exit') {
            return $this->goWebsite();
        }

        if ($action === 'continue' && $next) {
            return $this->goBack('update-' . $next);
        }

        if ($action === 'back' && $previous) {
            return $this->goBack('update-' . $previous);
        }

        if ($action === 'back' && empty($previous)) {
            return $this->goWebsite();
        }
    }
}
