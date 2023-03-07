<?php

declare(strict_types=1);

namespace GAState\MySlimApp;

use GAState\MySlimApp\App as App;
use GAState\MySlimApp\Env as Env;
use GAState\Web\Slim\App  as BaseApp;

// use GAState\Web\Slim\Cache\AppCacheFactoryInterface as AppCacheFactory;
// use GAState\Web\Slim\Cache\DBAppCacheFactory        as DBAppCacheFactory;
// use GAState\Web\Slim\Log\DBLoggerFactory            as DBLoggerFactory;
// use GAState\Web\Slim\Log\LoggerFactoryInterface     as LoggerFactory;

return (function () {
    /**
     * Default dependencies
     *
     * @var array<string,mixed> $defaultDeps
     */
    $defaultDeps = require(Env::getString(Env::SLIM_DIR) . "/Dependencies.php");

    /**
     * Environment variables
     *
     * @var array<string,mixed> $envVars
     */
    $envVars = [
        // 'appCacheOptions' => [
        //     'db_table' => 'AppCache'
        // ],
        // 'logTable' => 'AppLog',
    ];

    /**
     * App dependencies
     *
     * @var array<string,mixed> $appDeps
     */
    $appDeps = [
        BaseApp::class => \DI\autowire(App::class),

        // AppCacheFactory::class => \DI\autowire(DBAppCacheFactory::class)
        //     ->constructorParameter('options', \DI\get('appCacheOptions')),
        // LoggerFactory::class => \DI\autowire(DBLoggerFactory::class)
        //     ->constructorParameter('logName', \DI\get('logName'))
        //     ->constructorParameter('logTable', \DI\get('logTable'))
        //     ->constructorParameter('logLevel', \DI\get('logLevel')),
    ];

    return array_merge($defaultDeps, $envVars, $appDeps);
})();
