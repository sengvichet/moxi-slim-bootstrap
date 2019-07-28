<?php
/**
 * This file contains CompanyGoogleServicesModel.
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

class CompanyGoogleServicesModel
{
    protected $tableName = 'company_google_services';
    protected $fields = ['company_id', 'has_analytics', 'has_gmb',
                         'has_adwords_ppc', 'adwords_ppc_budget'];
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
     * Returns all company's google services.
     *
     * @param int $companyId company ID
     *
     * @return object | bool
     */
    public function getCompanyGoogleServices(int $companyId)
    {
        if (!$companyId) {
            return false;
        }
        try {
            $services = $this->table->where('company_id', $companyId)->first();
        } catch (\Exception $e) {
            return false;
        }

        return $services;
    }

    /**
     * Inserts company's Google services row into DB
     *
     * @param array $data Google services data
     *
     * @return bool
     */
    public function insertCompanyGoogleServices(array $data)
    {
        if (!$data || empty($data['company_id'])) {
            return false;
        }
        try {
            $status = $this->table->insert([
                'company_id'         => $data['company_id'],
                'has_analytics'      => empty($data['has_analytics'])
                    ? 0 : $data['has_analytics'],
                'has_gmb'            => empty($data['has_gmb'])
                    ? 0 : $data['has_gmb'],
                'has_adwords_ppc'    => empty($data['has_adwords_ppc'])
                    ? 0 : $data['has_adwords_ppc'],
                'adwords_ppc_budget' => empty($data['adwords_ppc_budget'])
                    ? null : $data['adwords_ppc_budget'],
            ]);
        } catch (\Exception $e) {
            return false;
        }

        return $status;
    }

    /**
     * Updates company's Google services data
     *
     * @param array $data data
     *
     * @return bool
     */
    public function updateCompanyGoogleServices(array $data)
    {
        if (!$data || empty($data['company_id'])) {
            return false;
        }
        $updateData = array_intersect_key($data, array_fill_keys($this->fields, 0));
        unset($updateData['company_id']);
        try {
            $this->table
                ->where('company_id', $data['company_id'])
                ->update($updateData);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
