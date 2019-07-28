<?php
/**
 * This file contains portal's ProductsController.
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
namespace App\Controllers\Dealers\Website;

use App\Kernel\Slim\App;
use App\Controllers\Dealers\DealersController;

/**
 * This controller contains actions for the Website - Select Products page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class ProductsController extends DealersController
{
    /**
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $menu = $this->getMenuItems();
        $route = $this->getCurrentRoute();

        $user = $this->getService('session')->user;
        $company = $this->getCompany($user['id']);

        $products = $this->getProducts();
        $selectedProducts = $this->getSelectedProducts($user['id']);

        $productsTableService = $this->getService('products_table');

        $totals = [
            'products' => $productsTableService->getTotalSelectedProducts($selectedProducts),
            'vendors'  => $productsTableService->getTotalSelectedVendors($selectedProducts),
        ];

        $table = $productsTableService->getProductsTable($products, $selectedProducts);
        
        $data = compact('menu', 'route', 'user', 'company', 'totals', 'table');

        return $this->render('Dealers/website/products.twig', $data);
    }

    /**
     * Fetches all vendors and products from DB.
     *
     * @return array
     */
    private function getProducts()
    {
        $products = [];
        return $products;
    }

    /**
     * Fetches selected vendors and products from DB.
     *
     * @param int $userId user ID
     *
     * @return array
     */
    private function getSelectedProducts(int $userId)
    {
        $selectedProducts = [];
        return $selectedProducts;
    }
}
