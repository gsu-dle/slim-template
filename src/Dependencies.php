<?php

declare(strict_types=1);

namespace GAState\MySlimApp;

use GAState\MySlimApp\App as MySlimApp;
use GAState\Web\Slim\App  as SlimApp;
use GAState\Web\Slim\Env  as SlimEnv;

return (function () {
    $slimDir = SlimEnv::getString(SlimEnv::SLIM_DIR);

    /**
     * Default dependencies from Slim
     *
     * @var array<string,mixed> $slimDeps
     */
    $slimDeps = require("{$slimDir}/Dependencies.php");

    /**
     * App dependencies / Slim overrides
     *
     * @var array<string,mixed> $appDeps
     */
    $appDeps = [
        SlimApp::class => \DI\get(MySlimApp::class),
    ];

    return array_merge($slimDeps, $appDeps);
})();
