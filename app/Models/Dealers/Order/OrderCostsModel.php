<?php
/**
 * This file contains OrderCostsModel.
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
namespace App\Models\Dealers\Order;

use Illuminate\Database\Capsule\Manager;

class OrderCostsModel
{
    protected $tableName = 'orders_costs';
    protected $fields = ['order_id', 'costs_type_id', 'costs_option_id'];
    private $dbService;

    /**
     * Initialises query builder.
     *
     * @return void
     */
    public function __construct(Manager $dbService)
    {
        $this->table = $dbService->table($this->tableName);
    }

    /**
     * Fetches all order's costs.
     *
     * @return object | bool
     */
    public function getOrderCosts(int $orderId)
    {
        if (!$orderId) {
            return false;
        }

        try {
            $costs = $this->table->where('order_id', $orderId)->get();
        } catch (\Exception $e) {
            return false;
        }

        return $costs;
    }

    /**
     * Fetches order's costs by types.
     *
     * @param int $orderId order ID
     *
     * @return object | bool
     */
    public function getOrderTypesCosts(int $orderId)
    {
        if (!$orderId) {
            return false;
        }

        try {
            $costs = $this->table
                ->join('costs_types', 'orders_costs.costs_type_id', '=', 'costs_types.id')
                ->where(['order_id' => $orderId])
                ->select('costs_types.name', 'orders_costs.costs_option_id', 'orders_costs.id')
                ->get();
        } catch (\Exception $e) {
            return false;
        }

        return $costs;
    }

    /**
     * Fetches order's costs with types names and options data
     *
     * @param int $orderId order ID
     *
     * @return object|bool
     */
    public function getOrderTypesCostsData(int $orderId)
    {
        if (!$orderId) {
            return false;
        }

        try {
            return $this->table
                ->join(
                    'costs_options',
                    function ($join) {
                        $join->on(
                            'orders_costs.costs_option_id',
                            'costs_options.id'
                        );
                        $join->on(
                            'orders_costs.costs_type_id',
                            'costs_options.type_id'
                        );
                    }
                )
                ->join(
                    'costs_types',
                    'orders_costs.costs_type_id', '=', 'costs_types.id'
                )
                ->where('order_id', $orderId)
                ->select(
                    'costs_types.name',
                    'costs_options.title',
                    'costs_options.cost',
                    'costs_options.setup'
                )
                ->get();
        }  catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Fetches order's costs by type ID.
     *
     * @return object | bool
     */
    public function getOrderTypeCosts(int $orderId, int $typeId)
    {
        if (!$orderId || !$typeId) {
            return false;
        }

        try {
            $costs = $this->table
                ->where(['order_id' => $orderId, 'costs_type_id' => $typeId])
                ->get();
        } catch (\Exception $e) {
            return false;
        }

        return $costs;
    }

    /**
     * Inserts order costs.
     *
     * @return object | bool
     */
    public function insertOrderCosts(array $data)
    {
        if (empty($data) || empty($data['order_id'])) {
            return false;
        }

        try {
            $status = $this->table->insertGetId([
                'order_id'        => $data['order_id'],
                'costs_type_id'   => $data['costs_type_id'],
                'costs_option_id' => $data['costs_option_id'],
            ]);
        } catch (\Exception $e) {
            return false;
        }

        return $status;
    }

    /**
     * Deletes order costs.
     *
     * @param int $orderId order ID
     * @param int $typeId  type ID
     *
     * @return object | bool
     */
    public function deleteOrderTypeCosts(int $orderId, int $typeId)
    {
        if (!$orderId || !$typeId) {
            return false;
        }

        try {
            $status = $this->table
                ->where('order_id', $orderId)
                ->where('costs_type_id', $typeId)
                ->delete();
        } catch (\Exception $e) {
            return false;
        }

        return $status;
    }

    /**
     * Deletes order costs by ID.
     *
     * @param int $id order costs ID
     *
     * @return object | bool
     */
    public function deleteOrderCosts(int $id)
    {
        if (!$id) {
            return false;
        }

        try {
            $status = $this->table->where('id', $id)->delete();
        } catch (\Exception $e) {
            return false;
        }

        return $status;
    }
}
