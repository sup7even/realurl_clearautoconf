<?php

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function ($extKey) {

        if (TYPO3_MODE === 'BE') {
            // Add custom cache action item: delete realurl configuration file
            $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['additionalBackendItems']['cacheActions'][$extKey] = \Sup7even\RealurlClearautoconf\Hooks\Backend\Toolbar\ClearRealurlAutoConfMenuItem::class;
        }

    },
    $_EXTKEY
);
