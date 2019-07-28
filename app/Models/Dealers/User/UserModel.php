<?php
/**
 * This file contains UserModel.
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
namespace App\Models\Dealers\User;

use Illuminate\Database\Capsule\Manager;

class UserModel
{
    protected $tableName = 'users';
    protected $fields = ['id', 'first_name', 'last_name', 'email', 'type_id', 'password', 'portal_type'];
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
     * Finds user by one field.
     *
     * @param array $data ['field' => 'value']
     *
     * @return object | bool
     */
    public function getUser(array $data)
    {
        $user = false;

        foreach ($this->fields as $field) {
            if (empty($data[$field])) {
                continue;
            }

            try {
                $user = $this->table
                    ->where($field, $data[$field])
                    ->first();
            } catch (\Exception $e) {
                return $user;
            }
        }

        return $user;
    }

    /**
     * Finds user by email and password.
     *
     * @param array $data ['email' => email, 'password' => password]
     *
     * @return object | bool
     */
    public function getUserByCredentials(array $data)
    {
        $user = false;

        if (empty($data['email']) || empty($data['password'])) {
            return $user;
        }

        try {
            $user = $this->table
                ->where('email', $data['email'])
                ->first();
        } catch (\Exception $e) {
            return $user;
        }

        if (!$user || !$this->isValidPassword($data['password'], $user->password)) {
            return false;
        }

        return $user;
    }

    /**
     * Fetches users with 'admin' role
     *
     * @return \Illuminate\Database\Eloquent\Collection|bool
     */
    public function getAdmins()
    {
        try {
            return $this->table
                ->join('user_types', 'users.type_id', '=', 'user_types.id')
                ->where('user_types.name', 'admin')
                ->get();
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Fetches users with 'dealer' role
     *
     * @return \Illuminate\Database\Eloquent\Collection|bool
     */
    public function getDealers()
    {
        try {
            return $this->table
                ->join('user_types', 'users.type_id', '=', 'user_types.id')
                ->where('user_types.name', 'dealer')
                ->select('users.id', 'users.first_name', 'users.last_name', 'users.email')
                ->orderBy('users.email')
                ->get();
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Fetches users with 'dealer' role and GMB account
     *
     * @return \Illuminate\Database\Eloquent\Collection|bool
     */
    public function getGmbDealers()
    {
        try {
            return $this->table
                ->join('user_types', 'users.type_id', '=', 'user_types.id')
                ->leftJoin('dealers_gmb_accounts', 'users.id', '=', 'dealers_gmb_accounts.user_id')
                ->leftJoin('companies', 'users.id', '=', 'companies.user_id')
                ->where('user_types.name', 'dealer')
                ->select(
                    'users.id',
                    'users.first_name',
                    'users.last_name',
                    'users.email',
                    'dealers_gmb_accounts.account_id',
                    'companies.id AS company_id',
                    'companies.business_name AS company_name'
                )
                ->orderBy('users.email')
                ->get();
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Updates user fields.
     *
     * @param array $data ['field' => 'value']
     *
     * @return bool
     */
    public function updateUser(array $data)
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
     * Inserts user fields.
     *
     * @param array $data ['field' => 'value']
     *
     * @return bool
     */
    public function insertUser(array $data)
    {
        if (!$data) {
            return false;
        }

        $insertData = [];
        foreach ($data as $field => $value) {
            if (in_array($field, $this->fields)) {
                $insertData[$field] = $value;
            }
        }
        try {
            return $this->table->insertGetId($insertData);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Deletes user
     *
     * @param int $userId user ID
     *
     * @return bool
     */
    public function deleteUser(int $userId)
    {
        if (empty($userId)) {
            return false;
        }

        try {
            return $this->table->where('id', $userId)->delete();
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Validates user's password.
     *
     * @param string $input  input password
     * @param string $stored stored password
     *
     * @return bool
     */
    private function isValidPassword(string $input, string $stored)
    {
        return password_verify($input, $stored);
    }
}
