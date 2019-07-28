<?php
/**
 * This file contains GmbPostProductModel.
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
namespace App\Models\Common\Gmb;

use Illuminate\Database\Capsule\Manager;

class GmbPostProductModel
{
    protected $tableName = 'gmb_posts_products';
    protected $fields = [
        'post_id', 'product_name',
        'lower_price_currency', 'lower_price_units', 'lower_price_nanos',
        'upper_price_currency', 'upper_price_units', 'upper_price_nanos',
    ];
    private $table;
    private $logger;

    /**
     * Initialises query builder.
     *
     * @return void
     */
    public function __construct(Manager $dbService, \Monolog\Logger $logger)
    {
        $this->table = $dbService->table($this->tableName);
        $this->logger = $logger;
    }

    /**
     * Fetches posts products.
     *
     * @return Collection|bool
     */
    public function getPostProducts()
    {
        try {
            return $this->table->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Fetches post's product.
     *
     * @param string $postId post ID
     *
     * @return Collection|bool
     */
    public function getPostProduct(string $postId)
    {
        if (!$postId) {
            return false;
        }

        try {
            return $this->table->where('post_id', $postId)->first();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Inserts post product.
     *
     * @param array $data post data
     *
     * @return int|bool
     */
    public function insertPostProduct(array $data)
    {
        if (!$data) {
            return false;
        }

        $insertData = [];
        foreach ($this->fields as $field) {
            if (array_key_exists($field, $data)) {
                $insertData[$field] = $data[$field];
            }
        }
        try {
            $exists = $this->table
                ->where('post_id', $insertData['post_id'])
                ->exists();
            if ($exists) {
                return false;
            }
            $status = $this->table->insert($insertData);
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }

        return $status;
    }

    /**
     * Updates post's product.
     *
     * @param string $postId post ID
     * @param array  $data   post data
     *
     * @return int|bool
     */
    public function updatePostProduct(string $postId, array $data)
    {
        if (!$postId || !$data) {
            return false;
        }

        $updateData = [];
        foreach ($this->fields as $field) {
            if (array_key_exists($field, $data)) {
                $updateData[$field] = $data[$field];
            }
        }
        try {
            $status = $this->table->where('post_id', $postId)->update($updateData);
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }

        return $status;
    }
}
