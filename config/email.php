<?php
/**
 * Returns email settings
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
    'smtp_on'   => env('SMTP_ON', false),
    'smtp_debug'=> false, //env('APP_DEBUG', true),
    'smtp_host' => env('SMTP_HOST', ''),
    'smtp_auth' => env('SMTP_AUTH', ''),
    'smtp_user' => env('SMTP_USER', ''),
    'smtp_pass' => env('SMTP_PASS', ''),
    'smtp_port' => env('SMTP_PORT', ''),
    'smtp_secure' => env('SMTP_SECURE', ''),

    'from' => [
        'email' => env('MAIL_FROM_EMAIL', ''),
        'name'  => env('MAIL_FROM_NAME', ''),
    ],

    'charset' => env('MAIL_CHARSET', 'utf-8')
];
