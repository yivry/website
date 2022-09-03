<?php

namespace Yivry\Website\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use Yivry\Website\ModListFinder;

class Mod
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

    public function __invoke(ServerRequestInterFace $request, ResponseInterface $response, string $id): ResponseInterface
    {
        $list = $this->modListFinder->getList($id);

        if ($list === null) {
            throw new \Exception("Todo: handle invalid id ({$id})");
        }

        return $this->twig->render($response, 'modlist.html', [
            'category' => $list['category'],
            'list' => $list['list'],
        ]);
    }
}