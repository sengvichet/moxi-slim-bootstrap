<?php
/**
 * Returns paths to files
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
return [
    'default' => [
        'storage' => storage_path() . '/files/default/',
        'public' => public_path() . '/files/default/',
        'relative' => '/files/default/',
    ],
    'company_photos' => [
        'storage' => storage_path() . '/files/company_photos/',
        'public' => public_path() . '/files/company_photos/',
        'relative' => '/files/company_photos/',
    ],
    'company_logos' => [
        'storage' => storage_path() . '/files/company_logos/',
        'public' => public_path() . '/files/company_logos/',
        'relative' => '/files/company_logos/',
    ],
    'post_media' => [
        'storage' => storage_path() . '/files/post_media/',
        'public' => public_path() . '/files/post_media/',
        'relative' => '/files/post_media/',
    ],
];
