<?php

declare(strict_types=1);

$getModList = static fn (string $name): callable => fn (): array => require __DIR__ . "/modlist/{$name}.php";

return [
    'MSI2-SE' => [
        "category" => "Factorio",
        "list" => $getModList('MSI2-SE'),
    ],
    "Yivry's Mods" => [
        "category" => "Factorio",
        "list" => $getModList('Yivrys-Mods'),
    ],
];
