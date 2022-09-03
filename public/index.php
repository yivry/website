<?php

use DI\Bridge\Slim\Bridge;
use DI\Container;
use Middlewares\TrailingSlash;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Yivry\Website\Controllers\Home;
use Yivry\Website\Controllers\Mod;
use Yivry\Website\Controllers\Mods;
use Yivry\Website\ErrorRenderer;
use Yivry\Website\ModListFinder;

require __DIR__ . '/../vendor/autoload.php';

// See `make dev`
$isDev = (getenv('DEV') ?? '0') === '1';

ModListFinder::setDefaultListFile();

$container = new Container();
$container->set(Twig::class, fn() => Twig::create(__DIR__ . '/../templates', [
    'cache' => $isDev ? false : __DIR__ . '/../cache/',
]));

$app = Bridge::create($container);

// Middlewares
$app->add(new TrailingSlash());
$app->add(TwigMiddleware::createFromContainer($app, Twig::class));

// Error Middleware should always be last
$app->addErrorMiddleware($isDev, false, false)
    ->getDefaultErrorHandler()
    ->registerErrorRenderer('text/html', ErrorRenderer::class);

// Routes
$app->get('/mods/{id}', Mod::class)->setName('mod');
$app->get('/mods', Mods::class)->setName('mods');
$app->get('/', Home::class)->setName('home');

// Go!
$app->run();
