<?php
/**
 * This file contains CostsTypesModel.
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
namespace App\Models\Dealers\Costs;

use Illuminate\Database\Capsule\Manager;

class CostsTypesModel
{
    protected $tableName = 'costs_types';

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
     * Fetches costs types by params.
     *
     * @param array $params optional params
     *
     * @return object | bool
     */
    public function getCostsTypes(array $params = [])
    {
        try {
            $query = $this->table;
            if ($params) {
                foreach ($params as $field => $value) {
                    $query->where($field, $value);
                }
            }
            $types = $query->get();
        } catch (\Exception $e) {
            return false;
        }

        return $types;
    }

    /**
     * Fetches a cost type by name.
     *
     * @param string $name costs type's name
     *
     * @return object | bool
     */
    public function getCostsTypeByName(string $name)
    {
        try {
            $type = $this->table->where('name', $name)->first();
        } catch (\Exception $e) {
            return false;
        }

        return $type;
    }
}
