<?php
/**
 * This file contains GmbEmailNotificationModel.
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

class GmbEmailNotificationModel
{
    protected $tableName = 'gmb_email_notifications';
    private $fields = ['instance_id', 'instance_type', 'email', 'is_sent', 'timestamp'];
    private $table;
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
     * Inserts email notification.
     *
     * @return bool
     */
    public function insertEmailNotification(array $data)
    {
        $insertData = [];
        foreach ($this->fields as $field) {
            if (empty($data[$field])) {
                return false;
            } else {
                $insertData[$field] = $data[$field];
            }
        }

        try {
            return $this->table->insert($insertData);
        } catch (\Exception $e) {
            return false;
        }
    }
}
