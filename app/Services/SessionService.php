<?php
namespace App\Services;

use App\Kernel\ServiceInterface;
use Classes\Session;

class SessionService implements ServiceInterface
{

    /**
     * Service register name
     */
    public function name()
    {
        return 'session';
    }

    /**
     * Register new service on dependency container
     */
    public function register()
    {
        return function ($container) {
            $session = Session::getInstance();

            unset($container);

            return $session;
        };
    }
}
