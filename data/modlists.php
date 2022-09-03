<?php

$getmodlist = static fn (string $name): array => require __DIR__ . "/modlist/{$name}.php";

return [
    'MSI2-SE' => [
        "category" => "Factorio",
        "list" => (fn() => $getmodlist('MSI2-SE')),
    ]
];
