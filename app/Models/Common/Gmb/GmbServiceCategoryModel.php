<?php
/**
 * This file contains GmbServiceCategoryModel.
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

class GmbServiceCategoryModel
{
    protected $tableName = 'gmb_service_categories';
    protected $fields = ['id', 'name', 'title'];
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
     * Fetches all service categories
     *
     * @param array|null $params optional parameters
     *
     * @return Collection|bool
     */
    public function getCategories(array $params = null)
    {
        try {
            $query = $this->table;
            if (!empty($params['title'])) {
                $query = $query->where('title', 'LIKE', '%' . $params['title'] . '%');
            }
            return $query->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Fetches service category
     *
     * @param array $data service category data
     *
     * @return int|bool
     */
    public function getCategory(array $data)
    {
        if (!$data) {
            return false;
        }
        $where = [];
        foreach ($this->fields as $field) {
            if (!empty($data[$field])) {
                $where[$field] = $data[$field];
            }
        }
        try {
            $query = $this->table;
            foreach ($where as $key => $value) {
                $query = $query->where($key, $value);
            }
            return $query->first();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Inserts service category
     *
     * @param array $data service category data
     *
     * @return int|bool
     */
    public function insertCategory(array $data)
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
            return $this->table->insertGetId($insertData);
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }
}
