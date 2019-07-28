<?php
/**
 * Returns services classes
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
    \App\Services\MonologService::class,
    \App\Services\ErrorHandlerService::class,
    \App\Services\ControllerStrategyService::class,
    \App\Services\FlashMessagesService::class,
    \App\Services\TwigViewService::class,
    \App\Services\ConfigService::class,
    \App\Services\EloquentService::class,
    \App\Services\SessionService::class,
    \App\Services\EmailService::class,
    \App\Services\FormErrorsService::class,
    \App\Services\ProductsTableService::class,
    \App\Services\NotFoundHandlerService::class,
    \App\Services\UploadService::class,
    \App\Services\GmbApiService::class,
    \App\Services\GmbDataService::class,
    \App\Services\GmbEmailService::class,
    \App\Services\OrderEmailService::class,
    \App\Services\EventService::class,
];
