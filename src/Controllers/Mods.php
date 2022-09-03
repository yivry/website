<?php

namespace Yivry\Website\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use Yivry\Website\ModListFinder;

class Mods
{
    private ModListFinder $modListFinder;
    private Twig $twig;

    public function __construct(
        ModListFinder $modListFinder,
        Twig $twig
    ) {
        $this->modListFinder = $modListFinder;
        $this->twig = $twig;
    }

    public function __invoke(ServerRequestInterFace $request, ResponseInterface $response): ResponseInterface
    {
        return $this->twig->render($response, 'mods.html', [
            'list' => $this->modListFinder->getOrderedAvailableLists(),
        ]);
    }
}