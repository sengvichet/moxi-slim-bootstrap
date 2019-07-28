<?php
/**
 * This file contains DealersGmbAccountsModel.
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
namespace App\Models\Common\Gmb;

use Illuminate\Database\Capsule\Manager;

class DealersGmbAccountsModel
{
    protected $tableName = 'dealers_gmb_accounts';
    protected $fields = ['user_id', 'account_id'];
    private $logger;

    /**
     * Initialises query builder.
     *
     * @return void
     */
    public function __construct(Manager $dbService, \Monolog\Logger $logger)
    {
        $this->table = $dbService->table($this->tableName);
        $this->logger = $logger;
    }

    /**
     * Fetches all dealers with GMB accounts
     *
     * @return array|bool
     */
    public function getGmbDealers()
    {
        try {
            return $this->table->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Fetches dealer with GMB accounts by ID
     *
     * @param int $dealerId dealer ID
     *
     * @return array|bool
     */
    public function getGmbDealer(int $dealerId)
    {
        try {
            return $this->table->where('user_id', $dealerId)->first();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Fetches GMB location's insights.
     *
     * @param int $userId dealer ID
     *
     * @return int|bool
     */
    public function getAccountId(int $userId)
    {
        if (!$userId) {
            return false;
        }

        try {
            $result = $this->table->where('user_id', $userId)->first();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }

        return (empty($result->account_id)) ? false : $result->account_id;
    }

    /**
     * Inserts GMB location.
     *
     * @return bool
     */
    public function insertGmbLocation(array $data)
    {
        $fields = ['organization_id', 'account_id', 'location_id'];
        $insertData = [];
        foreach ($fields as $field) {
            if (empty($data[$field])) {
                return false;
            } else {
                $insertData[$field] = $data[$field];
            }
        }

        try {
            return $this->table->insert($insertData);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Inserts dealers => GMB account relationship.
     *
     * @param array $data ['user_id' => user id, 'account_id' => account id]
     *
     * @return bool
     */
    public function insertDealerAccount(array $data)
    {
        $insertData = [];
        foreach ($this->fields as $field) {
            if (empty($data[$field])) {
                return false;
            } else {
                $insertData[$field] = $data[$field];
            }
        }

        try {
            return $this->table->insert($insertData);
        } catch (\Exception $e) {
            return false;
        }
    }
}
