<?php
/**
 * This file contains DealerSocialMediaDataModel.
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
class DealerSocialMediaDataModel
{
    protected $tableName = 'dealer_social_media_data';
    protected $fields = [
        'dealer_id', 'date', 'day_of_week', 'social_media_id', 'posts',
        'engagements', 'impressions', 'updated_at',
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
     * Fetches social media row
     *
     * @param array $params optional params
     *
     * @return Collection|bool
     */
    public function getDealerSocialMediaData(array $params)
    {
        try {
            return $this->table
                ->where('dealer_id', $params['dealer_id'])
                ->where('date', $params['date'])
                ->where('day_of_week', $params['day_of_week'])
                ->where('social_media_id', $params['social_media_id'])
                ->first();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Fetches all dealers' social media data
     *
     * @param array|null $params optional params
     *
     * @return Collection|bool
     */
    public function getDealersSocialMediaData(array $params = null)
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
     * Fetches aggregated columns posts, engagements grouped by date
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

        $raw = '`date`, SUM(`posts`) AS `posts_total`,'
             . ' SUM(`engagements`) AS `engagements_total`,'
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
     * Fetches aggregated column posts grouped by date, day of week
     *
     * @param int   $dealerId dealer ID
     * @param array $period   period
     *
     * @return Collection|bool
     */
    public function getDealerPostCounts(int $dealerId, array $period)
    {
        if (!$dealerId) {
            return false;
        }

        try {
            $raw = '`date`, `day_of_week`, SUM(`posts`) AS `posts_total`';

            return $this->table
                ->selectRaw($raw)
                ->where('dealer_id', $dealerId)
                ->where('date', '>=', $period['start'])
                ->where('date', '<=', $period['end'])
                ->groupBy('date', 'day_of_week')
                ->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Inserts dealer's social media data
     *
     * @param array $data dealer's social media data
     *
     * @return bool
     */
    public function insertDealerSocialMediaData(array $data)
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
     * Updates dealer's social media data
     *
     * @param array $data dealer's social media data
     *
     * @return bool
     */
    public function updateDealerSocialMediaData(array $data)
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
