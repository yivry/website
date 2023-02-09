<?php

declare(strict_types=1);

namespace Yivry\Website\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpNotFoundException;
use Slim\Views\Twig;
use Yivry\Website\ModListFinder;

final class ModsController
{
    public function __construct(
        private readonly ModListFinder $modListFinder,
        private readonly Twig $twig,
    ) {
    }

    public function __invoke(ServerRequestInterFace $request, ResponseInterface $response, string $id): ResponseInterface
    {
        $list = $this->modListFinder->getList($id);

        if ($list === null) {
            throw new HttpNotFoundException($request);
        }

        return $this->twig->render($response, 'modlist.html', [
            'category' => $list['category'],
            'list' => $list['list'],
        ]);
    }
}
