<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use GAState\Web\Slim\App as GsuApp;
use GAState\Web\Slim\Env as GsuEnv;

require __DIR__ . '/../vendor/autoload.php';

ob_start();

GsuEnv::load(
    $_ENV['BASE_DIR'] ?? __DIR__ . '/../',
    $_ENV['BASE_URI'] ?? dirname($_SERVER['SCRIPT_NAME'])
);

$cmplDir = GsuEnv::getString(GsuEnv::DI_CMPL_DIR);
$proxyDir = GsuEnv::getString(GsuEnv::DI_PRXY_DIR);
$defFile = GsuEnv::getString(GsuEnv::DI_DEF_FILE);

$container = (new ContainerBuilder())
    ->enableCompilation($cmplDir)
    ->writeProxiesToFile(true, $proxyDir)
    ->useAttributes(true)
    ->addDefinitions($defFile)
    ->build();

/** @var GsuApp $app */
$app = $container->get(GsuApp::class);

$app->run();

ob_end_flush();
