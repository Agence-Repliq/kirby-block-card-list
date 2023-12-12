<?php

Kirby::plugin('baptiste/kirby-block-card-page', [
    'blueprints' => [
        'blocks/cardPage' => __DIR__ . '/blueprints/blocks/card-page.yml',
        'fields/list_structure' => __DIR__ . '/blueprints/fields/list_structure.yml',
        'fields/media_select' => __DIR__ . '/blueprints/fields/media_select.yml',
    ],
    'snippets' => [
        'blocks/cardPage' => __DIR__ . '/snippets/blocks/card-page.php',
    ],
    'translations' => [
        'fr' => require 'languages/fr.php'
    ]
]);