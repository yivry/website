<?php

namespace Yivry\Website;

use Slim\Error\Renderers\HtmlErrorRenderer;
use Slim\Views\Twig;

class ErrorRenderer extends HtmlErrorRenderer
{
    private Twig $twig;

    public function __construct(
        Twig $twig
    ) {
        $this->twig = $twig;
    }

    public function renderHtmlBody(string $title = '', string $html = ''): string
    {
        return $this->twig->fetch('error.html', [
            'title' => $title,
            'html' => $html,
        ]);
    }
}