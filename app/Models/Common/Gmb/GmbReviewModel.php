<?php
/**
 * This file contains GmbReviewModel.
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

class GmbReviewModel
{
    protected $tableName = 'gmb_reviews';
    protected $fields = ['review_id', 'reviewer_name', 'comment', 'star_rating',
        'create_timestamp', 'update_timestamp', 'reply_comment',
        'reply_update_timestamp', 'location_id', 'is_sync'];
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
     * Fetches GMB location's reviews.
     *
     * @param array $params search params
     *
     * @return array|bool
     */
    public function getReviews(array $params = null)
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
            return $query->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Fetches GMB location's reviews.
     *
     * @param string     $location GMB location ID
     * @param array|null $time     optional time range
     *
     * @return array|bool
     */
    public function getLocationReviews(string $location, array $time = null)
    {
        if (!$location) {
            return false;
        }

        try {
            $query = $this->table->where('location_id', $location)
                ->orderBy('update_timestamp', 'desc');
            if (!empty($time)) {
                $query = $query
                    ->where('create_timestamp', '>', $time['start'])
                    ->where('create_timestamp', '<', $time['end']);
            }
            return $query->get();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Returns review by ID
     *
     * @param string $id GMB review's ID
     *
     * @return object|bool
     */
    public function getReview(string $id)
    {
        if (!$id) {
            return false;
        }

        try {
            return $this->table->where('review_id', $id)->first();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Inserts location's review.
     *
     * @param array $data review data
     *
     * @return int|bool
     */
    public function insertReview(array $data)
    {
        if (!$data) {
            return false;
        }

        $insertData = [];
        foreach ($this->fields as $field) {
            if (!array_key_exists($field, $data)) {
                return false;
            }
            $insertData[$field] = $data[$field];
        }
        try {
            $exists = $this->table
                ->where('review_id', $insertData['review_id'])
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
     * Updates reply fields in review's row
     *
     * @param array $data reply data
     *
     * @return bool
     */
    public function updateReply(array $data)
    {
        if (empty($data['review_id'])
            || !array_key_exists('reply_comment', $data)
            || !array_key_exists('is_sync', $data)
            || !array_key_exists('reply_update_timestamp', $data)
        ) {
            return false;
        }

        try {
            return $this->table
                ->where('review_id', $data['review_id'])
                ->update(
                    [
                    'reply_comment'          => $data['reply_comment'],
                    'reply_update_timestamp' => $data['reply_update_timestamp'],
                    'is_sync'                => $data['is_sync'],
                    ]
                );
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }
    }

    /**
     * Counts GMB location's reviews.
     *
     * @param array $params search params
     *
     * @return array|bool
     */
    public function countReviews(array $params = null)
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
}
