<?php

Kirby::plugin('baptiste/kirby-block-card-page', [
    'blueprints' => [
        'blocks/cardPage' => __DIR__ . '/blocks/card-page.yml',
    ],
    'snippets' => [
        'blocks/cardPage' => __DIR__ . '/snippets/blocks/card-page.php',
    ],
    'translations' => [
        'fr' => require 'languages/fr.php'
    ]
]);