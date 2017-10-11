<?php
/**
 * Copyright (c) 2017, Andrew Longosz
 */

$header = <<<'EOF'
Copyright (c) 2017, Andrew Longosz
EOF;

return PhpCsFixer\Config::create()
    ->setRules(
        [
            '@Symfony' => true,
            '@Symfony:risky' => true,
            'array_syntax' => ['syntax' => 'short'],
            'protected_to_private' => false,
            'header_comment' => [
                'commentType' => 'PHPDoc',
                'header' => $header,
                'location' => 'after_open',
                'separate' => 'bottom',
            ],
            'phpdoc_align' => false,
        ]
    )
    ->setRiskyAllowed(true)
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in([__DIR__ . '/src', __DIR__ . '/tests'])
    );
