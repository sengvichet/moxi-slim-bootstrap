<?php
namespace App\Services;

use App\Kernel\ServiceInterface;
use Classes\Upload;

class UploadService implements ServiceInterface
{

    /**
     * Service register name
     */
    public function name()
    {
        return 'upload';
    }

    /**
     * Register new service on dependency container
     */
    public function register()
    {
        return function ($container) {
            $upload = new Upload($container->settings['config']);

            unset($container);

            return $upload;
        };
    }
}
