<?php
/**
 * This file contains a service for sending email notifications on GMB events.
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
use Classes\GmbEmail;

/**
 * This class is a a service for sending email notifications on GMB events.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class GmbEmailService implements ServiceInterface
{

    /**
     * Service register name
     *
     * @return string
     */
    public function name()
    {
        return 'gmb_email';
    }

    /**
     * Register new service on dependency container
     *
     * @return GmbData
     */
    public function register()
    {
        return function ($container) {
            $gmb = new GmbEmail(
                $container->get('db'),
                $container->get('email'),
                $container->get('logger'),
                $container->get('config')->get()
            );

            unset($container);

            return $gmb;
        };
    }
}
