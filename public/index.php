<?php

declare(strict_types=1);

use DI\ContainerBuilder  as DIContainerBuilder;
use GAState\Web\Slim\App as SlimApp;
use GAState\Web\Slim\Env as SlimEnv;

require __DIR__ . '/../vendor/autoload.php';

ob_start();

SlimEnv::load(
    $_ENV['BASE_DIR'] ?? __DIR__ . '/../',
    $_ENV['BASE_URI'] ?? dirname($_SERVER['SCRIPT_NAME'])
);

$cmplDir = SlimEnv::getString(SlimEnv::DI_CMPL_DIR);
$proxyDir = SlimEnv::getString(SlimEnv::DI_PRXY_DIR);
$defFile = SlimEnv::getString(SlimEnv::DI_DEF_FILE);

$container = (new DIContainerBuilder())
    // ->enableCompilation($cmplDir)
    // ->writeProxiesToFile(true, $proxyDir)
    ->useAttributes(true)
    ->addDefinitions($defFile)
    ->build();

$app = $container->get(SlimApp::class);
if ($app instanceof SlimApp) {
    $app->run();
}

ob_end_flush();
