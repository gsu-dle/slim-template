<?php

declare(strict_types=1);

namespace GAState\Web\App;

use GAState\Web\App\App;
use GAState\Web\Slim\App as GsuApp;
use GAState\Web\Slim\Env as GsuEnv;

return (function () {
    $slimDir = GsuEnv::getString(GsuEnv::SLIM_DIR);

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
        GsuApp::class => \DI\get(App::class),
    ];

    return array_merge($slimDeps, $appDeps);
})();
