<?php

declare(strict_types=1);

use Mollie\PhpCodingStandards\PhpCsFixer\Rules;
use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->exclude('cache')
    ->exclude('templates')
    ->in(__DIR__);

return (new Config('Yivry.com'))
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setRules(Rules::getForPhp81());
