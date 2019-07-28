<?php
/**
 * Returns GMB API settings
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
    'api_key'                => env('GMB_API_KEY', ''),
    'client_id'              => env('GMB_CLIENT_ID', ''),
    'project_id'             => env('GMB_PROJECT_ID', ''),
    'project_name'           => env('GMB_PROJECT_ID', ''),
    'organization_id'        => env('GMB_ORGANIZATION_ID', ''),
    'client_secrets_file'    => env('GMB_AUTH_FILE', ''),
    'service_account_file'   => env('GMB_SERVICE_ACCOUNT_FILE', ''),
    'scopes'                 => [
        'https://www.googleapis.com/auth/plus.business.manage',
    ],
    'auth_redirect_url'      => env('APP_URL') . '/oauth',
    'gmb_redirect_url'       => env('APP_URL') . '/google-my-business',
    'gmb_admin_redirect_url' => env('APP_URL') . '/admin/gmb',
    'gmb_test_mode'          => env('GMB_TEST_MODE'),
];
