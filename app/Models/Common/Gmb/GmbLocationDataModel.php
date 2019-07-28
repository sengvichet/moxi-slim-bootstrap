<?php
/**
 * This file contains GmbLocationDataModel.
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

class GmbLocationDataModel
{
    protected $tableName = 'gmb_location_data';
    protected $fields = [
        'location_id', 'location_name', 'primary_phone', 'website_url',
        'description', 'open_status', 'opening_date', 'maps_url',
        'new_review_url', 'address_line_1', 'address_line_2', 'city', 'state',
        'postal_code', 'region_code',
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
     * Fetches location data
     *
     * @param string $locationId GMB location ID
     *
     * @return \Illuminate\Support\Collection|bool
     */
    public function getLocationData(string $locationId)
    {
        try {
            return $this->table->where('location_id', $locationId)->first();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Checks if location data exists
     *
     * @param string $locationId GMB location ID
     *
     * @return \Illuminate\Support\Collection|bool
     */
    public function hasLocationData(string $locationId)
    {
        try {
            return $this->table->where('location_id', $locationId)->exists();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Inserts location data.
     *
     * @param array $data GMB location data
     *
     * @return bool
     */
    public function insertLocationData(array $data)
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
     * Updates location data.
     *
     * @param string $locationId GMB location ID
     * @param array  $data       update data
     *
     * @return bool
     */
    public function updateLocationData(string $locationId, array $data)
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
