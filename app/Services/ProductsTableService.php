<?php
namespace App\Services;

use App\Kernel\ServiceInterface;
use Classes\ProductsTable;

class ProductsTableService implements ServiceInterface
{

    /**
     * Service register name
     */
    public function name()
    {
        return 'products_table';
    }

    /**
     * Register new service on dependency container
     */
    public function register()
    {
        return function () {
            $table = new ProductsTable;

            return $table;
        };
    }
}
