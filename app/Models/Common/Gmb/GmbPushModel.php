<?php
/**
 * This file contains GmbPushModel.
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

class GmbPushModel
{
    protected $tableName = 'gmb_pushes';
    protected $fields = ['location_id', 'instance_id', 'instance_type', 'timestamp'];
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
     * Return timestamp of the latest pull for such locations.
     *
     * @param array  $locations [GMB location ID]
     * @param string $type      'business'|'post'|'reply'
     *
     * @return string|bool
     */
    public function getLatestTimestamp(array $locations, string $type)
    {
        if (!$locations) {
            return false;
        }

        try {
            return $this->table
                ->whereIn('location_id', $locations)
                ->where('instance_type', $type)
                ->max('timestamp');
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Inserts push record
     *
     * @param array $data push data
     *
     * @return int|bool
     */
    public function insertPush(array $data)
    {
        if (!$data) {
            return false;
        }
        $insertData = [];
        foreach ($this->fields as $field) {
            if (!array_key_exists($field, $data)) {
                return false;
            }
            $insertData[$field] = $data[$field];
        }
        try {
            $id = $this->table->insertGetId($insertData);
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }
}
