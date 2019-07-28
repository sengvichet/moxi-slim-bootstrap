<?php
/**
 * This file contains CompanyInformationModel.
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

class CompanyInformationModel
{
    protected $tableName = 'company_information';
    protected $fields = ['company_id', 'notes', 'business_description', 'business_tagline'];
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
     * Fetches all company information.
     *
     * @param int $companyId company id
     *
     * @return object | bool
     */
    public function getCompanyInformation(int $companyId)
    {
        try {
            $information = $this->table->where('company_id', $companyId)->first();
        } catch (\Exception $e) {
            return false;
        }

        return $information;
    }

    /**
     * Deletes all company information.
     *
     * @return object | bool
     */
    public function deleteCompanyInformation(int $companyId)
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
     * Inserts all company's information.
     *
     * @param array $data company's payment methods
     *
     * @return object | bool
     */
    public function insertCompanyInformation(array $data)
    {
        try {
            $status = $this->table->insert([
                'company_id'           => $data['company_id'],
                'notes'                => $data['notes'],
                'business_description' => $data['business_description'],
                'business_tagline'     => $data['business_tagline']
            ]);
        } catch (\Exception $e) {
            return false;
        }

        return $status;
    }

    /**
     * Updates company's information.
     *
     * @param array $data company's payment methods
     *
     * @return object | bool
     */
    public function updateCompanyInformation(array $data)
    {
        $updateData = [];
        foreach ($data as $field => $value) {
            if (in_array($field, $this->fields)) {
                $updateData[$field] = $value;
            }
        }
        try {
            $status = $this->table
                ->where('company_id', $data['company_id'])
                ->update($updateData);
        } catch (\Exception $e) {
            return false;
        }

        return $status;
    }
}
