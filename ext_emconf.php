<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Clear realurl\'s automatic configuration file',
    'description' => 'Delete the automatic generated typo3conf/realurl_autoconf.php via the TYPO3 CMS Backend (additional ClearCacheMenu item)',
    'category' => 'fe',
    'author' => 'Josef Glatz',
    'author_email' => 'j.glatz@supseven.at',
    'author_company' => 'Sup7even Digital',
    'shy' => '',
    'dependencies' => '',
    'conflicts' => '',
    'priority' => '',
    'module' => '',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => 0,
    'modify_tables' => '',
    'clearCacheOnLoad' => 1,
    'lockType' => '',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.11-8.9.99',
            'realurl' => '2.1.4-2.99.99',
            'php' => '7.0.0-7.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' =>
        [
            'psr-4' =>
                [
                    'Sup7even\\RealurlClearautoconf\\' => 'Classes',
                ],
        ],
];
