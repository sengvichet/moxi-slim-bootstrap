<?php
/**
 * This file contains GmbPostModel.
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

class GmbPostModel
{
    protected $tableName = 'gmb_posts';
    protected $fields = ['post_id', 'language_code', 'summary', 'topic_type',
        'search_url', 'cta_type', 'cta_url', 'state', 'create_time',
        'update_time', 'location_id', 'is_sync'];
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
     * Fetches GMB location's posts.
     *
     * @param string $location GMB location ID
     * @param array  $time     ['start' => string, 'end' => string]
     *
     * @return array|bool
     */
    public function getLocationPosts(string $location, array $time = null)
    {
        if (!$location) {
            return false;
        }

        try {
            $query = $this->table->where('location_id', $location);
            if ($time) {
                $query = $query
                    ->where('create_time', '>', $time['start'])
                    ->where('create_time', '<', $time['end']);
            }
            return $query->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Fetches GMB posts.
     *
     * @param array $params search params
     *
     * @return array|bool
     */
    public function getPosts(array $params = null)
    {
        try {
            $query = $this->table;
            if (!empty($params)) {
                $queryParams = [];
                foreach ($params as $param => $value) {
                    if (in_array($param, $this->fields)) {
                        $queryParams[$param] = $value;
                    }
                }
                foreach ($queryParams as $param => $value) {
                    $query = $query->where($param, $value);
                }
            }
            $query = $query
                ->orderBy('update_time', 'DESC')
                ->orderBy('create_time', 'DESC');
            return $query->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Inserts location's post.
     *
     * @param array $data post data
     *
     * @return int|bool
     */
    public function insertPost(array $data)
    {
        if (!$data) {
            return false;
        }

        $insertData = [];
        foreach ($this->fields as $field) {
            $insertData[$field] = (array_key_exists($field, $data)) ? $data[$field] : 0;
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
     * Updates location's post.
     *
     * @param string $postId post ID
     * @param array  $data   post data
     *
     * @return int|bool
     */
    public function updatePost(string $postId, array $data)
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

    /**
     * Counts GMB posts.
     *
     * @param array $params search params
     *
     * @return array|bool
     */
    public function countPosts(array $params = null)
    {
        try {
            $query = $this->table;
            if (!empty($params)) {
                $queryParams = [];
                foreach ($params as $param => $value) {
                    if (in_array($param, $this->fields)) {
                        $queryParams[$param] = $value;
                    }
                }
                foreach ($queryParams as $param => $value) {
                    $query = $query->where($param, $value);
                }
            }
            return $query->count();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Deletes GMB post.
     *
     * @param string $postId post ID
     *
     * @return array|bool
     */
    public function deletePost(string $postId)
    {
        try {
            return $this->table->where('post_id', $postId)->delete();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }
}
