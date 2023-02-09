<?php

declare(strict_types=1);

namespace Yivry\Website\Framework\Configurators;

use Middlewares\TrailingSlash;
use Slim\App;
use Slim\Handlers\ErrorHandler;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Yivry\Website\Framework\Configurator;
use Yivry\Website\Framework\ErrorRenderer;

final class MiddlewareConfigurator implements Configurator
{
    public static function addTo(App $app, bool $isDev): void
    {
        self::addTrailingSlashRemover($app);
        self::addTwig($app);

        // Error Middleware should always be last
        self::addError($app, $isDev);
    }

    private static function addTrailingSlashRemover(App $app): void
    {
        $app->add(
            // Only with the ResponseFactory it actively removes (not just ignores) a trailing slash
            (new TrailingSlash())->redirect($app->getResponseFactory())
        );
    }

    private static function addTwig(App $app): void
    {
        $app->add(TwigMiddleware::createFromContainer($app, Twig::class));
    }

    private static function addError(App $app, bool $isDev): void
    {
        /** @var ErrorHandler $errorHandler */
        $errorHandler = $app->addErrorMiddleware($isDev, false, false)->getDefaultErrorHandler();
        $errorHandler->registerErrorRenderer('text/html', ErrorRenderer::class);
    }
}
