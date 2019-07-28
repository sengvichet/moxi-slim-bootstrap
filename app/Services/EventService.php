<?php
/**
 * This file contains an event dispatcher service.
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
namespace App\Services;

use App\Kernel\ServiceInterface;
use Slim\Event\SlimEventManager;

/**
 * This class is an event dispatcher service.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class EventService implements ServiceInterface
{

    /**
     * Service register name
     *
     * @return string
     */
    public function name()
    {
        return 'event';
    }

    /**
     * Register new service on dependency container
     *
     * @return Email
     */
    public function register()
    {
        return function ($container) {
            $event = new SlimEventManager($container->settings['events']);

            unset($container);

            return $event;
        };
    }
}
