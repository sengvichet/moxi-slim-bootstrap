<?php
/**
 * This file contains DealerPaidAdsDataModel.
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
class DealerPaidAdsDataModel
{
    protected $tableName = 'dealer_paid_ads_data';
    protected $fields = [
        'dealer_id', 'date', 'impressions', 'clicks', 'conversions', 'spend',
        'updated_at',
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
     * Fetches paid ads row
     *
     * @param array $params optional params
     *
     * @return Collection|bool
     */
    public function getDealerPaidAdsData(array $params)
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
     * Fetches all dealers' paid ads data
     *
     * @param array|null $params optional params
     *
     * @return Collection|bool
     */
    public function getDealersPaidAdsData(array $params = null)
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
     * Fetches aggregated columns spend, clicks, impressions, conversions
     * grouped by date
     *
     * @param int        $dealerId dealer ID
     * @param array|null $period   period
     *
     * @return Collection|bool
     */
    public function getDealerTotals(int $dealerId, array $period = null)
    {
        if (!$dealerId) {
            return false;
        }

        $raw = '`date`, SUM(`spend`) AS `spend_total`,'
             . ' SUM(`clicks`) AS `clicks_total`,'
             . ' SUM(`conversions`) AS `conversions_total`,'
             . ' SUM(`impressions`) AS `impressions_total`';
        try {
            $query = $this->table
                ->selectRaw($raw)
                ->where('dealer_id', $dealerId);
            if ($period) {
                $query = $query
                    ->where('date', '>=', $period['start'])
                    ->where('date', '<=', $period['end']);
            }
            return $query->groupBy('date')->get();
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
            $raw = '`date`, `spend`,'
                 . ' IF (`spend` = 0, 0, ROUND(`clicks` / `spend`, 2)) AS `cpc`';

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
     * Inserts dealer's paid ads data
     *
     * @param array $data dealer's paid ads data
     *
     * @return bool
     */
    public function insertDealerPaidAdsData(array $data)
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
     * Updates dealer's paid ads data
     *
     * @param array $data dealer's paid ads data
     *
     * @return bool
     */
    public function updateDealerPaidAdsData(array $data)
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
