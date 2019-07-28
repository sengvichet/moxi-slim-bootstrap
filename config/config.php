<?php
/**
 * Returns config settings
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
    'routes'   => include __DIR__ . '/constants/routes.php',
    'route_groups' => include __DIR__ . '/constants/route_groups.php',
    'errors'   => include __DIR__ . '/constants/errors.php',
    'messages' => include __DIR__ . '/constants/messages.php',
    'fields'   => include __DIR__ . '/constants/fields.php',
    'guards'   => include __DIR__ . '/constants/guards/guards.php',
    'menu'     => include __DIR__ . '/constants/menu.php',
    'tabs'     => include __DIR__ . '/constants/tabs.php',
    'breadcrumbs' => include __DIR__ . '/constants/breadcrumbs.php',
    'cards'    => include __DIR__ . '/constants/cards.php',
    'email'    => include __DIR__ . '/constants/email.php',
    'paths'    => include __DIR__ . '/constants/paths.php',
    'misc'     => include __DIR__ . '/constants/misc.php',
    'app'      => include __DIR__ . '/environment/app.php',
];
