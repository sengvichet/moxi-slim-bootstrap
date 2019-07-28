<?php
namespace App\Services;

use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use App\Kernel\ServiceInterface;

class NotFoundHandlerService implements ServiceInterface
{

    /**
     * Service register name
     */
    public function name()
    {
        return 'notFoundHandler';
    }

    /**
     * Register new service on dependency container
     */
    public function register()
    {
        return function ($container) {
            return function ($request, $response) use ($container) {
                return $container->view->render(
                    $response->withStatus(404),
                    '/Common/404.twig'
                );
            };
        };
    }
}
