<?php

$getModList = static fn (string $name): array => require __DIR__ . "/modlist/{$name}.php";

return [
    'MSI2-SE' => [
        "category" => "Factorio",
        "list" => (fn() => $getModList('MSI2-SE')),
    ]
];
