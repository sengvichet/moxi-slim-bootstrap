<?php
/**
 * Returns array of event listeners
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
    'gmb.post' => [
        [\App\EventListeners\Gmb\NewPostListener::class],
    ],
    'gmb.reply' => [
        [\App\EventListeners\Gmb\ReplyListener::class],
    ],
    'gmb.location' => [
        [\App\EventListeners\Gmb\LocationUpdateListener::class],
    ],
    'order.create' => [
        [\App\EventListeners\Order\CreateOrderListener::class],
    ],
    'order.update' => [
        [\App\EventListeners\Order\UpdateOrderListener::class],
    ],
];
