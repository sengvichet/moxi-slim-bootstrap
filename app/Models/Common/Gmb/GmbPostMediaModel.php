<?php
/**
 * This file contains GmbPostMediaModel.
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

class GmbPostMediaModel
{
    protected $tableName = 'gmb_posts_media';
    protected $fields = ['media_id', 'post_id', 'media_format', 'google_url',
        'thumbnail_url', 'source_url', 'create_time'];
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
     * Fetches all posts media.
     *
     * @return int|bool
     */
    public function getPostsMedia()
    {
        try {
            return $this->table->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Fetches post's media.
     *
     * @param string $postId GMB post ID
     *
     * @return int|bool
     */
    public function getPostMedia(string $postId)
    {
        if (!$postId) {
            return false;
        }

        try {
            return $this->table->where('post_id', $postId)->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Inserts post's media.
     *
     * @param array $data media data
     *
     * @return int|bool
     */
    public function insertPostMedia(array $data)
    {
        if (!$data) {
            return false;
        }

        $insertData = [];
        foreach ($this->fields as $field) {
            $insertData[$field] = (array_key_exists($field, $data)) ? $data[$field] : null;
        }
        try {
            $exists = $this->table
                ->where('media_id', $insertData['media_id'])
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
     * Updates post's media.
     *
     * @param string $sourceUrl media source URL
     * @param array  $data      media data
     *
     * @return int|bool
     */
    public function updatePostMedia(string $sourceUrl, array $data)
    {
        if (!$data) {
            return false;
        }

        $updateData = [];
        foreach ($data as $field => $value) {
            if (in_array($field, $this->fields)) {
                $updateData[$field] = $value;
            }
        }
        try {
            $status = $this->table->where('source_url', $sourceUrl)->update($updateData);
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }

        return $status;
    }
}
