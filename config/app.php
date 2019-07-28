<?php
/**
 * Returns app settings
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
    'displayErrorDetails'               => env('APP_DEBUG', false),
    'determineRouteBeforeAppMiddleware' => false,
    'routerCacheFile'                   => env('APP_ROUTES_CACHE', storage_path() . '/cache/routes.php'),
    'middlewares'                       => include 'middlewares.php',
    'services'                          => include 'services.php',
    'logger'                            => include 'logger.php',
    'twig'                              => include 'twig.php',
    'db'                                => include 'db.php',
    'config'                            => include 'config.php',
    'email'                             => include 'email.php',
    'gmb'                               => include 'gmb.php',
    'events'                            => include 'events.php',
];
