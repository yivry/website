<?php

declare(strict_types=1);

namespace Yivry\Website\Framework;

use Slim\Error\Renderers\HtmlErrorRenderer;
use Slim\Views\Twig;

final class ErrorRenderer extends HtmlErrorRenderer
{
    public function __construct(
        private readonly Twig $twig,
    ) {
    }

    public function renderHtmlBody(string $title = '', string $html = ''): string
    {
        return $this->twig->fetch('error.html', [
            'title' => $title,
            'html' => $html,
        ]);
    }
}
