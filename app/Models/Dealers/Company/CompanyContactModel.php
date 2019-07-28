<?php
/**
 * This file contains CompanyContactModel.
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

class CompanyContactModel
{
    protected $tableName = 'company_contacts';
    protected $fields = ['id', 'company_id', 'first_name', 'last_name',
                         'position', 'email', 'mobile_number', 'is_primary'];
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
     * Finds company contacts by fields.
     *
     * @param array $data ['field' => 'value']
     *
     * @return object | bool
     */
    public function getCompanyContacts(array $data)
    {
        $contacts = $this->table;            

        foreach ($data as $field => $value) {
            $contacts = $contacts->where($field, $value);
        }

        try {
            $contacts = $contacts->get();
        } catch (\Exception $e) {
            return false;
        }
        return $contacts;
    }

    /**
     * Insert company contact fields.
     *
     * @param array $data ['field' => 'value']
     *
     * @return bool
     */
    public function insertCompanyContact(array $data)
    {
        if (!$data || empty($data['company_id'])) {
            return false;
        }

        try {
            $id = $this->table->insertGetId([
                'company_id'    => $data['company_id'],
                'first_name'    => (!empty($data['first_name'])) ? $data['first_name'] : '',
                'last_name'     => (!empty($data['last_name'])) ? $data['last_name'] : '',
                'position'      => (!empty($data['position'])) ? $data['position'] : '',
                'email'         => (!empty($data['email'])) ? $data['email'] : '',
                'mobile_number' => (!empty($data['mobile_number'])) ? $data['mobile_number'] : '',
                'is_primary'    => (!empty($data['is_primary'])) ? $data['is_primary'] : 0,
            ]);
            return $id;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Updates company contact fields.
     *
     * @param array $data ['field' => 'value']
     *
     * @return bool
     */
    public function updateCompanyContact(array $data)
    {
        if (empty($data['id'])) {
            return false;
        }

        $id = $data['id'];
        unset($data['id']);

        $fields = array_intersect_key($data, array_fill_keys($this->fields, 0));
        if (empty($fields)) {
            return false;
        }

        try {
            $this->table->where('id', $id)->update($fields);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
