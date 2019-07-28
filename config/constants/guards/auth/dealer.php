<?php
/**
 * Returns pages guards
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
    'dashboard'             => 'dashboard',
    'social-marketing'      => 'social-media',
    'paid-advertising'      => 'paid-advertising',
    'local-listings'        => 'local-listings',
    'services'              => 'services',

    'company-profile'       => 'company-profile',
    'contact-information'   => 'company-profile/contact-information',
    'essential-information' => 'company-profile/essential-information',
    'social-media'          => 'company-profile/social-media',
    'company-photos'        => 'company-profile/company-photos',

    'website'               => 'website',

    'order-start'                 => 'website/order/create/start-order',
    'order-website-package'       => 'website/order/create/website-package',
    'order-number-of-products'    => 'website/order/create/number-of-products',
    'order-spec-sheets'           => 'website/order/create/spec-sheets',
    'order-shopping-cart'         => 'website/order/create/shopping-cart',
    'order-pricing'               => 'website/order/create/pricing',
    'order-business-information'  => 'website/order/create/business-information',
    'order-end'                   => 'website/order/create/end-order',
    'order-design'                => 'website/order/create/design',
    'order-website-information'   => 'website/order/create/website-information',
    'order-logo'                  => 'website/order/create/logo',
    'order-home-page'             => 'website/order/create/home-page',
    'order-website-pages'         => 'website/order/create/website-pages',
    'order-special-features'      => 'website/order/create/special-features',
    'order-estimated-cost'        => 'website/order/create/estimated-cost',
    'order-welcome'               => 'website/order/create/welcome',

    'order-update-website-package'  => 'website/order/update/website-package',
    'order-update-home-page'        => 'website/order/update/home-page',
    'order-update-website-pages'    => 'website/order/update/website-pages',
    'order-update-special-features' => 'website/order/update/special-features',
    'order-update-estimated-cost'   => 'website/order/update/estimated-cost',

    'order-products'              => 'website/products',
    'order-status'                => 'order-status',

    'google-my-business'          => 'google-my-business',
    'google-my-business-reviews'  => 'google-my-business/reviews',
    'google-my-business-refresh'  => 'google-my-business/refresh',
    'google-my-business-reviews-reply'        =>
        'google-my-business/reviews/:review/reply',
    'google-my-business-reviews-reply-save'   =>
        'google-my-business/reviews/:review/reply/save',
    'google-my-business-reviews-reply-edit'   =>
        'google-my-business/reviews/:review/reply/edit',
    'google-my-business-reviews-reply-delete' =>
        'google-my-business/reviews/:review/reply/delete',
];
