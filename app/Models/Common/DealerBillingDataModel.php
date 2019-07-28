<?php
/**
 * This file contains DealerBillingDataModel.
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
namespace App\Models\Common;

use Illuminate\Database\Capsule\Manager;

/**
 * This models contains methods for managing data in dealer_billing_data.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class DealerBillingDataModel
{
    protected $tableName = 'dealer_billing_data';
    protected $fields = [
        'dealer_id', 'billing_frequency', 'next_bill_date', 'billing_details',
        'payment_method', 'updated_at',
    ];
    /**
     * DB table object
     *
     * @var \Illuminate\Database\Query\Builder
     */
    private $table;
    /**
     * Logger instance
     *
     * @var \Monolog\Logger
     */
    private $logger;

    /**
     * Initialises query builder.
     *
     * @param Manager $dbService DB service
     * @param Logger  $logger    logger service
     *
     * @return void
     */
    public function __construct(Manager $dbService, \Monolog\Logger $logger)
    {
        $this->table = $dbService->table($this->tableName);
        $this->logger = $logger;
    }

    /**
     * Fetches all dealers' billing data
     *
     * @param array|null $params optional params
     *
     * @return Collection|bool
     */
    public function getDealersBillingData(array $params = null)
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
            return $query
                ->orderBy('updated_at', 'desc')
                ->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Fetches one dealer's billing data
     *
     * @param int $dealerId dealer ID
     *
     * @return Collection|bool
     */
    public function getDealerBillingData(int $dealerId)
    {
        try {
            return $this->table->where('dealer_id', $dealerId)->first();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Inserts dealer's billing data
     *
     * @param array $data dealer's billing data
     *
     * @return bool
     */
    public function insertDealerBillingData(array $data)
    {
        $insertData = [];
        foreach ($this->fields as $field) {
            if (array_key_exists($field, $data)) {
                $insertData[$field] = $data[$field];
            }
        }

        try {
            return $this->table->insert($insertData);
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Updates dealer's billing data
     *
     * @param array $data dealer's billing data
     *
     * @return bool
     */
    public function updateDealerBillingData(array $data)
    {
        $updateData = [];
        foreach ($this->fields as $field) {
            if (array_key_exists($field, $data)) {
                $updateData[$field] = $data[$field];
            }
        }

        try {
            return $this->table
                ->where('dealer_id', $data['dealer_id'])
                ->update($updateData);
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }
}
