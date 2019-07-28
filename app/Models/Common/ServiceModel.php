<?php
/**
 * This file contains ServiceModel.
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
 * This models contains methods for managing data in services.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class ServiceModel
{
    protected $tableName = 'services';
    protected $fields = ['name', 'title', 'cost'];
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
     * Fetches all services
     *
     * @return Collection|bool
     */
    public function getServices()
    {
        try {
            return $this->table->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Fetches one service by params
     *
     * @param array $params parameters to find service
     *
     * @return Collection|bool
     */
    public function getService(array $params)
    {
        $where = [];
        foreach ($params as $field => $value) {
            if (in_array($field, $this->fields)) {
                $where[$field] = $value;
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
}
