<?php
/**
 * This file contains CompanyHoursModel.
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
namespace App\Models\Dealers\Company;

use Illuminate\Database\Capsule\Manager;

class CompanyHoursModel
{
    protected $tableName = 'company_hours';
    protected $fields = ['company_id', 'day', 'start', 'end'];
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
     * Fetches all company hours.
     *
     * @return object | bool
     */
    public function getCompanyHours(int $companyId)
    {
        if (!$companyId) {
            return false;
        }

        try {
            $hours = $this->table->where('company_id', $companyId)->get();
        } catch (\Exception $e) {
            return false;
        }

        return $hours;
    }

    /**
     * Deletes all company hours.
     *
     * @return object | bool
     */
    public function deleteCompanyHours(int $companyId)
    {
        if (!$companyId) {
            return false;
        }

        try {
            $status = $this->table->where('company_id', $companyId)->delete();
        } catch (\Exception $e) {
            return false;
        }

        return $status;
    }

    /**
     * Deletes company's regular hours.
     *
     * @param int $companyId company ID
     *
     * @return object | bool
     */
    public function deleteCompanyRegularHours(int $companyId)
    {
        if (!$companyId) {
            return false;
        }

        try {
            $status = $this->table
                ->where('company_id', $companyId)
                ->where('day', '<>', 'holiday')
                ->delete();
        } catch (\Exception $e) {
            return false;
        }

        return $status;
    }

    /**
     * Inserts all company hours.
     *
     * @return object | bool
     */
    public function insertCompanyHours(array $data)
    {
        if (empty($data)) {
            return false;
        }

        try {
            $status = $this->table->insert([
                'company_id' => $data['company_id'],
                'day'        => $data['day'],
                'start'      => $data['start'],
                'end'        => $data['end'],
            ]);
        } catch (\Exception $e) {
            return false;
        }

        return $status;
    }
}
