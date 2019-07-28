<?php
/**
 * This file contains SocialMediaModel.
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
namespace App\Models\Dealers;

use Illuminate\Database\Capsule\Manager;

class SocialMediaModel
{
    protected $tableName = 'social_media';
    protected $fields = ['id', 'name', 'title', 'has_login', 'has_data'];
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
     * Returns all social media.
     *
     * @param array|null $params optional parameters
     *
     * @return object | bool
     */
    public function getSocialMedia(array $params = null)
    {
        $where = [];
        if ($params) {
            foreach ($params as $field => $value) {
                if (in_array($field, $this->fields)) {
                    $where[$field] = $value;
                }
            }
        }
        try {
            $query = $this->table;
            foreach ($where as $key => $value) {
                $query = $query->where($key, $value);
            }
            return $query->get();
        } catch (\Exception $e) {
            return false;
        }
    }
}
