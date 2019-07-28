<?php
/**
 * This file contains DealerListingLeaderDataModel.
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
 * This models contains methods for managing data in dealer_listing_leader_data.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class DealerListingLeaderDataModel
{
    protected $tableName = 'dealer_listing_leader_data';
    protected $fields = [
        'dealer_id', 'date', 'listing_correct', 'listing_processing',
        'total_referral_traffic', 'updated_at',
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
     * Fetches listing row
     *
     * @param array $params optional params
     *
     * @return Collection|bool
     */
    public function getDealerListingLeaderData(array $params)
    {
        try {
            return $this->table
                ->where('dealer_id', $params['dealer_id'])
                ->where('date', $params['date'])
                ->first();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Fetches all dealers' listing leader data
     *
     * @param array|null $params optional params
     *
     * @return Collection|bool
     */
    public function getDealersListingLeaderData(array $params = null)
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
                ->orderBy('date', 'desc')
                ->orderBy('updated_at', 'desc')
                ->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Fetches aggregated column grouped by date
     *
     * @param int   $dealerId dealer ID
     * @param array $period   period
     *
     * @return Collection|bool
     */
    public function getDealerCounts(int $dealerId, array $period)
    {
        if (!$dealerId) {
            return false;
        }

        try {
            $raw = '`date`, (`listing_correct` + `listing_processing`'
                 . ' + `total_referral_traffic`) AS `count`';

            return $this->table
                ->selectRaw($raw)
                ->where('dealer_id', $dealerId)
                ->where('date', '>=', $period['start'])
                ->where('date', '<=', $period['end'])
                ->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Fetches aggregated column grouped by date
     *
     * @param int   $dealerId dealer ID
     * @param array $period   period
     *
     * @return Collection|bool
     */
    public function getDealerListingsCounts(int $dealerId, array $period)
    {
        if (!$dealerId) {
            return false;
        }

        $raw = '`date`, (`listing_correct` + `listing_processing`) AS `listings`';
        try {
            return $this->table
                ->selectRaw($raw)
                ->where('dealer_id', $dealerId)
                ->where('date', '>=', $period['start'])
                ->where('date', '<=', $period['end'])
                ->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Inserts dealer's listing leader data
     *
     * @param array $data dealer's listing leader data
     *
     * @return bool
     */
    public function insertDealerListingLeaderData(array $data)
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
     * Updates dealer's listing leader data
     *
     * @param array $data dealer's listing leader data
     *
     * @return bool
     */
    public function updateDealerListingLeaderData(array $data)
    {
        if (empty($data['id'])) {
            return false;
        }

        $updateData = [];
        foreach ($this->fields as $field) {
            if (array_key_exists($field, $data)) {
                $updateData[$field] = $data[$field];
            }
        }

        try {
            return $this->table->where('id', $data['id'])->update($updateData);
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }
}
