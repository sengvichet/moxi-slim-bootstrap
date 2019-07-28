<?php
/**
 * This file contains GmbLocationAttributesModel.
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

class GmbLocationAttributesModel
{
    protected $tableName = 'gmb_location_attributes';
    protected $fields = ['location_id', 'attribute', 'value'];
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
     * Fetches location attributes
     *
     * @param string $locationId GMB location ID
     *
     * @return \Illuminate\Support\Collection|bool
     */
    public function getLocationAttributes(string $locationId)
    {
        try {
            return $this->table->where('location_id', $locationId)->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Inserts location attribute.
     *
     * @param array $data GMB location data
     *
     * @return bool
     */
    public function insertLocationAttribute(array $data)
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
     * Deletes all location attributes.
     *
     * @param string $locationId location ID
     *
     * @return bool
     */
    public function deleteLocationAttributes(string $locationId)
    {
        try {
            return $this->table->where('location_id', $locationId)->delete();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }
}
