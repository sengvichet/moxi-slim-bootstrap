<?php
/**
 * This file contains CompanyWebsiteLiveInformationModel.
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
 * company_website_live_information.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class CompanyWebsiteLiveInformationModel
{
    protected $tableName = 'company_website_live_information';
    protected $fields = ['company_id', 'need_contact_it', 'domain_host', 'username', 'password'];
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
     * Fetches all company website live information.
     *
     * @param int $companyId company id
     *
     * @return object | bool
     */
    public function getCompanyWebsiteLiveInformation(int $companyId)
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
     * Deletes all company website live information.
     *
     * @param int $companyId company id
     *
     * @return object | bool
     */
    public function deleteCompanyWebsiteLiveInformation(int $companyId)
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
     * Inserts all company's website live information.
     *
     * @param array $data company's website information
     *
     * @return object | bool
     */
    public function insertCompanyWebsiteLiveInformation(array $data)
    {
        if (empty($data['company_id'])) {
            return false;
        }

        $insertData = [];
        foreach ($this->fields as $field) {
            $insertData[$field] = (array_key_exists($field, $data))
                ? $data[$field] : null;
        }
        try {
            return $this->table->insert($insertData);
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Updates company's website live information.
     *
     * @param array $data company's website live information
     *
     * @return object | bool
     */
    public function updateCompanyWebsiteLiveInformation(array $data)
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
