<?php
/**
 * This file contains CompanyModel.
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

class CompanyModel
{
    protected $tableName = 'companies';
    protected $fields = ['id', 'user_id', 'business_name', 'brand_name', 'street',
                        'address_line_2', 'city', 'state', 'zip', 'website',
                        'phone', 'email', 'opening_date', 'is_sync'];
    private $table;

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
     * Finds company by one field.
     *
     * @param array $data ['field' => 'value']
     *
     * @return object | bool
     */
    public function getCompany(array $data)
    {
        $where = [];
        foreach ($this->fields as $field) {
            if (array_key_exists($field, $data)) {
                $where[$field] = $data[$field];
            }
        }

        try {
            $query = $this->table;
            foreach ($where as $key => $value) {
                $query = $query->where($key, $value);
            }
            return $query->first();
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Insert company fields.
     *
     * @param array $data ['field' => 'value']
     *
     * @return bool
     */
    public function insertCompany(array $data)
    {
        if (!$data || empty($data['user_id'])) {
            return false;
        }

        try {
            return $this->table->insertGetId(
                [
                    'user_id'       => $data['user_id'],
                    'business_name' => (!empty($data['business_name'])) ? $data['business_name'] : '',
                    'brand_name'    => (!empty($data['brand_name'])) ? $data['brand_name'] : '',
                    'street'        => (!empty($data['street'])) ? $data['street'] : '',
                    'address_line_2'=> (!empty($data['address_line_2'])) ? $data['address_line_2'] : '',
                    'city'          => (!empty($data['city'])) ? $data['city'] : '',
                    'state'         => (!empty($data['state'])) ? $data['state'] : '',
                    'zip'           => (!empty($data['zip'])) ? $data['zip'] : '',
                    'website'       => (!empty($data['website'])) ? $data['website'] : '',
                    'phone'         => (!empty($data['phone'])) ? $data['phone'] : '',
                    'email'         => (!empty($data['email'])) ? $data['email'] : '',
                    'opening_date'  => (!empty($data['opening_date'])) ? $data['opening_date'] : null,
                    'is_sync'       => (!empty($data['is_sync'])) ? $data['is_sync'] : 0,
                ]
            );
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Updates company fields.
     *
     * @param array $data ['field' => 'value']
     *
     * @return bool
     */
    public function updateCompany(array $data)
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

    /**
     * Counts companies that are connected with GMB locations
     *
     * @param array|null $params optional parameters
     *
     * @return int|bool
     */
    public function countGmbCompanies(array $params = null)
    {
        $where = [];
        if ($params) {
            foreach ($params as $field => $value) {
                if (in_array($field, $this->fields)) {
                    $where[$field] = $value;
                }
            }
        }
        try {
            $query = $this->table
                ->join('dealers_gmb_accounts', 'companies.user_id', '=', 'dealers_gmb_accounts.user_id');
            if ($where) {
                foreach ($where as $key => $value) {
                    $query = $query->where($key, $value);
                }
            }
            return $query->count();
        }  catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Fetches companies that are connected with GMB locations
     *
     * @param array|null $params optional parameters
     *
     * @return Collection|bool
     */
    public function getGmbCompanies(array $params = null)
    {
        $where = [];
        if ($params) {
            foreach ($params as $field => $value) {
                if (in_array($field, $this->fields)) {
                    $where[$field] = $value;
                }
            }
        }
        try {
            $query = $this->table
                ->join('dealers_gmb_accounts', 'companies.user_id', '=', 'dealers_gmb_accounts.user_id');
            if ($where) {
                foreach ($where as $key => $value) {
                    $query = $query->where($key, $value);
                }
            }
            return $query->get();
        }  catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Fetches company ID that is connected to GMB location
     *
     * @param string $locationId GMB location ID
     *
     * @return int|bool
     */
    public function getLocationCompany(string $locationId)
    {
        try {
            $result = $this->table
                ->join(
                    'dealers_gmb_accounts',
                    'companies.user_id',
                    '=',
                    'dealers_gmb_accounts.user_id'
                )
                ->join(
                    'gmb_locations',
                    'dealers_gmb_accounts.account_id',
                    '=',
                    'gmb_locations.account_id'
                )
                ->where('gmb_locations.location_id', $locationId)
                ->select('companies.id')
                ->first();
        }  catch (\Exception $e) {
            return false;
        }

        return (empty($result->id)) ? false : $result->id;
    }
}
