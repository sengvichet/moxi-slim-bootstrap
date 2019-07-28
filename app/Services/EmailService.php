<?php
/**
 * This file contains a mailing service based on PHPMailer.
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
use Classes\Email;

/**
 * This class is a mailing service.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class EmailService implements ServiceInterface
{

    /**
     * Service register name
     *
     * @return string
     */
    public function name()
    {
        return 'email';
    }

    /**
     * Register new service on dependency container
     *
     * @return Email
     */
    public function register()
    {
        return function ($container) {
            $email = new Email(
                $container->settings['email'],
                $container->get('logger')
            );

            unset($container);

            return $email;
        };
    }
}
