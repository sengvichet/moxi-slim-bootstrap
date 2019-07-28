<?php
/**
 * Returns twig settings
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
    'debug'            => env('APP_DEBUG', false),
    'auto_reload'      => env('APP_DEBUG', false),
    'cache'            => false/*storage_path() . '/cache/twig'*/,
    'strict_variables' => env('APP_DEBUG', false),
];
