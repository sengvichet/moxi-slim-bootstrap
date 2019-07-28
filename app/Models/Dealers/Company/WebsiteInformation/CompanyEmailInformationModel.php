<?php
/**
 * This file contains CompanyEmailInformationModel.
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
namespace App\Models\Dealers\Company\WebsiteInformation;

use Illuminate\Database\Capsule\Manager;

/**
 * This models contains methods for managing data in
 * company_email_information.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class CompanyEmailInformationModel
{
    protected $tableName = 'company_email_information';
    protected $fields = [
        'company_id', 'host', 'login', 'password', 'email', 'port', 'protocol'
    ];
    /**
     * DB table object
     *
     * @var \Illuminate\Database\Query\Builder
     */
    private $table;
    /**
     * Logger instance
     *
     * @var \Monolog\Logger
     */
    private $logger;

    /**
     * Initialises query builder.
     *
     * @param Manager $dbService DB service
     * @param Logger  $logger    logger service
     *
     * @return void
     */
    public function __construct(Manager $dbService, \Monolog\Logger $logger)
    {
        $this->table  = $dbService->table($this->tableName);
        $this->logger = $logger;
    }

    /**
     * Fetches all company email information.
     *
     * @param int $companyId company id
     *
     * @return object | bool
     */
    public function getCompanyEmailInformation(int $companyId)
    {
        try {
            $information = $this->table->where('company_id', $companyId)->first();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }

        return $information;
    }

    /**
     * Deletes all company email information.
     *
     * @param int $companyId company id
     *
     * @return object | bool
     */
    public function deleteCompanyEmailInformation(int $companyId)
    {
        if (!$companyId) {
            return false;
        }

        try {
            $status = $this->table->where('company_id', $companyId)->delete();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }

        return $status;
    }

    /**
     * Inserts all company's email information.
     *
     * @param array $data company's website information
     *
     * @return object | bool
     */
    public function insertCompanyEmailInformation(array $data)
    {
        if (empty($data['company_id'])) {
            return false;
        }

        $insertData = [];
        foreach ($this->fields as $field) {
            $insertData[$field] = (empty($data[$field])) ? null : $data[$field];
        }
        try {
            return $this->table->insert($insertData);
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Updates company's email information.
     *
     * @param array $data company's email information
     *
     * @return object | bool
     */
    public function updateCompanyEmailInformation(array $data)
    {
        if (empty($data['company_id'])) {
            return false;
        }

        $updateData = [];
        foreach ($data as $field => $value) {
            if (in_array($field, $this->fields)) {
                $updateData[$field] = $value;
            }
        }
        try {
            return $this->table
                ->where('company_id', $data['company_id'])
                ->update($updateData);
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }
}
