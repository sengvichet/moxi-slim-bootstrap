<?php
/**
 * This file contains UsersGroupsModel.
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

class UsersGroupsModel
{
    protected $tableName = 'users_groups';
    protected $fields = ['user_id', 'group_id'];
    private $dbService;

    /**
     * Initialises query builder.
     *
     * @return void
     */
    public function __construct(Manager $dbService)
    {
        $this->table = $dbService->table($this->tableName);
    }

    /**
     * Fetches user's groups ids.
     *
     * @return object | bool
     */
    public function getUserGroups(int $userId)
    {
        if (!$userId) {
            return false;
        }

        try {
            $groups = $this->table->where('user_id', $userId)->pluck('group_id');
        } catch (\Exception $e) {
            return false;
        }

        return $groups;
    }
}
