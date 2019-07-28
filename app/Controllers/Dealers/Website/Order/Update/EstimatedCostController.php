<?php
/**
 * This file contains portal's update EstimatedCostController.
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
use App\Models\Dealers\Order\OrderModel;

/**
 * This controller contains actions for the update Estimated Cost page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class EstimatedCostController extends UpdateOrderController
{
    private $slug = 'update-estimated-cost';
    /**
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $data = $this->getIndexData();
        if (empty($data['order'])) {
            return $this->goWebsite();
        }
        $data['totals'] = $this->getOrderTotals($data['order']['costs'], $data['costs']);
        $data['action'] = $this->getService('config')->get()['routes']['order-' . $this->slug];

        return $this->render('Dealers/website/order/update/estimated-cost.twig', $data);
    }

    /**
     * Completed order
     *
     * @return string
     */
    public function store()
    {
        $request = $this->getRequest();

        if (!$request->isPost()) {
            return $this->goBack($this->slug);
        }

        $data = $request->getParams();

        $this->getService('event')->emit(
            'order.update',
            [
                'container' => $this->getContainer(),
                'user'      => $this->getService('session')->user['id'],
                'order'     => $data['order_id'],
            ]
        );

        return $this->goWebsite();
    }

    /**
     * Calculates order totals
     *
     * @param array $orderCosts order costs
     * @param array $costs      costs data
     *
     * @return array|bool
     */
    private function getOrderTotals(array $orderCosts, array $costs)
    {
        if (!$orderCosts || !$costs) {
            return false;
        }
        $totals = ['cost' => 0, 'setup' => 0];
        foreach ($orderCosts as $costsType => $costsOption) {
            if (is_array($costsOption)) {
                foreach ($costsOption as $row) {
                    $option = $costs[$costsType]['options'][$row - 1];
                    $totals['cost'] += $option->cost;
                    $totals['setup'] += $option->setup;
                }
            } else {
                $option = $costs[$costsType]['options'][$costsOption - 1];
                $totals['cost'] += $option->cost;
                $totals['setup'] += $option->setup;
            }
        }

        return $totals;
    }
}
