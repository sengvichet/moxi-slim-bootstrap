<?php
/**
 * This file contains a service for sending email notifications on order events.
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
use Classes\OrderEmail;

/**
 * This class is a a service for sending email notifications on order events.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class OrderEmailService implements ServiceInterface
{

    /**
     * Service register name
     *
     * @return string
     */
    public function name()
    {
        return 'order_email';
    }

    /**
     * Register new service on dependency container
     *
     * @return GmbData
     */
    public function register()
    {
        return function ($container) {
            $order = new OrderEmail(
                $container->get('db'),
                $container->get('email'),
                $container->get('logger'),
                $container->get('config')->get()
            );

            unset($container);

            return $order;
        };
    }
}
