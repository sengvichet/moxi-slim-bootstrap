<?php
/**
 * This file contains CompanySocialMediaModel.
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

class CompanyLogosModel
{
    protected $tableName = 'company_logos';
    protected $fields = ['id', 'company_id', 'filename'];
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
     * Returns filename of a company's logo.
     *
     * @param int $companyId company ID
     *
     * @return object | bool
     */
    public function getCompanyLogo(int $companyId)
    {
        if (!$companyId) {
            return false;
        }
        try {
            $logo = $this->table->where('company_id', $companyId)->first();
        } catch (\Exception $e) {
            return false;
        }

        return $logo;
    }

    /**
     * Deletes a company's logo.
     *
     * @param int $companyId company ID
     *
     * @return bool
     */
    public function deleteCompanyLogo(int $companyId)
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
     * Inserts a company's logo.
     *
     * @param array $data logo data
     *
     * @return bool
     */
    public function insertCompanyLogo(array $data)
    {
        if (empty($data['company_id']) || empty($data['filename'])) {
            return false;
        }

        try {
            $status = $this->table->insertGetId([
                'company_id' => $data['company_id'],
                'filename'   => $data['filename'],
            ]);
        } catch (\Exception $e) {
            return false;
        }

        return $status;
    }
}
