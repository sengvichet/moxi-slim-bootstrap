<?php
/**
 * This file contains a service for work with GMB API.
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
use Classes\GmbApi;

/**
 * This class is a mailing service.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class GmbApiService implements ServiceInterface
{

    /**
     * Service register name
     *
     * @return string
     */
    public function name()
    {
        return 'gmb_api';
    }

    /**
     * Register new service on dependency container
     *
     * @return GmbApi
     */
    public function register()
    {
        return function ($container) {
            $gmb = new GmbApi(
                $container->settings['gmb'],
                $container->get('session'),
                $container->response,
                $container->get('logger')
            );

            unset($container);

            return $gmb;
        };
    }
}
