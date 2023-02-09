<?php

declare(strict_types=1);

use Yivry\Website\Framework\AppCreator;

require __DIR__ . '/../vendor/autoload.php';

AppCreator::create(
    getenv('DEV') === '1' // See `make dev`
)->run();
