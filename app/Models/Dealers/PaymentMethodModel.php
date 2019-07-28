<?php
/**
 * This file contains PaymentMethodModel.
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
namespace App\Models\Dealers;

use Illuminate\Database\Capsule\Manager;

class PaymentMethodModel
{
    protected $tableName = 'payment_methods';
    protected $fields = ['id', 'name', 'title'];
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
     * Fetches all payment methods.
     *
     * @return object | bool
     */
    public function getPaymentMethods()
    {
        try {
            $methods = $this->table->get();
        } catch (\Exception $e) {
            return false;
        }

        return $methods;
    }

    /**
     * Fetches payment method by parameter.
     *
     * @return object | bool
     */
    public function getPaymentMethod(array $params = null)
    {
        $where = [];
        if ($params) {
            foreach ($params as $field => $value) {
                if (in_array($field, $this->fields)) {
                    $where[$field] = $value;
                }
            }
        }
        try {
            $query = $this->table;
            foreach ($where as $key => $value) {
                $query = $query->where($key, $value);
            }
            return $query->first();
        } catch (\Exception $e) {
            return false;
        }
    }
}
