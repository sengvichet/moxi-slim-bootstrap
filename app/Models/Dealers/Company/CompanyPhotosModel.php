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

class CompanyPhotosModel
{
    protected $tableName = 'company_photos';
    protected $fields = ['id', 'company_id', 'filename'];
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
     * Returns filenames of all company's photos.
     *
     * @param int $companyId company ID
     *
     * @return object | bool
     */
    public function getCompanyPhotos(int $companyId)
    {
        if (!$companyId) {
            return false;
        }
        try {
            $photos = $this->table->where('company_id', $companyId)->get();
        } catch (\Exception $e) {
            return false;
        }

        return $photos;
    }

    /**
     * Return data of one company photo by ID.
     *
     * @param int $photoId photo ID
     *
     * @return object | bool
     */
    public function getCompanyPhoto(int $photoId)
    {
        if (!$photoId) {
            return false;
        }
        try {
            $photo = $this->table->where('id', $photoId)->first();
        } catch (\Exception $e) {
            return false;
        }

        return $photo;
    }

    /**
     * Deletes a company's photo.
     *
     * @param int $photoId photo ID
     *
     * @return bool
     */
    public function deleteCompanyPhoto(int $photoId)
    {
        if (!$photoId) {
            return false;
        }

        try {
            $status = $this->table->where('id', $photoId)->delete();
        } catch (\Exception $e) {
            return false;
        }

        return $status;
    }

    /**
     * Deletes all company's photos.
     *
     * @param int $companyId company ID
     *
     * @return bool
     */
    public function deleteCompanyPhotos(int $companyId)
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
     * Inserts a company's photo.
     *
     * @param array $data photo data
     *
     * @return bool
     */
    public function insertCompanyPhoto(array $data)
    {
        if (empty($data['company_id']) || empty($data['filename'])) {
            return false;
        }

        try {
            $status = $this->table->insertGetId([
                'company_id' => $data['company_id'],
                'filename'   => $data['filename'],
            ]);
        } catch (\Exception $e) {
            return false;
        }

        return $status;
    }
}
