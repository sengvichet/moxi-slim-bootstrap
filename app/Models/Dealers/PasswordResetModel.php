<?php
/**
 * This file contains model for password_resets DB table.
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
namespace App\Models\Dealers;

use Illuminate\Database\Capsule\Manager;

class PasswordResetModel
{
    protected $tableName = 'password_resets';
    protected $fields = ['id', 'user_id', 'token', 'expires_at', 'used'];
    
    private $logService;

    /**
     * Initialises query builder.
     *
     * @param Manager $dbService DB service
     *
     * @return void
     */
    public function __construct(Manager $dbService, $logService)
    {
        $this->table = $dbService->table($this->tableName);
        $this->logService = $logService;
    }

    /**
     * Inserts new password reset into DB.
     *
     * @param array $data password reset data
     *
     * @return bool
     */
    public function savePasswordReset(array $data)
    {
        if (empty($data)
            || empty($data['user_id'])
            || empty($data['token'])
            || empty($data['expires_at'])
            || !isset($data['used'])
        ) {
            return false;
        }

        try {
            return $this->table->insert([
                'user_id'    => $data['user_id'],
                'token'      => $data['token'],
                'expires_at' => $data['expires_at'],
                'used'       => $data['used']
            ]);
        } catch (\Exception $e) {
            $this->logService->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Finds password reset row by all fields.
     *
     * @param array $data ['field' => 'value']
     *
     * @return object | bool
     */
    public function getPasswordReset(array $data)
    {
        $passwordReset = false;

        $query = $this->table;

        foreach ($this->fields as $field) {
            if (empty($data[$field])) {
                continue;
            }

            $query = $query->where($field, $data[$field]);
        }

        try {
            $passwordReset = $query->first();
        } catch (\Exception $e) {
            $this->logService->addError(__CLASS__, [$e]);
            return $passwordReset;
        }

        return $passwordReset;
    }

    /**
     * Finds password reset row by all fields.
     *
     * @param array $data ['field' => 'value']
     *
     * @return object | bool
     */
    public function getValidPasswordReset(array $data)
    {
        $passwordReset = false;

        if (empty($data['token'])) {
            return false;
        }

        $query = $this->table
            ->where('token', $data['token'])
            ->where('expires_at', '>=', date('Y-m-d H:i:s'))
            ->where('used', false);

        try {
            $passwordReset = $query->first();
        } catch (\Exception $e) {
            $this->logService->addError(__CLASS__, [$e]);
            return $passwordReset;
        }

        return $passwordReset;
    }

    /**
     * Updates used field of password_resets table.
     *
     * @param int $passwordResetId id of password reset
     *
     * @return bool 
     */
    public function useToken(int $passwordResetId)
    {
        if (empty((int) $passwordResetId)) {
            return false;
        }

        try {
            return $this->table
                ->where('id', $passwordResetId)
                ->update(['used' => 1]);
        } catch (\Exception $e) {
            $this->logService->addError(__CLASS__, [$e]);
            return false;
        }
    }
}
