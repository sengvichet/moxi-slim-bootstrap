<?php
/**
 * This file contains DealerServiceDataModel.
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
 * This models contains methods for managing data in dealer_social_media_data.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class DealerServiceDataModel
{
    protected $tableName = 'dealer_service_data';
    protected $fields = [
        'dealer_id', 'service_id', 'quarters', 'is_approved', 'updated_at'
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
     * Checks if a dealer is subscribed to a service
     *
     * @param int $dealerId  dealer ID
     * @param int $serviceId service ID
     *
     * @return bool
     */
    public function isSubscribed(int $dealerId, int $serviceId)
    {
        try {
            return $this->table
                ->where('dealer_id', $dealerId)
                ->where('service_id', $serviceId)
                ->where('is_approved', 1)
                ->exists();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Fetches all dealers' service data
     *
     * @param array|null $params optional params
     *
     * @return Collection|bool
     */
    public function getDealersServiceData(array $params = null)
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
     * Inserts dealer's service data
     *
     * @param array $data dealer's service data
     *
     * @return bool
     */
    public function insertDealerServiceData(array $data)
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
     * Deletes dealer's service data
     *
     * @param int      $dealerId  dealer ID
     * @param int|null $serviceId optional service ID
     *
     * @return bool
     */
    public function deleteDealerServiceData(int $dealerId, int $serviceId = null)
    {
        try {
            $query = $this->table->where('dealer_id', $dealerId);
            if ($serviceId) {
                $query = $query->where('service_id', $serviceId);
            }
            return $query->delete();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Updates dealer's service data
     *
     * @param array $data dealer's social media data
     *
     * @return bool
     */
    public function updateDealerServiceData(array $data)
    {
        try {
            return $this->table
                ->where('dealer_id', $data['dealer_id'])
                ->where('service_id', $data['service_id'])
                ->update(
                    [
                        'is_approved' => $data['is_approved'],
                        'updated_at'  => $data['updated_at'],
                    ]
                );
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }
}
