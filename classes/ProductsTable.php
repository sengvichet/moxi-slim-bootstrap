<?php
/**
 * This file contains a class for rendering products table.
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
namespace Classes;

/**
 *  Class for rendering products table
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class ProductsTable
{
    /**
     * Counts total products of one vendor.
     *
     * @param array $vendor vendor's categories with products number
     *
     * @return int
     */
    public function getTotalVendorProducts(array $vendor)
    {
        $total = 0;
        $products = $vendor;
        try {
            if (array_key_exists(ALL_PRODUCTS, $products)) {
                unset($products[ALL_PRODUCTS]);
            }
            $numbers = array_values($products);
            $total = array_sum($numbers);
        } catch (\Exception $e) {
            return $total;
        }
        return $total;
    }

    /**
     * Counts total number of selected products.
     *
     * @param array $selectedProducts array of selected products
     *
     * @return int
     */
    public function getTotalSelectedProducts(array $selectedProducts = [])
    {
        $total = 0;
        foreach ($selectedProducts as $categories) {
            if (in_array(ALL_PRODUCTS, array_keys($categories))) {
                unset($categories[ALL_PRODUCTS]);
            }
            $total += array_sum($categories);
        }
        return $total;
    }

    /**
     * Counts total number of selected vendors.
     *
     * @param array $selectedProducts array of selected products
     *
     * @return int
     */
    public function getTotalSelectedVendors(array $selectedProducts = [])
    {
        $total = count($selectedProducts);
        return $total;
    }

    /**
     * Returns a string with an HTML table with vendors and categories.
     *
     * @param array $vendors      vendors data
     * @param array $selected     selected categories
     * @param bool  $withProducts render hidden products rows
     *
     * @return string
     */
    public function getProductsTable(array $vendors, array $selected, $withProducts = false)
    {
        if (!$vendors) {
            return '';
        }

        $selectButton = $this->getSelectButton();
        $selectedButton = $this->getSelectedButton();
        $expandButton = $this->getExpandButton();

        $selectedVendorIds = array_keys($selected);
        $rows = '';

        foreach ($vendors as $vendor => $categories) {

            $button = $selectButton;
            $selectedNumber = '';

            $vendorId = $vendor;

            if (in_array($vendorId, $selectedVendorIds)) {
                $categoriesIds = array_keys($categories);
                $selectedCategoriesIds = array_keys($selected[$vendorId]);
                $selectedVendorCategoriesIds = array_intersect($selectedCategoriesIds, $categoriesIds);
        
                if ($selectedVendorCategoriesIds) {
                    $button = $selectedButton;
                    $selectedNumber = $this->getTotalSelectedCategories($categories, $selectedVendorCategoriesIds);
                }
            }

            $rows .= '<tr vendor="' . $vendor . '">'
                 . '<td>' . $button  . '</td>'
                 . '<td>' . $expandButton . ' ' . $vendor . '</td>'
                 . '<td>' . $this->getTotalVendorProducts($categories) . '</td>'
                 . '<td>' . $selectedNumber . '</td></tr>';
            if ($withProducts) {
                $rows .= $this->renderVendorCategories($vendor, $categories, $selected[$vendorId]);
            }
        }

        return $rows;
    }

    /**
     * Obtains vendor ID from vendor categories array.
     * 
     * @param array $vendorCategories vendor categories array
     *
     * @return int
     */
    private function getVendorId(array $vendorCategories)
    {
        $firstCategory = array_shift($vendorCategories);
        return (int) $firstCategory['mid'];
    }

    /**
     * Calculates total for each selected category.
     * 
     * @param array $categories  all categories
     * @param array $selectedIds ids of selected categories 
     * 
     * @return int
     */
    private function getTotalSelectedCategories(array $categories, array $selectedIds)
    {
        $total = 0;
        foreach ($selectedIds as $selectedId) {
            if ($selectedId === ALL_PRODUCTS) {
                continue;
            }
            foreach ($categories as $category => $number) {
                if ($category === $selectedId) {
                    $total += $number;
                }
            }
        }
        return $total;
    }

    /**
     * Returns a string with categories rows.
     *
     * @param string $vendor     vendor
     * @param array  $categories categories
     * @param array  $selected   selected categories
     *
     * @return string
     */
    private function getVendorCategories($vendor, array $categories, array $selected = null)
    {
        $selectButton = $this->getSelectButton();
        $selectedButton = $this->getSelectedButton();
        if ($selected) {
            $selectedIds = array_keys($selected);
        }

        $rows = '';
        foreach ($categories as $category => $products) {
            if ($category === ALL_PRODUCTS) {
                continue;
            }

            $button = $selectButton;
            $selectedNumber = '';

            if ($selected) {
                $selectedId = $category;

                if (in_array($selectedId, $selectedIds)) {
                    $button = $selectedButton;
                    $selectedNumber = $selected[$category];
                }
            }
            
            $rows .= '<tr style="display: none;"'
                . ' cvendor="' . $vendor . '"'
                . ' category="' . $category . '">'
                . '<td>' . $button . '</td>'
                . '<td style="padding-left: 50px;">' . $category . '</td>'
                . '<td>' . $products . '</td>'
                . '<td>' . $selectedNumber .'</td></tr>';
        }
        return $rows;
    }

    /**
     * Returns HTML code of 'select' button.
     * 
     * @return string
     */
    private function getSelectButton()
    {
        return '<button class="btn btn-default selectbtn">'
            . '<span class="glyphicon glyphicon-minus" aria-hidden="true">'
            . '</span></button>';
    }

    /**
     * Returns HTML code of 'selected' button.
     * 
     * @return string
     */
    private function getSelectedButton()
    {
        return '<button class="btn btn-default selectbtn">'
            . '<span class="glyphicon glyphicon-ok" aria-hidden="true">'
            . '</span></button>';
    }

    /**
     * Returns HTML code of 'expand' button.
     * 
     * @return string
     */
    private function getExpandButton()
    {
        return '<button class="btn btn-default expandbtn">'
            . '<span class="glyphicon glyphicon-plus" aria-hidden="true">'
            . '</span></button>';
    }
}
