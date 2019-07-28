<?php
/**
 * This file contains OrderWebsitePagesModel.
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

class OrderWebsitePagesModel
{
    protected $tableName = 'orders_website_pages';

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
     * Fetches website page by order costs id
     *
     * @param int $id order costs ID
     *
     * @return object|bool
     */
    public function getOrderWebsitePage(int $id)
    {
        if (!$id) {
            return false;
        }

        try {
            $page = $this->table->where('order_costs_id', $id)->first();
        } catch (\Exception $e) {
            return false;
        }

        return $page;
    }

    /**
     * Inserts order website pages.
     *
     * @return object | bool
     */
    public function insertOrderWebsitePages(array $data)
    {
        if (empty($data) || empty($data['order_costs_id'])) {
            return false;
        }

        try {
            $status = $this->table->insert([
                'order_costs_id' => $data['order_costs_id'],
                'page_id'        => $data['page_id'],
                'page_title'     => $data['page_title'],
            ]);
        } catch (\Exception $e) {
            return false;
        }

        return $status;
    }

    /**
     * Deletes website page data by order costs id
     *
     * @param int $orderCostsId order costs ID
     *
     * @return bool
     */
    public function deleteOrderWebsitePage(int $orderCostsId)
    {
        if (!$orderCostsId) {
            return false;
        }

        try {
            $status = $this->table->where('order_costs_id', $orderCostsId)->delete();
        } catch (\Exception $e) {
            return false;
        }

        return $status;
    }
}
