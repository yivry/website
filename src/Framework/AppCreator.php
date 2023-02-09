<?php

declare(strict_types=1);

namespace Yivry\Website\Framework;

use DI\Bridge\Slim\Bridge;
use DI\Container;
use Slim\App;
use Yivry\Website\Framework\Configurators\MiddlewareConfigurator;
use Yivry\Website\Framework\Configurators\RouteConfigurator;
use Yivry\Website\Framework\Configurators\TwigConfigurator;

final class AppCreator
{
    /** @var class-string<Configurator>[] */
    private const CONFIGURATORS = [
        TwigConfigurator::class, // Used in MiddlewareConfigurator
        MiddlewareConfigurator::class,
        RouteConfigurator::class,
    ];

    public static function create(bool $isDev): App
    {
        return self::createWithContainer(new Container(), $isDev);
    }

    public static function createWithContainer(Container $container, bool $isDev): App
    {
        $app = Bridge::create($container);

        /**
         * PhpStorm says this is a redundant Doc. However: when we remove this, it thinks of $configurator as
         * just a string, unable to resolve addTo. Make it make sense. PHPStan is happy either way.
         *
         * @noinspection PhpRedundantVariableDocTypeInspection
         *
         * @var class-string<Configurator> $configurator
         */
        foreach (self::CONFIGURATORS as $configurator) {
            $configurator::addTo($app, $isDev);
        }

        return $app;
    }
}
