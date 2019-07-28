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
namespace App\Controllers\Dealers\Website\Order\Create;

use App\Kernel\ControllerAbstract;
use App\Kernel\Slim\App;
use App\Controllers\Dealers\Website\Order\OrderController;
use App\Models\Dealers\Costs\CostsOptionsModel;
use App\Models\Dealers\Costs\CostsTypesModel;
use App\Models\Dealers\Order\OrderModel;
use App\Models\Dealers\Order\OrderCostsModel;
use App\Models\Dealers\Company\CompanyModel;
use App\Models\Dealers\Company\CompanySocialMediaModel;
use App\Models\Dealers\Company\CompanyGoogleServicesModel;
use App\Models\Dealers\SocialMediaModel;

/**
 * This controller contains actions for the Website - Place an Order page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class CreateOrderController extends OrderController
{
    const ORDER_PAGES_NUM = 11;
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
        $data['order']      = $this->getOpenOrder($data['user']->id);

        return $data;
    }

    /**
     * Returns breadcrumbs items for sidebar.
     *
     * @return array
     */
    protected function getBreadcrumbs()
    {
        return $this->getService('config')->get()['breadcrumbs']['order'];
    }

    /**
     * Return route group
     *
     * @param string $route route
     *
     * @return string
     */
    protected function getRouteGroup(string $route)
    {
        $group = '';
        $search = substr($route, 1);
        $config = $this->getService('config')->get();
        $groups = $config['route_groups'];
        $routes = $config['routes'];
        $routeName = array_search($search, $routes);
        $index = array_search($routeName, array_keys($groups));
        if ($index !== false) {
            $group = array_values($groups)[$index];
        }
        return $group;
    }

    /**
     * Returns costs options grouped by types.
     *
     * @param string $group costs' group
     *
     * @return array              [[type_name => [options]]]
     */
    protected function getCosts(string $group = null)
    {
        $types = $this->getCostsTypes($group);
        if (!$types) {
            return false;
        }

        $dbService = $this->getService('db');
        $costs = [];
        foreach ($types as $type) {
            $optionsModel = new CostsOptionsModel($dbService);
            $options = $optionsModel->getCostsOptions($type->id);
            $optionsCount = 0;
            foreach ($options as $option) {
                if ($option->title) {
                    $optionsCount++;
                }
            }
            $costs[$type->name] = [
                'group'          => $type->group,
                'subgroup'       => $type->subgroup,
                'title'          => $type->title,
                'default'        => $type->default_option_id,
                'options'        => $options,
                'options_count'  => $optionsCount
            ];
        }
        return $costs;
    }

    /**
     * Returns costs totals
     *
     * @param array $costs [[type_name => [options]]]
     *
     * @return array ['cost' => 0, 'setup' => 0]
     */
    protected function getCostsTotals(array $costs)
    {
        if (!$costs) {
            return false;
        }

        $totals = ['cost' => 0, 'setup' => 0];
        foreach ($costs as $cost) {
            if (!empty($cost['default'])) {
                $totals['cost']  += $cost['options'][$cost['default'] - 1]->cost;
                $totals['setup'] += $cost['options'][$cost['default'] - 1]->setup;
            }
        }
        return $totals;
    }

    /**
     * Returns not completed order
     *
     * @param int $userId order's owner ID
     *
     * @return array|bool
     */
    protected function getOpenOrder(int $userId)
    {
        $dbService = $this->getService('db');
        $orderModel = new OrderModel($dbService);
        $order = $orderModel->getOpenOrder($userId);
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
     * Stores order costs into DB
     *
     * @param array  $data form data
     * @param string $type costs type
     *
     * @return bool status
     */
    protected function storeCosts(array $data, string $type)
    {
        $dbService = $this->getService('db');
        if (empty($data['order_id'])) {
            return false;
        }

        $costsTypesModel = new CostsTypesModel($dbService);
        $costsType = $costsTypesModel->getCostsTypeByName($type);
        if (!$costsType) {
            return false;
        }

        $orderCostsModel = new OrderCostsModel($dbService);
        $orderCostsModel->deleteOrderTypeCosts($data['order_id'], $costsType->id);
        $status = true;
        if (!empty($data[$type])) {
            $costs = [
                'order_id'        => $data['order_id'],
                'costs_type_id'   => $costsType->id,
                'costs_option_id' => $data[$type],
            ];
            $status = $orderCostsModel->insertOrderCosts($costs);
        }
        return $status;
    }

    /**
     * Get percent of order completion
     *
     * @param array $order order data
     *
     * @return array
     */
    protected function getPercentage(array $order)
    {
        $percentage = ['value' => 0, 'show' => true];
        if (!$order) {
            return $percentage;
        }

        $percentage['value'] = ($order['order']->ready)
            ? 100 : (int) ((100 / self::ORDER_PAGES_NUM) * count($order['costs']));
        return $percentage;
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
            return $this->goBack($next);
        }

        if ($action === 'back' && $previous) {
            return $this->goBack($previous);
        }
    }

    /**
     * Redirects user to the form page.
     *
     * @return Response
     */
    protected function goWebsite()
    {
        $redirectUrl = '/' . $this->getService('config')->get()['routes']['website'];
        return $this->getResponse()->withRedirect($redirectUrl, 301);
    }

    protected function getSummary(array $costs, array $order, array $input = null)
    {
        $costsTypesModel = new CostsTypesModel($this->getService('db'));
        $costsTypes = $costsTypesModel->getCostsTypes();

        $totals = [];
        foreach ($costsTypes as $type) {
            $field = $type->name;
            $options = $costs[$field]['options'];

            if ($type->group == 'website_pages') {
                $totals[$field][1] = $totals[$field]['total']
                    = ['cost' => 0, 'setup' => 0];
                if (!empty($input[$field])) {
                    if (is_array($input[$field])) {
                        $cost = $setup = 0;
                        foreach ($input[$field] as $key => $page) {
                            $cost  += $options[$page - 1]->cost;
                            $setup += $options[$page - 1]->setup;
                            $totals[$field][$key + 1] = $costs[$field]['options'][$page - 1];
                        }
                        $totals[$field]['total'] = compact('cost', 'setup');
                    } else {
                        $totals[$field][1] = $totals[$field]['total']
                            = $options[$input[$field] - 1];
                    }
                } elseif (!empty($order['costs'][$field])) {
                    if (is_array($order['costs'][$field])) {
                        $cost = $setup = 0;
                        foreach ($order['costs'][$field] as $key => $page) {
                            $cost  += $options[$page - 1]->cost;
                            $setup += $options[$page - 1]->setup;
                            $totals[$field][$key + 1] = $options[$page - 1];
                        }
                        $totals[$field]['total'] = compact('cost', 'setup');
                    } else {
                        $totals[$field][1] = $totals[$field]['total']
                            = $options[$order['costs'][$field] - 1];
                    }
                }
            } else {
                $totals[$field] = ['cost' => 0, 'setup' => 0];
                if (!empty($input[$field])) {
                    $totals[$field] = $options[$input[$field] - 1];
                } elseif (!empty($order['costs'][$field])) {
                    $totals[$field] = $options[$order['costs'][$field] - 1];
                }
            }
        }

        return $totals;
    }

    /**
     * Checks if dealer has completed order
     *
     * @param int $userId order's owner ID
     *
     * @return array|bool
     */
    protected function hasCompletedOrder(int $userId)
    {
        $orderModel = new OrderModel($this->getService('db'));
        return $orderModel->hasCompletedOrder($userId);
    }
}
