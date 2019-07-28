<?php
/**
 * Returns email constants
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
    'password_reset' => [
        'subject' => 'Reset Password',
        'message' => 'Please, click this link to reset your password :link.',
    ],
    'order' => [
        'create' => [
            'subject'  => 'NEW DEALER MARKETING PACKAGE REQUEST',
            'template' => app_path() . '/Views/Dealers/email_templates/order/create.html',
            'email'    => explode(',', env('MAIL_TO_ADMIN', [])),
        ],
        'update' => [
            'subject'  => 'UPDATED DEALER MARKETING PACKAGE REQUEST',
            'template' => app_path() . '/Views/Dealers/email_templates/order/update.html',
            'email'    => explode(',', env('MAIL_TO_ADMIN', [])),
        ],
    ],
    'gmb_update' => [
        'post' => [
            'subject'  => 'NEW GMB POST NOTIFICATION',
            'template' => app_path() . '/Views/Dealers/email_templates/gmb_notifications/post.html',
            'message'  => 'Dealer from location :location_location_name'
                . ' (ID: :location_location_id) has been'
                . ' added a new post at :instance_create_time GMT.',
            'email'    => explode(',', env('MAIL_TO_ADMIN', [])),
        ],
        'reply' => [
            'subject'  => 'GMB REPLY UPDATE NOTIFICATION',
            'template' => app_path() . '/Views/Dealers/email_templates/gmb_notifications/reply.html',
            'message'  => 'Dealer from location :location_location_name'
                . ' (ID: :location_location_id) has been taken action'
                . ' on a reply at :instance_reply_update_timestamp GMT.',
            'email'    => explode(',', env('MAIL_TO_ADMIN', [])),
        ],
        'location' => [
            'subject'  => 'COMPANY INFORMATION UPDATE NOTIFICATION',
            'template' => app_path() . '/Views/Dealers/email_templates/gmb_notifications/location.html',
            'message'  => 'Dealer from location :location_location_name'
                . ' (ID: :location_location_id) has been updated'
                . ' company information at :instance_location_update_time GMT.',
            'email'    => explode(',', env('MAIL_TO_ADMIN', [])),
        ],
    ],
    'service_subscribe' => [
        'subject'  => 'NEW DEALER SERVICE SUBSCRIPTION REQUEST',
        'template' => app_path() . '/Views/Dealers/email_templates/services/subscribe.html',
        'message'  => 'Dealer :dealer has been subscribed to :service service for :quarters quarters.',
        'email'    => explode(',', env('MAIL_TO_ADMIN', [])),
    ],
];
