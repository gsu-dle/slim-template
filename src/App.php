<?php

declare(strict_types=1);

namespace GAState\Web\App;

use GAState\Web\Slim\App as GsuApp;
use GAState\Web\Slim\Controller\PhpInfoController;
use Psr\Http\Server\MiddlewareInterface as PsrMiddleware;
use Slim\Interfaces\RouteCollectorProxyInterface as RouteContainer;

class App extends GsuApp
{
    /**
     * @param array<string, PsrMiddleware|null> $middleware
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
