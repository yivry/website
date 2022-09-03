<?php

namespace Yivry\Website\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class Home
{
    private Twig $twig;

    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke(ServerRequestInterFace $request, ResponseInterface $response): ResponseInterface
    {
        return $this->twig->render($response, 'home.html');
    }
}
