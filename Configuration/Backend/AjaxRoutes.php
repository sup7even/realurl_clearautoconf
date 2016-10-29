<?php

/**
 * Definitions for routes provided by this extension
 * Contains all AJAX-based routes for entry points provided by this extension
 */
return [
    'realurlclearautoconf_deleteautoconf' => [
        'path' => '/theme/realurl/deleteautoconf',
        'target' => \Sup7even\RealurlClearautoconf\Hooks\Frontend\Realurl\ClearCache::class . '::deleteAutoConfigurationFile',
    ],
];
