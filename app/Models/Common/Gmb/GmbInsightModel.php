<?php
/**
 * This file contains GmbInsightModel.
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

class GmbInsightModel
{
    protected $tableName = 'gmb_insights';
    protected $fields = ['location_id', 'queries_direct', 'queries_indirect',
        'views_maps', 'views_search', 'actions_website', 'actions_phone',
        'actions_driving_directions', 'photos_views_merchant', 'photos_views_customers',
        'photos_count_merchant', 'photos_count_customers', 'local_post_views_search',
        'local_post_actions_call_to_action',
        'timestamp'];
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
     * Fetches GMB location's insights.
     *
     * @param string $location GMB location ID
     * @param array  $time     ['start' => string, 'end' => string]
     *
     * @return array|bool
     */
    public function getLocationInsights(string $location, array $time)
    {
        if (!$location) {
            return false;
        }

        try {
            return $this->table
                ->where('location_id', $location)
                ->where('timestamp', '>', $time['start'])
                ->where('timestamp', '<', $time['end'])
                ->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Fetches GMB location's insights summary.
     *
     * @param string $location GMB location ID
     * @param array  $time     ['start' => string, 'end' => string]
     *
     * @return array|bool
     */
    public function getLocationMonthlySummary(string $location, array $time)
    {
        if (!$location) {
            return false;
        }

        $raw = 'YEAR(`timestamp`) AS `year`, MONTH(`timestamp`) AS `month`,'
             . ' SUM(`actions_phone`) + SUM(`actions_driving_directions`)'
             . ' AS `calls_directions`';

        try {
            return $this->table
                ->selectRaw($raw)
                ->where('location_id', $location)
                ->where('timestamp', '>=', $time['start'])
                ->where('timestamp', '<=', $time['end'])
                ->groupBy(Manager::raw('`year`, `month`'))
                ->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Inserts location's insight.
     *
     * @param array $data insight data
     *
     * @return int|bool
     */
    public function insertInsight(array $data)
    {
        if (!$data) {
            return false;
        }

        $insertData = [];
        foreach ($this->fields as $field) {
            $insertData[$field] = (array_key_exists($field, $data)) ? $data[$field] : 0;
        }
        try {
            $exists = $this->table->where('location_id', $insertData['location_id'])
                ->where('timestamp', $insertData['timestamp'])->exists();
            if ($exists) {
                return false;
            }
            $id = $this->table->insertGetId($insertData);
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }

        return $id;
    }
}
