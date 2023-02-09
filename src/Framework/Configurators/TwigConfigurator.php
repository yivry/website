<?php

declare(strict_types=1);

namespace Yivry\Website\Framework\Configurators;

use DI\Container;
use Slim\App;
use Slim\Views\Twig;
use Yivry\Website\Framework\Configurator;

final class TwigConfigurator implements Configurator
{
    private const ROOT = __DIR__ . '/../../../';

    public static function addTo(App $app, bool $isDev): void
    {
        /** @var Container $container */
        $container = $app->getContainer();
        $container->set(Twig::class, self::create($isDev));
    }

    public static function create(bool $isDev): Twig
    {
        $twig = Twig::create(self::ROOT . 'templates/', [
            'cache' => $isDev ? false : self::ROOT . 'cache/',
        ]);

        $twig['hash'] = @file_get_contents(self::ROOT . "public/.hash");

        return $twig;
    }
}
