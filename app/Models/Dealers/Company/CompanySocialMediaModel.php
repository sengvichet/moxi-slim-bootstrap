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

class CompanySocialMediaModel
{
    protected $tableName = 'company_social_media';
    protected $fields = [
        'company_id', 'social_media_id', 'url', 'name', 'username', 'password'
    ];
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
     * Returns all company's social media.
     *
     * @param int $companyId     company ID
     * @param int $socialMediaId social media ID
     *
     * @return object | bool
     */
    public function getCompanySocialMedia(int $companyId, int $socialMediaId = null)
    {
        if (!$companyId) {
            return false;
        }
        try {
            if (empty($socialMediaId)) {
                $media = $this->table->where('company_id', $companyId)->get();
            } else {
                $media = $this->table->where(
                    [
                        'company_id'      => $companyId,
                        'social_media_id' => $socialMediaId
                    ]
                )->first();
            }
        } catch (\Exception $e) {
            return false;
        }

        return $media;
    }

    /**
     * Deletes a company's social media.
     *
     * @param int $companyId     company's id
     * @param int $socialMediaId social media's id
     *
     * @return bool
     */
    public function deleteCompanySocialMedia(int $companyId, int $socialMediaId)
    {
        if (!$companyId) {
            return false;
        }

        try {
            $status = $this->table->where(
                [
                    'company_id'      => $companyId,
                    'social_media_id' => $socialMediaId
                ]
            )->delete();
        } catch (\Exception $e) {
            return false;
        }

        return $status;
    }

    /**
     * Inserts a company's social media.
     *
     * @param array $data social media data
     *
     * @return bool
     */
    public function insertCompanySocialMedia(array $data)
    {
        if (empty($data['company_id']) || empty($data['social_media_id'])) {
            return false;
        }

        try {
            $status = $this->table->insert(
                [
                    'company_id'      => $data['company_id'],
                    'social_media_id' => $data['social_media_id'],
                    'url'             => (empty($data['url'])) ? null : $data['url'],
                    'name'            => (empty($data['name'])) ? null : $data['name'],
                    'username'        => (empty($data['username'])) ? null : $data['username'],
                    'password'        => (empty($data['password'])) ? null : $data['password'],
                ]
            );
        } catch (\Exception $e) {
            return false;
        }

        return $status;
    }

    /**
     * Updates a company's social media.
     *
     * @param array $data social media data
     *
     * @return bool
     */
    public function updateCompanySocialMedia(array $data)
    {
        if (empty($data['company_id']) || empty($data['social_media_id'])) {
            return false;
        }

        try {
            $updateData = [];
            if (array_key_exists('url', $data)) {
                $updateData['url'] = (empty($data['url'])) ? null : $data['url'];
            }
            if (array_key_exists('name', $data)) {
                $updateData['name'] = (empty($data['name'])) ? null : $data['name'];
            }
            if (array_key_exists('username', $data)) {
                $updateData['username'] = (empty($data['username'])) ? null : $data['username'];
            }
            if (array_key_exists('password', $data)) {
                $updateData['password'] = (empty($data['password'])) ? null : $data['password'];
            }
            $this->table->where(
                [
                    'company_id'      => $data['company_id'],
                    'social_media_id' => $data['social_media_id'],
                ]
            )->update($updateData);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
