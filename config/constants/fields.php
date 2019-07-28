<?php
/**
 * Returns form fields restrictions
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
    'user' => [
        'email' => [
           'max_length' => 100,
        ],
        'password' => [
            'min_length' => 6,
        ],
    ],
    'company' => [
        'brand_name' => [
            'max_length' => 256,
        ],
        'business_name' => [
            'max_length' => 256,
        ],
        'street_address' => [
            'max_length' => 256,
        ],
        'address_line_2' => [
            'max_length' => 256,
        ],
        'city' => [
            'max_length' => 256,
        ],
        'state' => [
            'max_length' => 256,
        ],
        'zip_code' => [
            'max_length' => 10,
        ],
        'website' => [
            'max_length' => 256,
        ],
        'company_phone' => [
            'max_length' => 15,
        ],
    ],
    'contact' => [
        'primary_contact_first_name' => [
            'max_length' => 256,
        ],
        'primary_contact_last_name' => [
            'max_length' => 256,
        ],
        'primary_contact_position' => [
            'max_length' => 256,
        ],
        'primary_contact_mobile_number' => [
            'max_length' => 256,
        ],
        'additional_contact_first_name' => [
            'max_length' => 256,
        ],
        'additional_contact_last_name' => [
            'max_length' => 256,
        ],
        'additional_contact_position' => [
            'max_length' => 256,
        ],
        'additional_contact_mobile_number' => [
            'max_length' => 256,
        ],
    ],
    'essential_information' => [
        'business_description' => [
            'max_length' => 5000,
        ],
        'business_tagline' => [
            'max_length' => 150,
        ],
        'keywords' => [
            'array_max_length' => 256,
        ],
    ],
    'website_information' => [
        'website_url' => [
            'max_length' => 256,
        ],
        'website_name' => [
            'max_length' => 256,
        ],
        'website_phone' => [
            'max_length' => 15,
        ],
        'website_street' => [
            'max_length' => 256,
        ],
        'website_address_line_2' => [
            'max_length' => 256,
        ],
        'website_city' => [
            'max_length' => 256,
        ],
        'website_state' => [
            'max_length' => 256,
        ],
        'website_zip' => [
            'max_length' => 10,
        ],
        'website_email' => [
            'max_length' => 256,
        ],
        'contact_it' => [
            'max_length' => 256,
        ],
    ],
    'email_information' => [
        'email_login' => [
            'max_length' => 256,
        ],
        'email_password' => [
            'max_length' => 256,
        ],
        'email_email' => [
            'max_length' => 256,
        ],
        'email_port' => [
            'max_length' => 4,
        ],
        'email_protocol' => [
            'max_length' => 4,
        ],
    ],
    'newsletters' => [
        'mailchimp_api_key' => [
            'max_length' => 256,
        ],
        'mailchimp_list' => [
            'max_length' => 256,
        ],
    ],
    'google_services_information' => [
        'google_analytics' => [
            'max_length' => 256,
        ],
        'google_my_business' => [
            'max_length' => 256,
        ],
    ],
    'website_live_information' => [
        'live_domain_host' => [
            'max_length' => 256,
        ],
        'live_website_username' => [
            'max_length' => 256,
        ],
        'live_website_password' => [
            'max_length' => 256,
        ],
    ],
    'company_social_media' => [
        'facebook_name' => [
            'max_length' => 256,
        ],
        'twitter_name' => [
            'max_length' => 256,
        ]
    ],
    'company_google_services' => [
        'has_analytics' => [
            'min_value' => 0,
            'max_value' => 2,
        ],
        'adwords_ppc_budget' => [
            'min_value' => 0,
            'max_value' => 16777215,
        ],
    ],
    'social_media' => [
        'facebook' => [
            'max_length' => 256,
        ],
        'twitter' => [
            'max_length' => 256,
        ],
        'instagram' => [
            'max_length' => 256,
        ],
        'google_plus' => [
            'max_length' => 256,
        ],
        'youtube' => [
            'max_length' => 256,
        ],
        'pinterest' => [
            'max_length' => 256,
        ],
        'blog' => [
            'max_length' => 256,
        ],
        'website' => [
            'max_length' => 256,
        ],
    ],
    'social_media_username' => [
        'twitter' => [
            'max_length' => 256,
        ],
        'instagram' => [
            'max_length' => 256,
        ],
    ],
    'social_media_password' => [
        'twitter' => [
            'max_length' => 256,
        ],
        'instagram' => [
            'max_length' => 256,
        ],
    ],
    'company_photos' => [
        'files' => [
            'max_size' => 10485760, // 10 MB
            'format' => '.ai, .doc, .docx, .eps, .gif, .jpg, .jpeg, .mp4, .pdf, .png, .svg, .tiff',
            'types' => [
                'application/postscript',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'image/jpeg', 'image/pjpeg', 'image/png', 'image/gif', 'video/mp4',
                'application/pdf',
                'image/svg+xml', 'image/tiff', 'image/x-tiff',
            ]
        ],
    ],
    'order_logo' => [
        'logo' => [
            'max_size' => 10485760, // 10 MB
            'format' => '.jpeg, .png',
            'types' => ['image/jpeg', 'image/png',]
        ],
    ],
    'reply' => [
        'reply' => [
            'max_length' => 4096,
        ],
    ],
    'post' => [
        'summary' => [
            'max_length' => 1500,
        ],
        'cta_url' => [
            'max_length' => 256,
        ],
        'media' => [
            'max_size' => 10485760, // 10 MB
            'format' => '.jpeg, .png, .gif, .mp4',
            'types' => [
                'image/jpeg', 'image/png', 'image/gif', 'video/mp4',
            ],
        ],
        'offer_coupon_code' => [
            'max_length' => 256,
        ],
        'offer_redeem_online_url' => [
            'max_length' => 256,
        ],
        'event_title' => [
            'max_length' => 256,
        ],
        'product_name' => [
            'max_length' => 256,
        ],
    ],
    'admin_social_media' => [
        'year' => [
            'min_value' => gmdate('Y') - 1,
            'max_value' => gmdate('Y'),
        ],
        'month' => [
            'min_value' => 1,
            'max_value' => 12,
        ],
        'posts' => [
            'min_value' => 0,
            'max_value' => 65535,
        ],
        'engagements' => [
            'min_value' => 0,
            'max_value' => 65535,
        ],
        'impressions' => [
            'min_value' => 0,
            'max_value' => 65535,
        ],
    ],
    'admin_paid_ads' => [
        'year' => [
            'min_value' => gmdate('Y') - 1,
            'max_value' => gmdate('Y'),
        ],
        'month' => [
            'min_value' => 1,
            'max_value' => 12,
        ],
        'impressions' => [
            'min_value' => 0,
            'max_value' => 16777215,
        ],
        'clicks' => [
            'min_value' => 0,
            'max_value' => 16777215,
        ],
        'conversions' => [
            'min_value' => 0,
            'max_value' => 16777215,
        ],
        'spend' => [
            'min_value' => 0,
            'max_value' => 16777215,
        ],
    ],
    'admin_listing_leader' => [
        'year' => [
            'min_value' => gmdate('Y') - 1,
            'max_value' => gmdate('Y'),
        ],
        'month' => [
            'min_value' => 1,
            'max_value' => 12,
        ],
        'listing_correct' => [
            'min_value' => 0,
            'max_value' => 255,
        ],
        'listing_processing' => [
            'min_value' => 0,
            'max_value' => 255,
        ],
        'total_referral_traffic' => [
            'min_value' => 0,
            'max_value' => 65535,
        ],
    ],
    'admin_billing' => [
        'next_bill_date' => [
            'min_value' => gmdate('Y-m-d'),
        ],
        'billing_details' => [
            'max_length' => 256,
        ],
        'payment_method' => [
            'max_length' => 256,
        ],
    ],
    'admin_services' => [
        'quarters' => [
            'min_value' => 0,
        ],
    ],
    'services' => [
        'quarters' => [
            'min_value' => 0,
        ],
    ],
];
