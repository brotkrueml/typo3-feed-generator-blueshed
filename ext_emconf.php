<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Example JSON Feed extension "Blue Shed" for Feed Generator',
    'description' => 'Add-on for Feed Generator which provides an example JSON Feed extension',
    'category' => 'fe',
    'author' => 'Chris Müller',
    'author_email' => 'typo3@krue.ml',
    'state' => 'experimental',
    'version' => '0.1.0-dev',
    'constraints' => [
        'depends' => [
            'feed_generator' => '0.6.0-0.6.99',
            'php' => '8.1.0-0.0.0',
            'typo3' => '11.5.0-12.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => ['Brotkrueml\\FeedGeneratorBlueShed\\' => 'Classes']
    ],
];
