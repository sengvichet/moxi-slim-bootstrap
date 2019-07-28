<?php
/**
 * This file contains routes of the dealers' portal.
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

$app->get('/dashboard', 'App\Controllers\Dealers\DashboardController:index');
$app->get('/company-profile', 'App\Controllers\Dealers\CompanyProfile\CompanyProfileController:index');
$app->get('/social-media', 'App\Controllers\Dealers\SocialMediaController:index');
$app->get('/paid-advertising', 'App\Controllers\Dealers\PaidAdsController:index');
$app->get('/local-listings', 'App\Controllers\Dealers\ListingLeaderController:index');
$app->get('/services', 'App\Controllers\Dealers\ServicesController:index');
$app->post('/services', 'App\Controllers\Dealers\ServicesController:store');
$app->get('/website', 'App\Controllers\Dealers\Website\WebsiteController:index');

/* Create Order controllers */
$app->get(
    '/website/order/create/start-order',
    'App\Controllers\Dealers\Website\Order\Create\StartOrderController:index'
);
$app->post(
    '/website/order/create/start-order',
    'App\Controllers\Dealers\Website\Order\Create\StartOrderController:store'
);
$app->get(
    '/website/order/create/website-package',
    'App\Controllers\Dealers\Website\Order\Create\WebsitePackageController:index'
);
$app->post(
    '/website/order/create/website-package',
    'App\Controllers\Dealers\Website\Order\Create\WebsitePackageController:store'
);
$app->get(
    '/website/order/create/home-page',
    'App\Controllers\Dealers\Website\Order\Create\HomePageController:index'
);
$app->post(
    '/website/order/create/home-page',
    'App\Controllers\Dealers\Website\Order\Create\HomePageController:store'
);
$app->get(
    '/website/order/create/website-pages',
    'App\Controllers\Dealers\Website\Order\Create\WebsitePagesController:index'
);
$app->post(
    '/website/order/create/website-pages',
    'App\Controllers\Dealers\Website\Order\Create\WebsitePagesController:store'
);
$app->get(
    '/website/order/create/special-features',
    'App\Controllers\Dealers\Website\Order\Create\SpecialFeaturesController:index'
);
$app->post(
    '/website/order/create/special-features',
    'App\Controllers\Dealers\Website\Order\Create\SpecialFeaturesController:store'
);
$app->get(
    '/website/order/create/estimated-cost',
    'App\Controllers\Dealers\Website\Order\Create\EstimatedCostController:index'
);
$app->post(
    '/website/order/create/estimated-cost',
    'App\Controllers\Dealers\Website\Order\Create\EstimatedCostController:store'
);
$app->get(
    '/website/order/create/welcome',
    'App\Controllers\Dealers\Website\Order\Create\WelcomeController:index'
);
$app->get(
    '/website/order/update/welcome',
    'App\Controllers\Dealers\Website\Order\Update\WelcomeController:index'
);

/* Update Order controllers */
$app->get(
    '/website/order/update/website-package',
    'App\Controllers\Dealers\Website\Order\Update\WebsitePackageController:index'
);
$app->post(
    '/website/order/update/website-package',
    'App\Controllers\Dealers\Website\Order\Update\WebsitePackageController:store'
);
$app->get(
    '/website/order/update/home-page',
    'App\Controllers\Dealers\Website\Order\Update\HomePageController:index'
);
$app->post(
    '/website/order/update/home-page',
    'App\Controllers\Dealers\Website\Order\Update\HomePageController:store'
);
$app->get(
    '/website/order/update/website-pages',
    'App\Controllers\Dealers\Website\Order\Update\WebsitePagesController:index'
);
$app->post(
    '/website/order/update/website-pages',
    'App\Controllers\Dealers\Website\Order\Update\WebsitePagesController:store'
);
$app->get(
    '/website/order/update/special-features',
    'App\Controllers\Dealers\Website\Order\Update\SpecialFeaturesController:index'
);
$app->post(
    '/website/order/update/special-features',
    'App\Controllers\Dealers\Website\Order\Update\SpecialFeaturesController:store'
);
$app->get(
    '/website/order/update/estimated-cost',
    'App\Controllers\Dealers\Website\Order\Update\EstimatedCostController:index'
);
$app->post(
    '/website/order/update/estimated-cost',
    'App\Controllers\Dealers\Website\Order\Update\EstimatedCostController:store'
);

$app->get('/website/products', 'App\Controllers\Dealers\Website\ProductsController:index');
$app->get('/website/margins', 'App\Controllers\Dealers\Website\MarginsController:index');

$app->post(
    '/company-profile/contact-information',
    'App\Controllers\Dealers\CompanyProfile\ContactInformationController:store'
);
$app->post(
    '/company-profile/contact-information/ajax',
    'App\Controllers\Dealers\CompanyProfile\ContactInformationController:storeAjax'
);
$app->post(
    '/company-profile/contact-information/gmb',
    'App\Controllers\Dealers\CompanyProfile\ContactInformationController:updateGmb'
);
$app->post(
    '/company-profile/essential-information',
    'App\Controllers\Dealers\CompanyProfile\EssentialInformationController:store'
);
$app->post(
    '/company-profile/essential-information/ajax',
    'App\Controllers\Dealers\CompanyProfile\EssentialInformationController:storeAjax'
);
$app->post(
    '/company-profile/essential-information/gmb',
    'App\Controllers\Dealers\CompanyProfile\EssentialInformationController:updateGmb'
);
$app->post(
    '/company-profile/social-media',
    'App\Controllers\Dealers\CompanyProfile\SocialMediaController:store'
);
$app->post(
    '/company-profile/social-media/ajax',
    'App\Controllers\Dealers\CompanyProfile\SocialMediaController:storeAjax'
);
$app->post(
    '/company-profile/company-photos',
    'App\Controllers\Dealers\CompanyProfile\CompanyPhotosController:store'
);
$app->delete(
    '/company-profile/company-photos/{id}',
    'App\Controllers\Dealers\CompanyProfile\CompanyPhotosController:delete'
);
$app->post(
    '/company-profile/website-information',
    'App\Controllers\Dealers\CompanyProfile\WebsiteInformationController:store'
);
$app->post(
    '/company-profile/website-information/ajax',
    'App\Controllers\Dealers\CompanyProfile\WebsiteInformationController:storeAjax'
);

/*$app->get(
    '/website/order/create/number-of-products',
    'App\Controllers\Dealers\Website\Order\Create\WebsitePackage\ProductsNumberController:index'
);
$app->get(
    '/website/order/create/spec-sheets',
    'App\Controllers\Dealers\Website\Order\Create\WebsitePackage\SpecSheetsController:index'
);
$app->get(
    '/website/order/create/shopping-cart',
    'App\Controllers\Dealers\Website\Order\Create\WebsitePackage\ShoppingCartController:index'
);
$app->get(
    '/website/order/create/pricing',
    'App\Controllers\Dealers\Website\Order\Create\WebsitePackage\PricingController:index'
);
$app->get(
    '/website/order/create/end-order',
    'App\Controllers\Dealers\Website\Order\Create\WebsitePackage\EndOrderController:index'
);
$app->get(
    '/website/order/create/business-information',
    'App\Controllers\Dealers\Website\Order\Create\BusinessInformationController:index'
);
$app->get(
    '/website/order/create/design',
    'App\Controllers\Dealers\Website\Order\Create\Design\DesignController:index'
);
$app->get(
    '/website/order/create/website-information',
    'App\Controllers\Dealers\Website\Order\Create\Design\WebsiteInformationController:index'
);
$app->get(
    '/website/order/create/logo',
    'App\Controllers\Dealers\Website\Order\Create\Design\LogoController:index'
);
$app->post(
    '/website/order/create/number-of-products',
    'App\Controllers\Dealers\Website\Order\Create\WebsitePackage\ProductsNumberController:store'
);
$app->post(
    '/website/order/create/spec-sheets',
    'App\Controllers\Dealers\Website\Order\Create\WebsitePackage\SpecSheetsController:store'
);
$app->post(
    '/website/order/create/shopping-cart',
    'App\Controllers\Dealers\Website\Order\Create\WebsitePackage\ShoppingCartController:store'
);
$app->post(
    '/website/order/create/pricing',
    'App\Controllers\Dealers\Website\Order\Create\WebsitePackage\PricingController:store'
);
$app->post(
    '/website/order/create/end-order',
    'App\Controllers\Dealers\Website\Order\Create\WebsitePackage\EndOrderController:store'
);
$app->post(
    '/website/order/create/business-information',
    'App\Controllers\Dealers\Website\Order\Create\BusinessInformationController:store'
);
$app->post(
    '/website/order/create/design',
    'App\Controllers\Dealers\Website\Order\Create\Design\DesignController:store'
);
$app->post(
    '/website/order/create/website-information',
    'App\Controllers\Dealers\Website\Order\Create\Design\WebsiteInformationController:store'
);
$app->post(
    '/website/order/create/logo',
    'App\Controllers\Dealers\Website\Order\Create\Design\LogoController:store'
);
$app->post('/website/order/create', 'App\Controllers\Dealers\Website\Order\StoreOrderController:store');
$app->post('/website/order/email', 'App\Controllers\Dealers\Website\Order\EmailOrderController:email');
$app->get('/order-status', 'App\Controllers\Dealers\OrderStatusController:index');*/

$app->get('/google-my-business', 'App\Controllers\Dealers\Gmb\GmbController:index');
$app->post('/google-my-business/refresh', 'App\Controllers\Dealers\Gmb\GmbController:refresh');
$app->get('/google-my-business/reviews', 'App\Controllers\Dealers\Gmb\GmbReviewsController:index');
$app->get('/google-my-business/reviews/{review}/reply', 'App\Controllers\Dealers\Gmb\GmbReviewsReplyController:index');
$app->post(
    '/google-my-business/reviews/{review}/reply/save',
    'App\Controllers\Dealers\Gmb\GmbReviewsReplyController:store'
);
$app->post(
    '/google-my-business/reviews/{review}/reply/edit',
    'App\Controllers\Dealers\Gmb\GmbReviewsReplyController:store'
);
$app->post(
    '/google-my-business/reviews/{review}/reply/delete',
    'App\Controllers\Dealers\Gmb\GmbReviewsReplyController:delete'
);
$app->get(
    '/google-my-business/posts',
    'App\Controllers\Dealers\Gmb\GmbPostsController:index'
);
$app->post(
    '/google-my-business/posts',
    'App\Controllers\Dealers\Gmb\GmbPostsController:store'
);
