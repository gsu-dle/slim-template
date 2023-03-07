<?php

declare(strict_types=1);

use DI\ContainerBuilder   as DIContainerBuilder;
use GAState\MySlimApp\Env as Env;
use GAState\Web\Slim\App  as BaseApp;

require __DIR__ . '/../vendor/autoload.php';

ob_start();

(function () {
    Env::load(
        strval(realpath(Env::getString(Env::BASE_DIR, __DIR__ . '/../'))),
        Env::getString(Env::BASE_URI, dirname(dirname($_SERVER['SCRIPT_NAME'])))
    );

    $containerBuilder = (new DIContainerBuilder())
        ->useAttributes(true)
        ->addDefinitions(Env::getString(Env::DI_DEF_FILE));

    if (Env::getBool(Env::DI_ENABLE_CMPL)) {
        $containerBuilder = $containerBuilder
            ->enableCompilation(Env::getString(Env::DI_CMPL_DIR))
            ->writeProxiesToFile(true, Env::getString(Env::DI_PRXY_DIR));
    }

    $app = $containerBuilder
        ->build()
        ->get(BaseApp::class);

    // This should never happen but... let's handle anyway
    if (!$app instanceof BaseApp) {
        throw new RuntimeException("\$app is not an instance of " . BaseApp::class);
    }

    $app->run();
})();

ob_end_flush();
