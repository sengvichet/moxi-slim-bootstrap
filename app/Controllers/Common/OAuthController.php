<?php
/**
 * This file contains OAuthController.
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
namespace App\Controllers\Common;

use App\Kernel\Slim\App;
use App\Kernel\ControllerAbstract;

/**
 * This controller contains actions for Google OAuth.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class OAuthController extends ControllerAbstract
{
    public function index()
    {
        $request = $this->getRequest();
        $data = $request->getParams();
        $response = $this->getResponse();

        $gmbService = $this->getService('gmb_api');
        return (empty($data['code']))
            ? $gmbService->authorize($response)
            : $gmbService->setAccessToken($data['code'], $response);
    }
}
