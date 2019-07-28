<?php
/**
 * This file contains UserTypeModel.
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
namespace App\Models\Dealers\User;

use Illuminate\Database\Capsule\Manager;

/**
 * This model contains methods to manage DB table 'user_types'
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class UserTypeModel
{
    protected $tableName = 'user_types';
    /**
     * Logger service
     *
     * @var \Monolog\Logger
     */
    private $logger;

    /**
     * Initialises query builder.
     *
     * @param Manager         $dbService DB Service
     * @param \Monolog\Logger $logger    logger service
     *
     * @return void
     */
    public function __construct(Manager $dbService, \Monolog\Logger $logger)
    {
        $this->table = $dbService->table($this->tableName);
        $this->logger = $logger;
    }

    /**
     * Finds user type by type ID.
     *
     * @param int $typeId user's type ID
     *
     * @return string|bool
     */
    public function getUserType(int $typeId)
    {
        try {
            $result = $this->table->where('id', $typeId)->first();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }

        return (empty($result->name)) ? false : $result->name;
    }

    /**
     * Finds dealer type.
     *
     * @return string|bool
     */
    public function getDealerType()
    {
        try {
            return $this->table->where('name', 'dealer')->first();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }
}
