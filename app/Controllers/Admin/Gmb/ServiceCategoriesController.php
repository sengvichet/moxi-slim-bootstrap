<?php
/**
 * This file contains admin's ServiceCategoriesController.
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
namespace App\Controllers\Admin\Gmb;

use App\Kernel\Slim\App;
use App\Kernel\ControllerAbstract;
use App\Models\Common\Gmb\GmbServiceCategoryModel;

/**
 * This controller contains actions for the Google My Business page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class ServiceCategoriesController extends ControllerAbstract
{
    /**
     * GMB API service
     *
     * @var \Classes\GmbApi
     */
    private $gmbService;

    /**
     * Handles 'store' request
     *
     * @return void
     */
    public function store()
    {
        $request  = $this->getRequest();
        $config   = $this->getService('config')->get();
        $routes   = $config['routes'];
        $messages = $config['messages']['admin_gmb'];

        /*if (!$request->isXhr()) {
            return $this->getResponse()->withRedirect($routes['admin-gmb'], 301);
        }

        if (!$request->isPost()) {
            return $this->getResponse()->withJson(
                [
                    'status'  => 'error',
                    'message' => str_replace(':instance', 'Service categories', $messages['failure'])
                ]
            );
        }*/

        $statuses = [];

        $this->gmbService = $this->getService('gmb_api');
        $this->dbService  = $this->getService('db');
        $this->logger     = $this->getService('logger');

        if (!$this->gmbService->hasAccessToken()) {
            return $this->getResponse()->withJson(
                ['status' => 'error', 'data' => ['url' => '/' . $routes['oauth']]]
            );
        }

        $categories = $this->gmbService->getServiceCategories();
        $categoryModel = new GmbServiceCategoryModel($this->dbService, $this->logger);
        foreach ($categories as $category) {
            $insertData = [
                'name'  => $category->categoryId,
                'title' => $category->displayName,
            ];
            $categoryModel->insertCategory($insertData);
        }
        if (array_sum($statuses)) {
            return $this->getResponse()->withJson(
                [
                    'status'  => 'success',
                    'message' => str_replace(':instance', 'Service categories', $messages['success'])
                ]
            );
        }
        return $this->getResponse()->withJson(
            [
                'status'  => 'error',
                'message' => str_replace(':instance', 'service categories', $messages['info'])
            ]
        );
    }
}
