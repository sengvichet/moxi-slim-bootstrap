<?php
/**
 * This file contains routes of the backend ofdealers' portal.
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

$app->get('/admin', 'App\Controllers\Admin\HomeController:index');

$app->get('/admin/dealers', 'App\Controllers\Admin\DealersController:index');
$app->post('/admin/dealers', 'App\Controllers\Admin\DealersController:store');
$app->post('/admin/dealers/update', 'App\Controllers\Admin\DealersController:update');
$app->delete('/admin/dealers/{id}', 'App\Controllers\Admin\DealersController:delete');

$app->post('/admin/dealers/{dealer}/company', 'App\Controllers\Admin\CompaniesController:store');

$app->get('/admin/social-media', 'App\Controllers\Admin\SocialMediaController:index');
$app->post('/admin/social-media', 'App\Controllers\Admin\SocialMediaController:store');

$app->get('/admin/paid-ads', 'App\Controllers\Admin\PaidAdsController:index');
$app->post('/admin/paid-ads', 'App\Controllers\Admin\PaidAdsController:store');

$app->get('/admin/listing-leader', 'App\Controllers\Admin\ListingLeaderController:index');
$app->post('/admin/listing-leader', 'App\Controllers\Admin\ListingLeaderController:store');

$app->get('/admin/billing', 'App\Controllers\Admin\BillingController:index');
$app->post('/admin/billing', 'App\Controllers\Admin\BillingController:store');

$app->get('/admin/services', 'App\Controllers\Admin\ServicesController:index');
$app->post('/admin/services', 'App\Controllers\Admin\ServicesController:store');
$app->post('/admin/services/update', 'App\Controllers\Admin\ServicesController:update');

$app->get('/admin/gmb/posts', 'App\Controllers\Admin\GmbPostsController:index');
$app->delete('/admin/gmb/posts/{id}', 'App\Controllers\Admin\GmbPostsController:delete');

$app->get('/admin/gmb/reviews', 'App\Controllers\Admin\GmbReviewsController:index');
$app->delete('/admin/gmb/reviews/{id}', 'App\Controllers\Admin\GmbReviewsController:delete');

$app->get('/admin/gmb/locations', 'App\Controllers\Admin\GmbLocationsController:index');
$app->post('/admin/gmb/locations/update', 'App\Controllers\Admin\GmbLocationsController:update');

$app->get('/admin/gmb', 'App\Controllers\Admin\Gmb\GmbController:index');
$app->post('/admin/gmb/locations', 'App\Controllers\Admin\Gmb\LocationsController:store');
$app->post('/admin/gmb/insights', 'App\Controllers\Admin\Gmb\InsightsController:store');
$app->post('/admin/gmb/reviews', 'App\Controllers\Admin\Gmb\ReviewsController:store');
$app->post('/admin/gmb/replies', 'App\Controllers\Admin\Gmb\ReviewsReplyController:update');
$app->post('/admin/gmb/posts', 'App\Controllers\Admin\Gmb\PostsController:store');
$app->post('/admin/gmb/business', 'App\Controllers\Admin\Gmb\BusinessController:update');
$app->post('/admin/gmb/information', 'App\Controllers\Admin\Gmb\InformationController:store');
$app->post('/admin/gmb/posts/new', 'App\Controllers\Admin\Gmb\PostsController:create');

$app->get('/admin/gmb/service-categories', 'App\Controllers\Admin\Gmb\ServiceCategoriesController:store');
