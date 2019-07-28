<?php
namespace App\Services;

use Illuminate\Database\Capsule\Manager;
use App\Kernel\ServiceInterface;

class EloquentService implements ServiceInterface
{

    /**
     * Service register name
     */
    public function name()
    {
        return 'db';
    }

    /**
     * Register new service on dependency container
     */
    public function register()
    {
        return function ($container) {
            $settings = $container->settings['db'];

            $capsule = new Manager;

            $capsule->addConnection($settings);

            $capsule->setAsGlobal();

            $capsule->bootEloquent();

            unset($container, $settings);

            return $capsule;
        };
    }
}
