<?php

declare(strict_types=1);

namespace Yivry\Website;

use Slim\Views\Twig;

class TwigCreator
{
    public static function create(bool $isDev): callable
    {
        return function () use ($isDev) {
            $twig = Twig::create(__DIR__ . '/../templates', [
                'cache' => $isDev ? false : __DIR__ . '/../cache/',
            ]);

            $twig['hash'] = @file_get_contents(__DIR__ . "/../public/.hash");

            return $twig;
        };
    }
}
