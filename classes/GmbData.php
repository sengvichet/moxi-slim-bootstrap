<?php
/**
 * This file contains a class for working with GMB data.
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
namespace Classes;

/**
 *  File upload class
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class GmbData
{
    /**
     * Config settings
     *
     * @var array
     */
    private $settings;
    /**
     * Logger service
     *
     * @var Monolog\Logger
     */
    private $logger;

    /**
     * Initialises settings
     *
     * @param array           $settings service settings
     * @param \Monolog\Logger $logger   logger service
     */
    public function __construct(array $settings, \Monolog\Logger $logger)
    {
        $this->settings = $settings;
        $this->logger   = $logger;
    }

    /**
     * Calculates website visits for 2 last months
     *
     * @param array $insights GMB insights for 2 last months
     * @param bool  $weekly   accumulate data weekly
     *
     * @return array
     */
    public function getWebsiteVisitsData(array $insights, bool $weekly = false)
    {
        $data = $this->getFieldData($insights, 'actions_website', true, $weekly);

        return $data;
    }

    /**
     * Calculates directions amount for 2 last months
     *
     * @param array $insights GMB insights for 2 last months
     * @param bool  $weekly   accumulate data weekly
     *
     * @return array
     */
    public function getDirectionsData(array $insights, bool $weekly)
    {
        $data = $this->getFieldData($insights, 'actions_driving_directions', true, $weekly);

        return $data;
    }

    /**
     * Calculates phone calls for 2 last months
     *
     * @param array $insights GMB insights for 2 last months
     * @param bool  $weekly   accumulate data weekly
     *
     * @return array
     */
    public function getPhoneCallsData(array $insights, bool $weekly)
    {
        $data = $this->getFieldData($insights, 'actions_phone', true, $weekly);

        return $data;
    }

    /**
     * Calculates review score for 2 last months
     *
     * @param array $reviews GMB reviews for 2 last months
     *
     * @return array
     */
    public function getReviewScoreData(array $reviews)
    {
        $data = $this->getFieldData($reviews, 'star_rating', false);
        if (count($reviews['current'])) {
            $data['count']['current'] /= count($reviews['current']);
        }
        if (count($reviews['previous'])) {
            $data['count']['previous'] /= count($reviews['previous']);
        }

        $data['count']['percent'] = $this->calculateComparativePercent(
            $data['count']['current'],
            $data['count']['previous']
        );
        $data['count']['current']  = number_format($data['count']['current'], 1);
        $data['count']['previous'] = number_format($data['count']['previous'], 1);

        return $data;
    }

    /**
     * Calculates total reviews amount for 2 last months
     *
     * @param array $reviews GMB insights for 2 last months
     *
     * @return array
     */
    public function getTotalReviewsData(array $reviews)
    {
        $data = [
            'count' => [
                'current'  => 0,
                'previous' => 0,
                'percent'  => '0%',
            ],
        ];
        foreach (['previous', 'current'] as $key) {
            $data['count'][$key] = $reviews[$key]->count();
        }
        $data['count']['percent'] = $this->calculateComparativePercent(
            $data['count']['current'],
            $data['count']['previous']
        );

        return $data;
    }

    /**
     * Calculates total posts amount for 2 last months
     *
     * @param array $posts GMB posts for 2 last months
     *
     * @return array
     */
    public function getTotalPostsData(array $posts)
    {
        $data = [
            'count' => [
                'current'  => count($posts['current']),
                'previous' => count($posts['previous']),
            ]
        ];
        $data['count']['percent'] = $this->calculateComparativePercent(
            $data['count']['current'],
            $data['count']['previous']
        );

        return $data;
    }

    /**
     * Calculates post actions for 2 last months
     *
     * @param array $posts GMB posts for 2 last months
     *
     * @return array
     */
    public function getPostActionsData(array $posts)
    {
        $data = [
            'count' => [
                'current'  => 0,
                'previous' => 0,
                'percent'  => '0%',
            ],
        ];

        return $data;
    }

    /**
     * Calculates website visits for 2 last months
     *
     * @param array $insights GMB insights for 2 last months
     * @param bool  $weekly   accumulate data weekly
     *
     * @return array
     */
    public function getPostViewsData(array $insights, bool $weekly = false)
    {
        $data = $this->getFieldData($insights, 'local_post_views_search', false, $weekly);

        return $data;
    }

    /**
     * Prepares one field of array
     *
     * @param array  $array  data
     * @param string $field  field
     * @param bool   $series is necessary to add series
     * @param bool   $weekly only sunday's data
     *
     * @return array
     */
    private function getFieldData(array $array, string $field, bool $series, bool $weekly = false)
    {
        $data = [
            'count' => [
                'current'  => 0,
                'previous' => 0,
                'percent'  => '0%',
            ],
        ];
        if ($series) {
            $data['series'] = ['labels' => [], 'data' => []];
        }
        $weeklySum = 0;
        foreach (['previous', 'current'] as $key) {
            foreach ($array[$key] as $row) {
                $data['count'][$key] += $row->{$field};
                if ($series) {
                    if (!$weekly) {
                        $data['series']['labels'][] = gmdate('j M\\. Y', strtotime($row->timestamp));
                        $data['series']['data'][] = $row->{$field};
                    } else {
                        $weeklySum += $row->{$field};
                        if ($this->isEndOfWeek($row->timestamp)) {
                            $data['series']['labels'][] = gmdate('j M\\. Y', strtotime($row->timestamp));
                            $data['series']['data'][] = $weeklySum;
                            $weeklySum = 0;
                        }
                    }
                }
            }
        }
        $data['count']['percent'] = $this->calculateComparativePercent(
            $data['count']['current'],
            $data['count']['previous']
        );

        return $data;
    }

    /**
     * Calculates percent on current and previous numbers
     *
     * @param numeric $current  current number
     * @param numeric $previous previous number
     *
     * @return string
     */
    private function calculateComparativePercent($current, $previous)
    {
        if (!$current) {
            $value = -100; // 100% of loss
        }
        if (!$previous) {
            $value = 0; // nothing to compare
        }
        if ($current && $previous) {
            $value = ($current / $previous) * 100 - 100;
        }
        $percent = number_format($value, 1) . '%';
        return $percent;
    }

    /**
     * Checks if the given date is end of the week (sunday)
     *
     * @param string $time date
     *
     * @return boolean
     */
    private function isEndOfWeek(string $time)
    {
        return (gmdate('N', strtotime($time)) == 7);
    }
}
