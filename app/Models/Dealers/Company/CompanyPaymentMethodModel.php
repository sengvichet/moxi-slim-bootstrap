<?php
/**
 * This file contains CompanyPaymentMethodModel.
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

class CompanyPaymentMethodModel
{
    protected $tableName = 'company_payment_methods';
    protected $fields = ['company_id', 'payment_method_id'];
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
     * Fetches all company payment methods.
     *
     * @param int $companyId company id
     *
     * @return object | bool
     */
    public function getCompanyPaymentMethods(int $companyId)
    {
        try {
            $methods = $this->table->where('company_id', $companyId)->get();
        } catch (\Exception $e) {
            return false;
        }

        return $methods;
    }

    /**
     * Deletes all company payment methods.
     *
     * @return object | bool
     */
    public function deleteCompanyPaymentMethods(int $companyId)
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
     * Inserts all company's payment methods.
     *
     * @param array $data company's payment methods
     *
     * @return object | bool
     */
    public function insertCompanyPaymentMethod(array $data)
    {
        if (empty($data['company_id']) || empty($data['payment_method_id'])) {
            return false;
        }

        try {
            $status = $this->table->insert([
                'company_id'        => $data['company_id'],
                'payment_method_id' => $data['payment_method_id']
            ]);
        } catch (\Exception $e) {
            return false;
        }
        return $status;
    }
}
