<?php
/**
 * Returns errors messages
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
    'not_saved'   => 'Sorry, the data was not saved. Please, try again.',
    'not_deleted' => 'Sorry, the data was not deleted. Please, try again.',
    'login' => [
        'not_exist' => 'Sorry, your email or password is invalid. Please, try again.',
        'email' => [
          'empty' => 'Email cannot be empty.',
          'max_length' => 'Email length cannot be more than :length chars.',
          'invalid' => 'Email is invalid.',
        ],
        'password' => [
          'empty' => 'Password cannot be empty',
          'min_length' => 'Password length cannot be less than :length chars.',
        ]
    ],
    'password_reset' => [
        'not_exist' => 'Sorry, an account with email :email was not found. Please, try again.',
        'email' => [
            'empty' => 'Email cannot be empty.',
            'max_length' => 'Email length cannot be more than :length chars.',
            'invalid' => 'Email is invalid.',
        ],
        'token' => [
            'invalid' => 'Sorry, the token is invalid or expired. Please, try again.',
        ],
        'password' => [
            'empty' => 'Password cannot be empty.',
            'min_length' => 'Password length cannot be less than :length chars.',
        ],
        'password_confirm' => [
            'empty' => 'Password confirm cannot be empty.',
            'min_length' => 'Password confirm length cannot be less than :length chars.',
            'equal' => 'Password confirm should be equal to password.'
        ],
    ],
    'company' => [
        'brand_name' => [
            'empty' => 'Brand name cannot be empty.',
            'max_length' => 'Brand name length cannot be more than :length chars.',
        ],
        'business_name' => [
            'empty' => 'Business name cannot be empty.',
            'max_length' => 'Business name length cannot be more than :length chars.',
        ],
        'address_line_2' => [
            'empty' => 'Address line 2 cannot be empty.',
            'max_length' => 'Address line 2 length cannot be more than :length chars.',
        ],
        'street_address' => [
            'empty' => 'Street address cannot be empty.',
            'max_length' => 'Street address length cannot be more than :length chars.',
        ],
        'city' => [
            'empty' => 'City cannot be empty.',
            'max_length' => 'City length cannot be more than :length chars.',
        ],
        'state' => [
            'empty' => 'State cannot be empty.',
            'max_length' => 'State length cannot be more than :length chars.',
        ],
        'zip_code' => [
            'empty' => 'Zip code cannot be empty.',
            'max_length' => 'Zip code length cannot be more than :length chars.',
        ],
        'website' => [
            'empty' => 'Website cannot be empty.',
            'max_length' => 'Website length cannot be more than :length chars.',
            'url' => 'Hint: try pasting your website link directly from the web browser.',
        ],
        'company_phone' => [
            'empty' => 'Company phone cannot be empty.',
            'max_length' => 'Company phone length cannot be more than :length chars.',
        ],
        'company_email' => [
            'empty' => 'Company email cannot be empty.',
            'email' => 'Company email should be a valid email address.',
        ],
        'opening_date' => [
            'date' => 'Opening date should be a valid date.',
        ],
    ],
    'contact' => [
            'primary_contact_first_name' => [
                'empty' => 'First name cannot be empty.',
                'max_length' => 'First name length cannot be more than :length chars.',
            ],
            'primary_contact_last_name' => [
                'empty' => 'Last name cannot be empty.',
                'max_length' => 'Last name length cannot be more than :length chars.',
            ],
            'primary_contact_position' => [
                'empty' => 'Position cannot be empty.',
                'max_length' => 'Position length cannot be more than :length chars.',
            ],
            'primary_contact_email' => [
                'empty' => 'Email cannot be empty.',
                'email' => 'Email should be a valid email address',
            ],
            'primary_contact_mobile_number' => [
                'empty' => 'Mobile number cannot be empty.',
                'max_length' => 'Mobile number length cannot be more than :length chars.',
            ],
            'additional_contact_first_name' => [
                'empty' => 'First name cannot be empty.',
                'max_length' => 'First name length cannot be more than :length chars.',
            ],
            'additional_contact_last_name' => [
                'empty' => 'Last name cannot be empty.',
                'max_length' => 'Last name length cannot be more than :length chars.',
            ],
            'additional_contact_position' => [
                'empty' => 'Position cannot be empty.',
                'max_length' => 'Position length cannot be more than :length chars.',
            ],
            'additional_contact_email' => [
                'empty' => 'Email cannot be empty.',
                'email' => 'Email should be a valid email address',
            ],
            'additional_contact_mobile_number' => [
                'empty' => 'Mobile number cannot be empty.',
                'max_length' => 'Mobile number length cannot be more than :length chars.',
            ],
    ],
    'essential_information' => [
        'hours' => [
            'empty' => 'Hours cannot be empty.',
            'invalid' => 'Hours are invalid.',
        ],
        'payment_methods' => [
            'empty' => 'Payment methods cannot be empty.',
            'invalid' => 'Payment methods are invalid.',
        ],
        'business_description' => [
            'max_length' => 'Business description length cannot be more than :length chars.',
        ],
        'business_tagline' => [
            'max_length' => 'Business tagline length cannot be more than :length chars.',
        ],
        'keywords' => [
            'array_max_length' => 'Keyword length cannot be more than :length chars.',
        ],
    ],
    'website_information' => [
        'website_url' => [
            'empty'      => 'Website URL cannot be more empty.',
            'max_length' => 'Website URL cannot be more than :length chars.',
            'url'        => 'Hint: try pasting your website link directly from the web browser.',
        ],
        'website_name' => [
            'max_length' => 'Website name cannot be more than :length chars.',
        ],
        'website_phone' => [
            'empty'      => 'Phone cannot be empty.',
            'max_length' => 'Phone length cannot be more than :length chars.',
        ],
        'website_street' => [
            'empty'      => 'Street cannot be empty.',
            'max_length' => 'Street length cannot be more than :length chars.',
        ],
        'website_address_line_2' => [
            'empty'      => 'Address line 2 cannot be empty.',
            'max_length' => 'Address line 2 length cannot be more than :length chars.',
        ],
        'website_city' => [
            'empty'      => 'City cannot be empty.',
            'max_length' => 'City length cannot be more than :length chars.',
        ],
        'website_state' => [
            'empty'      => 'State cannot be empty.',
            'max_length' => 'State length cannot be more than :length chars.',
        ],
        'website_zip' => [
            'empty'      => 'Zip code cannot be empty.',
            'max_length' => 'Zip code length cannot be more than :length chars.',
        ],
        'website_email' => [
            'max_length' => 'Website email cannot be more than :length chars.',
            'email'      => 'Website email should be a valid email.',
        ],
        'contact_it' => [
            'max_length' => 'Contact information length cannot be more than :length chars.',
        ],
    ],
    'email_information' => [
        'email_login' => [
            'max_length' => 'Username cannot be more than :length chars.',
        ],
        'email_password' => [
            'max_length' => 'Password cannot be more than :length chars.',
        ],
        'email_email' => [
            'max_length' => 'Email cannot be more than :length chars.',
            'email'      => 'Email should be a valid email.',
        ],
        'email_port' => [
            'max_length' => 'Mailing port length cannot be more than :length chars.',
            'integer'    => 'Mailing port is invalid',
        ],
        'email_protocol' => [
            'max_length' => 'Mailing protocol length cannot be more than :length chars.',
        ],
    ],
    'newsletters' => [
        'mailchimp_api_key' => [
            'max_length' => 'Mailchimp API key cannot be more than :length chars.',
        ],
        'mailchimp_list' => [
            'max_length' => 'Mailchimp list cannot be more than :length chars.',
        ],
    ],
    'google_services_information' => [
        'google_analytics' => [
            'max_length' => 'Google Analytics link cannot be more than :length chars.',
            'url'        => 'Google Analytics URL should be a valid URL.',
        ],
        'google_my_business' => [
            'max_length' => 'Google My Business link cannot be more than :length chars.',
            'url'        => 'Google My Business URL should be a valid URL.',
        ],
    ],
    'website_live_information' => [
        'live_need_contact' => [
            'boolean' => 'Contact My IT Specialist checkbox field is invalid.',
        ],
        'live_domain_host' => [
            'max_length' => 'Domain host cannot be more than :length chars.',
        ],
        'live_website_username' => [
            'max_length' => 'Username cannot be more than :length chars.',
        ],
        'live_website_password' => [
            'max_length' => 'Password cannot be more than :length chars.',
        ],
    ],
    'order_create' => [
        'error' => 'Sorry, the data was not saved. Please, try again.',
        'invalid' => ':field field is invalid.',
    ],
    'company_social_media' => [
        'facebook' => [
            'boolean' => 'Facebook checkbox field is invalid.',
        ],
        'facebook_name' => [
            'max_length' => 'Name of Facebook page cannot be more than :length chars.',
        ],
        'twitter' => [
            'boolean' => 'Twitter checkbox field is invalid.',
        ],
        'twitter_name' => [
            'max_length' => 'Handle of Twitter page cannot be more than :length chars.',
        ]
    ],
    'company_google_services' => [
        'has_analytics' => [
            'integer' => 'Analytics field is invalid.',
            'min_value' => 'Analytics field is invalid.',
            'max_value' => 'Analytics field is invalid.',
        ],
        'has_gmb' => [
            'boolean' => 'Gmb field is invalid.',
        ],
        'has_adwords_ppc' => [
            'boolean' => 'Adwords field is invalid.',
        ],
        'adwords_ppc_budget' => [
            'integer' => 'Adwords budget field is invalid.',
            'min_value' => 'Adwords budget cannot be less than :min_value.',
            'max_value' => 'Adwords budget cannot be greater than :max_value.',
        ],
    ],
    'social_media' => [
        'facebook' => [
            'max_length' => 'Facebook field cannot be more than :length chars.',
        ],
        'twitter' => [
            'max_length' => 'Twitter field cannot be more than :length chars.',
        ],
        'instagram' => [
            'max_length' => 'Instagram field cannot be more than :length chars.',
        ],
        'google_plus' => [
            'max_length' => 'Google+ field cannot be more than :length chars.',
        ],
        'youtube' => [
            'max_length' => 'YouTube field cannot be more than :length chars.',
        ],
        'pinterest' => [
            'max_length' => 'Pinterest field cannot be more than :length chars.',
        ],
        'blog' => [
            'max_length' => 'Blog field cannot be more than :length chars.',
        ],
        'website' => [
            'max_length' => 'Website field cannot be more than :length chars.',
        ],
    ],
    'social_media_username' => [
        'twitter' => [
            'max_length' => 'Twitter username cannot be more than :length chars.',
        ],
        'instagram' => [
            'max_length' => 'Instagram username cannot be more than :length chars.',
        ],
    ],
    'social_media_password' => [
        'twitter' => [
            'max_length' => 'Twitter password cannot be more than :length chars.',
        ],
        'instagram' => [
            'max_length' => 'Instagram password cannot be more than :length chars.',
        ],
    ],
    'company_photos' => [
        'files' => [
            'max_size' => 'File size should not exceed :size.',
            'format'   => 'File should be one of the supported format :format.',
            'upload'   => 'An error was occured during the upload. Please, try again later.',
            'filename' => 'File with such name already exists.',
        ],
    ],
    'order_logo' => [
        'logo' => [
            'empty'    => 'Logo should be uploaded.',
            'error'    => 'Sorry, the data was not saved. Please, try again.',
            'max_size' => 'File size should not exceed :size.',
            'format'   => 'File should be one of the supported format :format.',
            'upload'   => 'An error was occured during the upload. Please, try again later.',
            'filename' => 'File with such name already exists.',
        ],
    ],
    'order_website' => [
        'required' => 'Please make all required selections (:sections) before moving to the next section.',
    ],
    'reply' => [
        'reply' => [
            'empty' => 'Reply cannot be empty.',
        ],
    ],
    'post' => [
        'summary' => [
            'empty'      => 'Post summary cannot be empty.',
            'max_length' => 'Post summary cannot be more than :length chars.',
        ],
        'cta_url' => [
            'empty'      => 'Button\'s URL cannot be empty.',
            'max_length' => 'Button\'s URL cannot be more than :length chars.',
            'url'        => 'Button\'s URL should be a valid URL.',
        ],
        'media' => [
            'error'    => 'Sorry, the data was not saved. Please, try again.',
            'max_size' => 'File size should not exceed :size.',
            'format'   => 'File should be one of the supported format :format.',
            'upload'   => 'An error was occured during the upload. Please, try again later.',
            'filename' => 'File with such name already exists.',
        ],
        'offer_coupon_code' => [
            'max_length' => 256,
        ],
        'offer_redeem_online_url' => [
            'max_length' => 256,
            'url'        => 'Link to redeem offer be a valid URL.',
        ],
        'event_title' => [
            'empty'      => 'Event title cannot be empty.',
            'max_length' => 256,
        ],
        'event_start_date' => [
            'empty'      => 'Event start date cannot be empty.',
        ],
        'event_end_date' => [
            'empty'      => 'Event end date cannot be empty.',
        ],
        'product_name' => [
            'empty'      => 'Product name cannot be empty.',
            'max_length' => 256,
        ],
    ],
    'admin_social_media' => [
        'dealer' => [
            'empty' => 'Dealer field cannot be empty.',
        ],
        'year' => [
            'empty'     => 'Year cannot be empty.',
            'min_value' => 'Year cannot be less than :min_value.',
            'max_value' => 'Year cannot be greater than :max_value.',
        ],
        'month' => [
            'empty'     => 'Month cannot be empty.',
            'min_value' => 'Month number cannot be less than :min_value.',
            'max_value' => 'Month number cannot be greater than :max_value.',
        ],
        'day' => [
            'empty' => 'Day of week cannot be empty',
        ],
        'platform' => [
            'empty' => 'Platform cannot be empty',
        ],
        'posts' => [
            'empty'     => 'Posts number cannot be empty.',
            'integer'   => 'Posts number is invalid.',
            'min_value' => 'Posts number cannot be less than :min_value.',
            'max_value' => 'Posts number cannot be greater than :max_value.',
        ],
        'engagements' => [
            'empty'     => 'Engagements number cannot be empty.',
            'integer'   => 'Engagements number is invalid.',
            'min_value' => 'Engagements number cannot be less than :min_value.',
            'max_value' => 'Engagements number cannot be greater than :max_value.',
        ],
        'impressions' => [
            'integer'   => 'Impressions number is invalid.',
            'min_value' => 'Impressions number cannot be less than :min_value.',
            'max_value' => 'Impressions number cannot be greater than :max_value.',
        ],
    ],
    'admin_paid_ads' => [
        'dealer' => [
            'empty' => 'Dealer field cannot be empty.',
        ],
        'year' => [
            'empty'     => 'Year cannot be empty.',
            'min_value' => 'Year cannot be less than :min_value.',
            'max_value' => 'Year cannot be greater than :max_value.',
        ],
        'month' => [
            'empty'     => 'Month cannot be empty.',
            'min_value' => 'Month number cannot be less than :min_value.',
            'max_value' => 'Month number cannot be greater than :max_value.',
        ],
        'impressions' => [
            'empty'     => 'Impressions number cannot be empty.',
            'integer'   => 'Impressions number is invalid.',
            'min_value' => 'Impressions number cannot be less than :min_value.',
            'max_value' => 'Impressions number cannot be greater than :max_value.',
        ],
        'clicks' => [
            'empty'     => 'Clicks number cannot be empty.',
            'integer'   => 'Clicks number is invalid.',
            'min_value' => 'Clicks number cannot be less than :min_value.',
            'max_value' => 'Clicks number cannot be greater than :max_value.',
        ],
        'conversions' => [
            'empty'     => 'Conversions number cannot be empty.',
            'integer'   => 'Conversions number is invalid.',
            'min_value' => 'Conversions number cannot be less than :min_value.',
            'max_value' => 'Conversions number cannot be greater than :max_value.',
        ],
        'spend' => [
            'empty'     => 'Spend number cannot be empty.',
            'integer'   => 'Spend number is invalid.',
            'min_value' => 'Spend number cannot be less than :min_value.',
            'max_value' => 'Spend number cannot be greater than :max_value.',
        ],
    ],
    'admin_listing_leader' => [
        'dealer' => [
            'empty' => 'Dealer field cannot be empty.',
        ],
        'year' => [
            'empty'     => 'Year cannot be empty.',
            'min_value' => 'Year cannot be less than :min_value.',
            'max_value' => 'Year cannot be greater than :max_value.',
        ],
        'month' => [
            'empty'     => 'Month cannot be empty.',
            'min_value' => 'Month number cannot be less than :min_value.',
            'max_value' => 'Month number cannot be greater than :max_value.',
        ],
        'listing_correct' => [
            'empty'     => 'Listing number cannot be empty.',
            'integer'   => 'Listing number is invalid.',
            'min_value' => 'Listing number cannot be less than :min_value.',
            'max_value' => 'Listing number cannot be greater than :max_value.',
        ],
        'listing_processing' => [
            'empty'     => 'Listing number cannot be empty.',
            'integer'   => 'Listing number is invalid.',
            'min_value' => 'Listing number cannot be less than :min_value.',
            'max_value' => 'Listing number cannot be greater than :max_value.',
        ],
        'total_referral_traffic' => [
            'empty'     => 'Traffic number cannot be empty.',
            'integer'   => 'Traffic number is invalid.',
            'min_value' => 'Traffic number cannot be less than :min_value.',
            'max_value' => 'Traffic number cannot be greater than :max_value.',
        ],
    ],
    'admin_billing' => [
        'dealer' => [
            'empty' => 'Dealer field cannot be empty.',
        ],
        'billing_frequency' => [
            'empty'     => 'Billing frequency cannot be empty.',
        ],
        'next_bill_date' => [
            'empty'     => 'Next bill date cannot be empty.',
            'date'      => 'Next bill date is invalid.',
            'min_value' => 'Next bill date cannot be less than :min_value.',
        ],
        'billing_details' => [
            'empty'      => 'Billing details cannot be empty.',
            'max_length' => 'Billing details length cannot be more than :max_length.',
        ],
        'payment_method' => [
            'empty'      => 'Payment method cannot be empty.',
            'max_length' => 'Payment method length cannot be more than :max_length.',
        ],
    ],
    'admin_services' => [
        'dealer' => [
            'empty' => 'Dealer field cannot be empty.',
        ],
        'quarters' => [
            'integer'   => 'Quarters number is invalid.',
            'min_value' => 'Quarters number cannot be less than :min_value.',
        ],
    ],
    'services' => [
        'quarters' => [
            'empty'     => 'Quarters number cannot be empty.',
            'integer'   => 'Quarters number is invalid.',
            'min_value' => 'Quarters number cannot be less than :min_value.',
        ],
    ],
];
