<?php
/**
 * Returns tabs
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
    'company-profile' => [
        'contact-information' => [
            'name' => 'contact-information',
            'link' => '#contact-information',
            'title' => 'Business Information',
            'class' => 'fa fa-user',
            'pages' => ['company-profile', 'order-business-information'],
        ],
        'website-information' => [
            'name' => 'website-information',
            'link' => '#website-information',
            'title' => 'Website Information',
            'class' => 'fa fa-desktop',
            'pages' => ['company-profile', 'order-business-information'],
        ],
        'essential-information' => [
            'name' => 'essential-information',
            'link' => '#essential-information',
            'title' => 'Essential Information',
            'class' => 'fa fa-info',
            'pages' => ['company-profile', 'order-business-information'],
        ],
        'social-media' => [
            'name' => 'social-media',
            'link' => '#social-media',
            'title' => 'Social Media',
            'class' => 'fa fa-address-book',
            'pages' => ['company-profile', 'order-business-information'],
        ],
        'company-photos' => [
            'name' => 'company-photos',
            'link' => '#company-photos',
            'title' => 'Company Files',
            'class' => 'fa fa-camera',
            'pages' => ['company-profile'],
        ],
    ],
];
