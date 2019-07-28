<?php
/**
 * This file contains CostsOptionsModel.
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

class CostsOptionsModel
{
    protected $tableName = 'costs_options';
    protected $fields = ['id', 'type_id', 'cost', 'description', 'setup'];
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
     * Fetches costs options by type id.
     *
     * @return object | bool
     */
    public function getCostsOptions(int $typeId)
    {
        if (!$typeId) {
            return false;
        }

        try {
            $options = $this->table->where('type_id', $typeId)->get();
        } catch (\Exception $e) {
            return false;
        }

        return $options;
    }

    /**
     * Fetches costs option by type id and option id.
     *
     * @return object | bool
     */
    public function getCostsOption(int $typeId, int $optionId)
    {
        if (!$typeId || !$optionId) {
            return false;
        }

        try {
            $option = $this->table
                ->where(['id' => $optionId, 'type_id' => $typeId])
                ->first();
        } catch (\Exception $e) {
            return false;
        }

        return $option;
    }
}
