<?php
/**
 * This file contains OrderModel.
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

/**
 * This models contains methods for managing data in orders DB table.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class OrderModel
{
    protected $tableName = 'orders';
    protected $fields = ['user_id', 'datetime', 'completed'];
    /**
     * DB table object
     *
     * @var \Illuminate\Database\Query\Builder
     */
    private $table;

    /**
     * Initialises query builder.
     *
     * @param Manager $dbService DB service
     *
     * @return void
     */
    public function __construct(Manager $dbService)
    {
        $this->table = $dbService->table($this->tableName);
    }

    /**
     * Fetches all user's orders.
     *
     * @param int $userId user ID
     *
     * @return object | bool
     */
    public function getUserOrders(int $userId)
    {
        if (!$userId) {
            return false;
        }

        try {
            $orders = $this->table->where('user_id', $userId)->get();
        } catch (\Exception $e) {
            return false;
        }

        return $orders;
    }

    /**
     * Checks if user has a completed order.
     *
     * @param int $userId user ID
     *
     * @return bool
     */
    public function hasCompletedOrder(int $userId)
    {
        if (!$userId) {
            return false;
        }

        try {
            return $this->table
                ->where('user_id', $userId)
                ->where('completed', 1)
                ->exists();
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Fetches an incompleted user's order.
     *
     * @param int $userId user ID
     *
     * @return object | bool
     */
    public function getOpenOrder(int $userId)
    {
        if (!$userId) {
            return false;
        }

        try {
            $order = $this->table
                ->where('user_id', $userId)
                ->where('completed', 0)
                ->first();
        } catch (\Exception $e) {
            return false;
        }

        return $order;
    }

    /**
     * Fetches an completed user's order.
     *
     * @param int $userId user ID
     *
     * @return object | bool
     */
    public function getCompletedOrder(int $userId)
    {
        if (!$userId) {
            return false;
        }

        try {
            $order = $this->table
                ->where('user_id', $userId)
                ->where('completed', 1)
                ->first();
        } catch (\Exception $e) {
            return false;
        }

        return $order;
    }

    /**
     * Inserts order.
     *
     * @param array $data order data
     *
     * @return object | bool
     */
    public function insertOrder(array $data)
    {
        if (empty($data)) {
            return false;
        }

        try {
            $status = $this->table->insertGetId(
                [
                'user_id'   => $data['user_id'],
                'datetime'  => $data['datetime'],
                'completed' => $data['completed'],
                ]
            );
        } catch (\Exception $e) {
            return false;
        }

        return $status;
    }

    /**
     * Inserts order.
     *
     * @param array $data order data
     *
     * @return object | bool
     */
    public function updateOrder(array $data)
    {
        if (empty($data)) {
            return false;
        }

        try {
            $status = $this->table
                ->where('id', $data['id'])
                ->update(['completed' => $data['completed']]);
        } catch (\Exception $e) {
            return false;
        }

        return $status;
    }
}
