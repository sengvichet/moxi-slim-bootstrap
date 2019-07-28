<?php
/**
 * Returns menu items
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
    'dealer' => [
        'dashboard' => [
            'name' => 'dashboard',
            'link' => '/dashboard',
            'title' => 'Dashboard',
        ],
        'company' => [
            'name' => 'company-profile',
            'link' => '/company-profile',
            'title' => 'Company Profile',
        ],
        'website' => [
            'name' => 'website',
            'link' => '/website',
            'title' => 'My Website',
        ],
        'gmb' => [
            'name' => 'google-my-business',
            'link' => '/google-my-business',
            'title' => 'Google My Business'
        ],
        'local' => [
            'name' => 'local-listings',
            'link' => '/local-listings',
            'title' => 'Listing Leader',
        ],
        'social' => [
            'name' => 'social-media',
            'link' => '/social-media',
            'title' => 'Social Marketing',
        ],
        'sem' => [
            'name' => 'paid-advertising',
            'link' => '/paid-advertising',
            'title' => 'Paid Advertising'
        ],
        'services' => [
            'name' => 'services',
            'link' => '/services',
            'title' => 'Services + Billing',
        ],
    ],
    'mmuser' => [
        'dashboard' => [
            'name' => 'dashboard',
            'link' => '/dashboard',
            'title' => 'Dashboard',
        ],
        'company' => [
            'name' => 'company-profile',
            'link' => '/company-profile',
            'title' => 'Company Profile',
        ],
        'gmb' => [
            'name' => 'google-my-business',
            'link' => '/google-my-business',
            'title' => 'Google My Business'
        ],
        'local' => [
            'name' => 'local-listings',
            'link' => '/local-listings',
            'title' => 'Listing Leader',
        ],
        'social' => [
            'name' => 'social-media',
            'link' => '/social-media',
            'title' => 'Social Marketing',
        ],
        'sem' => [
            'name' => 'paid-advertising',
            'link' => '/paid-advertising',
            'title' => 'Paid Advertising'
        ],
        'services' => [
            'name' => 'services',
            'link' => '/services',
            'title' => 'Services + Billing',
        ],
    ],
    'admin'  => [
        'dealers' => [
            'name'  => 'dealers',
            'link'  => '/admin/dealers',
            'title' => 'Dealers',
            'color' => 'primary',
            'description' => 'Here you can add dealers and assign GMB locations.',
        ],
        'gmb' => [
            'name'  => 'gmb',
            'link'  => '/admin/gmb',
            'title' => 'Google My Business',
            'color' => 'success',
            'description' => 'Here you can manage GMB data: locations, insights, reviews, posts.',
        ],
        'social-media' => [
            'name'  => 'social-media',
            'link'  => '/admin/social-media',
            'title' => 'Social Marketing',
            'color' => 'info',
            'description' => 'Here you can add social media data for dealers.',
        ],
        'paid-ads' => [
            'name' => 'paid-ads',
            'link' => '/admin/paid-ads',
            'title' => 'Paid Ads',
            'color' => 'primary',
            'description' => 'Here you can add paid ads data for dealers.',
        ],
        'listing-leader' => [
            'name' => 'listing-leader',
            'link' => '/admin/listing-leader',
            'title' => 'Listing Leader',
            'color' => 'info',
            'description' => 'Here you can add listing data for dealers.',
        ],
        'billing' => [
            'name' => 'billing',
            'link' => '/admin/billing',
            'title' => 'Billing',
            'color' => 'success',
            'description' => 'Here you can manage dealers\' billing data.',
        ],
        'services' => [
            'name' => 'services',
            'link' => '/admin/services',
            'title' => 'Services',
            'color' => 'warning',
            'description' => 'Here you can manage dealers\' subscriptions.',
        ],
    ],
];
