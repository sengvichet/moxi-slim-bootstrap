<?php
/**
 * Returns pages guards
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
    'auth' => include __DIR__ . '/auth/auth.php',
    'guest' => [
        'login'          => 'login',
        'password-reset' => 'password/reset',
        'password-token' => 'password/token',
    ],
    'password' => [
        'password-create' => 'password/create',
        'password-store'  => 'password/store',
    ],
    'oauth' => [
        //'google-my-business' => 'google-my-business',
        // 'admin-gmb'          => 'admin/gmb'
    ],
];
