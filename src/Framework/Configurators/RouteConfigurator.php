<?php

declare(strict_types=1);

namespace Yivry\Website\Framework\Configurators;

use Slim\App;
use Yivry\Website\Controllers\HomeController;
use Yivry\Website\Controllers\ListModsController;
use Yivry\Website\Controllers\ModsController;
use Yivry\Website\Framework\Configurator;

final class RouteConfigurator implements Configurator
{
    private const GET = 'GET';

    /** @var array<array{string[], string, class-string, string}> */
    private const ROUTES = [
        [[self::GET], '/mods/{id}', ModsController::class, 'mod'],
        [[self::GET], '/mods', ListModsController::class, 'mods'],
        [[self::GET], '/', HomeController::class, 'home'],
    ];

    public static function addTo(App $app, bool $isDev): void
    {
        foreach (self::ROUTES as [$methods, $pattern, $controller, $name]) {
            $app->map($methods, $pattern, $controller)->setName($name);
        }
    }
}
