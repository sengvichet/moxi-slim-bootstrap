<?php
/**
 * Returns cards
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
return [
    'website' => [
        'order-create' => [
            'name'        => 'order-create',
            'link'        => '/order/create/start-order',
            'image'       => 'order.png',
            'color'       => 'purple',
            'title'       => 'Place an Order',
            'description' =>
                'Click the button above to place your order for online marketing.'
             . ' From there you can order an eStore and review your options.'
             . ' You can also include a local online SEO package and Ad-Words management.',
            'completed_order' => false,
        ],
        'products' => [
            'name'        => 'products',
            'link'        => '/products',
            'image'       => 'products.png',
            'color'       => 'blue',
            'title'       => 'Select Products for Your Website',
            'description' =>
                'Now that you have decided to utilize the managed inventory'
                . ' package for your eStore, you can use the button above'
                . ' to make your inventory selections.',
        ],
        'margins' => [
            'name'        => 'margins',
            'link'        => '/margins',
            'image'       => 'pricing.png',
            'color'       => 'green',
            'title'       => 'Select Margins for Your Website',
            'description' =>
                'Now that you have selected inventory for your eStore,'
                . ' you can use the button above to enter price margins.',
        ],
        'order-update' => [
            'name'        => 'order-update',
            'link'        => '/order/update/welcome',
            'image'       => 'status.png',
            'color'       => 'red',
            'title'       => 'Update Order Details',
            'description' =>
                'You may receive an email requiring additional information.'
                . ' Please use the button above to update your order information.',
            'completed_order' => true,
        ],
    ],
];
