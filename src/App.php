<?php

declare(strict_types=1);

namespace GAState\MySlimApp;

use GAState\Web\Slim\App                          as SlimApp;
use GAState\Web\Slim\Controller\PhpInfoController as PhpInfoController;
use Psr\Http\Server\MiddlewareInterface           as Middleware;
use Slim\Interfaces\RouteCollectorProxyInterface  as RouteContainer;

class App extends SlimApp
{
    /**
     * @param array<string,Middleware|null> $middleware
     *
     * @return void
     */
    protected function loadMiddleware(array $middleware): void
    {
        parent::loadMiddleware($middleware);
    }


    /**
     * @param RouteContainer $routes
     *
     * @return void
     */
    protected function loadRoutes(RouteContainer $routes): void
    {
        $routes->get('/', [PhpInfoController::class, 'phpinfo']);
    }
}
