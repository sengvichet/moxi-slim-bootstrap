<?php
/**
 * This file contains GmbLocationSpecialHoursModel.
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

class GmbLocationSpecialHoursModel
{
    protected $tableName = 'gmb_location_special_hours';
    protected $fields = [
        'location_id', 'is_closed', 'open_time', 'close_time', 'start_date', 'end_date'
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
     * Fetches location regular hours
     *
     * @param string $locationId GMB location ID
     *
     * @return \Illuminate\Support\Collection|bool
     */
    public function getLocationSpecialHours(string $locationId)
    {
        try {
            return $this->table->where('location_id', $locationId)->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Inserts location special hours.
     *
     * @param array $data GMB location data
     *
     * @return bool
     */
    public function insertLocationSpecialHours(array $data)
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
     * Deletes location special hours.
     *
     * @param string $locationId location ID
     *
     * @return bool
     */
    public function deleteLocationSpecialHours(string $locationId)
    {
        try {
            return $this->table->where('location_id', $locationId)->delete();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }
}
