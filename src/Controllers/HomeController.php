<?php

declare(strict_types=1);

namespace Yivry\Website\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

final class HomeController
{
    public function __construct(
        private readonly Twig $twig,
    ) {
    }

    public function __invoke(ServerRequestInterFace $request, ResponseInterface $response): ResponseInterface
    {
        return $this->twig->render($response, 'home.html');
    }
}
