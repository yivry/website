<?php

return [
    "name" => "MSI2-SE",
    "desc" => "Mining Space Industries II with Space Exploration",
    "main" => [
        [
            "name" => "Mining Space Industries II",
            "id" => "Mining-Space-Industries-II",
            "deps" => [
                [
                    "name" => "Alien Biomes",
                    "id" => "alien-biomes",
                    "deps" => [
                        [
                            "name" => "Alien Biomes High-Res Terrain",
                            "id" => "alien-biomes-hr-terrain",
                            "opt" => true,
                        ],
                    ],
                ],
                [
                    "name" => "Armoured Biters",
                    "id" => "ArmouredBiters",
                    "opt" => true,
                ],
                [
                    "name" => "Explosive Biters",
                    "id" => "Explosive_biters",
                ],
                [
                    "name" => "Factorio crash site (and legacy items)",
                    "id" => "factorio-crash-site",
                ],
                [
                    "name" => "Frost Biters",
                    "id" => "Cold_biters",
                ],
                [
                    "name" => "Informatron",
                    "id" => "informatron",
                ],
                [
                    "name" => "Rocket-Silo Construction",
                    "id" => "Rocket-Silo-Construction",
                ],
            ],
        ],
        [
            "name" => "RPG System",
            "id" => "RPGsystem",
        ],
        [
            "name" => "Space Exploration",
            "id" => "space-exploration",
            "deps" => [
                [
                    "name" => "AAI Containers & Warehouses",
                    "id" => "aai-containers",
                ],
                [
                    "name" => "AAI Industry",
                    "id" => "aai-industry",
                    "deps" => [
                        [
                            "name" => "Inserter Fuel Leech",
                            "id" => "InserterFuelLeech",
                            "opt" => true,
                        ],
                    ],
                ],
                [
                    "name" => "AAI Signal Transmission",
                    "id" => "aai-signal-transmission",
                ],
                [
                    "name" => "Combat mechanics overhaul",
                    "id" => "combat-mechanics-overhaul",
                    "opt" => true,
                ],
                [
                    "name" => "Equipment Gantry",
                    "id" => "equipment-gantry",
                    "opt" => true,
                ],
                [
                    "name" => "Grappling Gun",
                    "id" => "grappling-gun",
                    "opt" => true,
                ],
                [
                    "name" => "Jetpack",
                    "id" => "jetpack",
                ],
                [
                    "name" => "Robot Attrition",
                    "id" => "robot_attrition",
                ],
                [
                    "name" => "Shield Projector",
                    "id" => "shield-projector",
                ],
                [
                    "name" => "Simulation Helper",
                    "id" => "simhelper",
                ],
                [
                    "name" => "Space Exploration Graphics Part 1",
                    "id" => "space-exploration-graphics",
                ],
                [
                    "name" => "Space Exploration Graphics Part 2",
                    "id" => "space-exploration-graphics-2",
                ],
                [
                    "name" => "Space Exploration Graphics Part 3",
                    "id" => "space-exploration-graphics-3",
                ],
                [
                    "name" => "Space Exploration Graphics Part 4",
                    "id" => "space-exploration-graphics-4",
                ],
                [
                    "name" => "Space Exploration Graphics Part 5",
                    "id" => "space-exploration-graphics-5",
                ],
                [
                    "name" => "Space Exploration Menu Simulations",
                    "id" => "space-exploration-menu-simulations",
                ],
                [
                    "name" => "Space Exploration Postprocess (required)",
                    "id" => "space-exploration-postprocess",
                ],
            ],
        ],
    ],
    "other" => [
        [
            "name" => "Automatic Train Painter",
            "id" => "Automatic_Train_Painter",
            "deps" => [
                [
                    "name" => "Fluid Wagon Color Mask",
                    "id" => "FluidWagonColorMask",
                    "opt" => true,
                ],
            ]
        ],
        [
            "name" => "Calculator UI",
            "id" => "calculator-ui",
        ],
        [
            "name" => "FNEI",
            "id" => "FNEI",
        ],
        [
            "name" => "Rate Calculator",
            "id" => "RateCalculator",
            "deps" => [
                [
                    "name" => "Factorio Library",
                    "id" => "flib",
                ],
            ]
        ],
        [
            "name" => "Researched What?",
            "id" => "researched-what",
        ],
        [
            "name" => "Todo List",
            "id" => "Todo-List",
        ],
        [
            "name" => "Train Trails",
            "id" => "train-trails",
        ],
        [
            "name" => "trainsaver",
            "id" => "trainsaver",
        ],
    ],
];
