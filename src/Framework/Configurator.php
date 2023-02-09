<?php

declare(strict_types=1);

namespace Yivry\Website\Framework;

use Slim\App;

interface Configurator
{
    public static function addTo(App $app, bool $isDev): void;
}
