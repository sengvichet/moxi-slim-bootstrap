<?php
/**
 * This file contains GmbLocationCategoriesModel.
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

class GmbLocationCategoriesModel
{
    protected $tableName = 'gmb_location_categories';
    protected $fields = ['location_id', 'category_id', 'is_primary'];
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
     * Fetches location categories
     *
     * @param string $locationId GMB location ID
     *
     * @return \Illuminate\Support\Collection|bool
     */
    public function getLocationCategories(string $locationId)
    {
        try {
            return $this->table->where('location_id', $locationId)->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Inserts location primary category.
     *
     * @param string $locationId location ID
     * @param string $categoryId category ID
     *
     * @return bool
     */
    public function insertLocationPrimaryCategory(string $locationId, string $categoryId)
    {
        try {
            $insertData = [
                'location_id' => $locationId,
                'category_id' => $categoryId,
                'is_primary'  => 1
            ];
            return $this->table->insert($insertData);
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Inserts location additional category.
     *
     * @param string $locationId location ID
     * @param string $categoryId category ID
     *
     * @return bool
     */
    public function insertLocationAdditionalCategory(string $locationId, string $categoryId)
    {
        try {
            $insertData = [
                'location_id' => $locationId,
                'category_id' => $categoryId,
                'is_primary'  => 0
            ];
            return $this->table->insert($insertData);
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Deletes location primary category.
     *
     * @param string $locationId GMB location ID
     *
     * @return bool
     */
    public function deleteLocationPrimaryCategory(string $locationId)
    {
        try {
            return $this->table
                ->where('location_id', $locationId)
                ->where('is_primary', 1)
                ->delete();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Deletes all location additional categories.
     *
     * @param string $locationId GMB location ID
     *
     * @return bool
     */
    public function deleteLocationAdditionalCategories(string $locationId)
    {
        try {
            return $this->table
                ->where('location_id', $locationId)
                ->where('is_primary', 0)
                ->delete();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }
}
