<?php
/**
 * This file contains common routes of the portal.
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

$app->get('/', 'App\Controllers\Common\HomeController:home');
$app->get('/oauth', 'App\Controllers\Common\OAuthController:index');

$app->get('/login', 'App\Controllers\Common\LoginController:index');
$app->post('/login', 'App\Controllers\Common\LoginController:login');
$app->get('/logout', 'App\Controllers\Common\LoginController:logout');

$app->get('/password/reset', 'App\Controllers\Common\PasswordController:index');
$app->post('/password/reset', 'App\Controllers\Common\PasswordController:reset');
$app->get('/password/token', 'App\Controllers\Common\PasswordController:token');
$app->get('/password/create', 'App\Controllers\Common\PasswordController:create');
$app->post('/password/store', 'App\Controllers\Common\PasswordController:store');
