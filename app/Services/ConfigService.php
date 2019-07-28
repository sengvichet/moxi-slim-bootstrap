<?php
namespace App\Services;

use App\Kernel\ServiceInterface;
use Classes\Config;

class ConfigService implements ServiceInterface
{

    /**
     * Service register name
     */
    public function name()
    {
        return 'config';
    }

    /**
     * Register new service on dependency container
     */
    public function register()
    {
        return function ($container) {
            $config = new Config($container->settings['config']);

            unset($container);

            return $config;
        };
    }
}
