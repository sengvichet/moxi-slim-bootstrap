<?php
/**
 * Returns routes constants
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
    'home'                  => '',
    'login'                 => 'login',
    'dashboard'             => 'dashboard',
    'social-marketing'      => 'social-media',
    'services'              => 'services',
    'sem'                   => 'paid-advertising',
    'local'                 => 'local-listings',

    'company-profile'       => 'company-profile',
    'contact-information'   => 'company-profile/contact-information',
    'website-information'   => 'company-profile/website-information',
    'essential-information' => 'company-profile/essential-information',
    'social-media'          => 'company-profile/social-media',
    'company-photos'        => 'company-profile/company-photos',

    'contact-information-ajax'   => 'company-profile/contact-information/ajax',
    'website-information-ajax'   => 'company-profile/website-information/ajax',
    'essential-information-ajax' => 'company-profile/essential-information/ajax',
    'social-media-ajax'          => 'company-profile/social-media/ajax',

    'website'               => 'website',

    'order-start'                => 'website/order/create/start-order',
    'order-website-package'      => 'website/order/create/website-package',
    'order-number-of-products'   => 'website/order/create/number-of-products',
    'order-spec-sheets'          => 'website/order/create/spec-sheets',
    'order-shopping-cart'        => 'website/order/create/shopping-cart',
    'order-pricing'              => 'website/order/create/pricing',
    'order-business-information' => 'website/order/create/business-information',
    'order-estimated-cost'       => 'website/order/create/estimated-cost',
    'order-end'                  => 'website/order/create/end-order',
    'order-home-page'            => 'website/order/create/home-page',
    'order-design'               => 'website/order/create/design',
    'order-website-information'  => 'website/order/create/website-information',
    'order-logo'                 => 'website/order/create/logo',
    'order-website-pages'        => 'website/order/create/website-pages',
    'order-special-features'     => 'website/order/create/special-features',
    'order-welcome'              => 'website/order/create/welcome',

    'order-update-welcome'          => 'website/order/update/welcome',
    'order-update-website-package'  => 'website/order/update/website-package',
    'order-update-home-page'        => 'website/order/update/home-page',
    'order-update-website-pages'    => 'website/order/update/website-pages',
    'order-update-special-features' => 'website/order/update/special-features',
    'order-update-estimated-cost'   => 'website/order/update/estimated-cost',

    'order-email'           => 'website/order/email',

    'password-reset'  => 'password/reset',
    'token-reset'     => 'password/token',
    'password-create' => 'password/create',
    'password-store'  => 'password/store',

    'oauth' => 'oauth',

    'google-my-business' => 'google-my-business',

    'google-my-business-refresh' => 'google-my-business/refresh',
    'google-my-business-reviews' => 'google-my-business/reviews',
    'google-my-business-posts'   => 'google-my-business/posts',

    'google-my-business-reviews-reply' =>
        'google-my-business/reviews/:review/reply',
    'google-my-business-reviews-reply-save' =>
        'google-my-business/reviews/:review/reply/save',
    'google-my-business-reviews-reply-edit' =>
        'google-my-business/reviews/:review/reply/edit',
    'google-my-business-reviews-reply-delete' =>
        'google-my-business/reviews/:review/reply/delete',

    'admin' => 'admin',

    'admin-dealers'        => 'admin/dealers',
    'admin-dealers-update' => 'admin/dealers/update',

    'admin-company-create' => 'admin/dealers/:dealer/company',

    'admin-social-media'   => 'admin/social-media',
    'admin-services'       => 'admin/services',
    'admin-services-update'=> 'admin/services/update',
    'admin-paid-ads'       => 'admin/paid-ads',
    'admin-listing-leader' => 'admin/listing-leader',
    'admin-billing'        => 'admin/billing',

    'admin-gmb'           => 'admin/gmb',
    'admin-gmb-locations' => 'admin/gmb/locations',
    'admin-gmb-insights'  => 'admin/gmb/insights',
    'admin-gmb-reviews'   => 'admin/gmb/reviews',
    'admin-gmb-replies'   => 'admin/gmb/replies',
    'admin-gmb-posts'     => 'admin/gmb/posts',
    'admin-gmb-new-posts' => 'admin/gmb/posts/new',
    'admin-gmb-business'  => 'admin/gmb/business',
    'admin-gmb-information' => 'admin/gmb/information',

    'admin-gmb-locations-update' => 'admin/gmb/locations/update',
];
