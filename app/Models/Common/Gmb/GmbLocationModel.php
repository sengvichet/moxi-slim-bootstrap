<?php
/**
 * This file contains GmbLocationsModel.
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

class GmbLocationModel
{
    protected $tableName = 'gmb_locations';
    protected $fields = ['organization_id', 'account_id', 'location_id',
        'account_name', 'location_name'];
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
     * @return void
     */
    public function __construct(Manager $dbService, \Monolog\Logger $logger)
    {
        $this->table = $dbService->table($this->tableName);
        $this->logger = $logger;
    }

    /**
     * Fetches GMB account by id.
     *
     * @param string $accountId GMB account ID
     *
     * @return \Illuminate\Support\Collection|bool
     */
    public function getAccount(string $accountId)
    {
        try {
            return $this->table->where('account_id', $accountId)->first();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Checks if there is a GMB location with such an ID.
     *
     * @param string $locationId GMB location ID
     *
     * @return bool
     */
    public function hasLocation(string $locationId)
    {
        try {
            return $this->table->where('location_id', $locationId)->exists();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Fetches GMB location by id.
     *
     * @param string $locationId GMB location ID
     *
     * @return \Illuminate\Support\Collection|bool
     */
    public function getLocation(string $locationId)
    {
        try {
            return $this->table->where('location_id', $locationId)->first();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Fetches all GMB locations.
     *
     * @return \Illuminate\Support\Collection|bool
     */
    public function getLocations()
    {
        try {
            return $this->table->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Fetches unique GMB accounts.
     *
     * @return \Illuminate\Support\Collection|bool
     */
    public function getAccounts()
    {
        try {
            return $this->table->distinct()
                ->orderBy('account_name')
                ->get(['account_id', 'account_name']);
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Fetches GMB account's locations.
     *
     * @param string $account GMB account ID
     *
     * @return \Illuminate\Support\Collection|bool
     */
    public function getAccountLocations(string $account)
    {
        if (!$account) {
            return false;
        }

        try {
            return $this->table->where('account_id', $account)->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Inserts GMB location.
     *
     * @param array $data update data
     *
     * @return bool
     */
    public function insertGmbLocation(array $data)
    {
        $insertData = [];
        foreach ($this->fields as $field) {
            if (empty($data[$field])) {
                return false;
            }
            $insertData[$field] = $data[$field];
        }

        try {
            return $this->table->insert($insertData);
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Updates GMB location.
     *
     * @param string $locationId GMB location ID
     * @param array  $data       update data
     *
     * @return bool
     */
    public function updateGmbLocation(string $locationId, array $data)
    {
        $updateData = [];
        foreach ($this->fields as $field) {
            if (!empty($data[$field])) {
                $updateData[$field] = $data[$field];
            }
        }

        try {
            $this->table->where('location_id', $locationId)->update($updateData);
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }

        return true;
    }
}
