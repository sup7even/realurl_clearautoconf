<?php
namespace Sup7even\RealurlClearautoconf\Hooks\Backend\Toolbar;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
use TYPO3\CMS\Backend\Routing\UriBuilder;
use TYPO3\CMS\Backend\Toolbar\ClearCacheActionsHookInterface;
use TYPO3\CMS\Core\Authentication\BackendUserAuthentication;
use TYPO3\CMS\Core\Imaging\Icon;
use TYPO3\CMS\Core\Imaging\IconFactory;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Lang\LanguageService;

/**
 * Class ClearRealurlAutoConfMenuItem
 * @package Sup7even\RealurlClearautoconf\Hooks\Backend\Toolbar
 */
class ClearRealurlAutoConfMenuItem implements ClearCacheActionsHookInterface
{

    /**
     * @var IconFactory
     */
    protected $iconFactory;

    /**
     * Add an entry to CacheMenuItems array
     *
     * @param array $cacheActions Array of CacheMenuItems
     * @param array $optionValues Array of AccessConfigurations-identifiers (typically  used by userTS with options.clearCache.identifier)
     */
    public function manipulateCacheActions(&$cacheActions, &$optionValues)
    {
        $backendUser = $this->getBackendUser();
        $languageService = $this->getLanguageService();
        $languagePrefix = 'LLL:EXT:realurl_clearautoconf/Resources/Private/Language/locallang.xlf:clearcacheaction.realurl.autoConf';
        $this->iconFactory = GeneralUtility::makeInstance(IconFactory::class);

        $menuItemPath = $this->getUriBuilder()->buildUriFromRoute('ajax_' . 'realurlclearautoconf_deleteautoconf');

        $extConfRealurl = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['realurl']);

        $msgAutoconf = htmlspecialchars($languageService->sL($languagePrefix . 'Description'));
        if (!$extConfRealurl['enableAutoConf'] === true) {
            $msgAutoconf .= ' (' . htmlspecialchars($languageService->sL($languagePrefix . 'DescriptionTurnedOff')) . ')';
        }

        if (ExtensionManagementUtility::isLoaded('realurl')) {
            if ($backendUser->isAdmin() || $backendUser->getTSConfigVal('options.clearCache.realurl.autoconf')) {
                $cacheActions[] = [
                    'id' => 'realurlclearautoconf_deleteautoconf',
                    'title' => htmlspecialchars($languageService->sL($languagePrefix . 'Title')),
                    'description' => $msgAutoconf,
                    'href' => $menuItemPath,
                    'icon' => $this->iconFactory->getIcon('ext-realurlclearautoconf-backend-realurl-reset', Icon::SIZE_SMALL)->render()
                ];
                $optionValues[] = 'realurlclearautoconf_deleteautoconf';
            }
        }
    }

    /**
     * Returns the current BE user.
     *
     * @return BackendUserAuthentication
     */
    protected function getBackendUser()
    {
        return $GLOBALS['BE_USER'];
    }

    /**
     * Returns LanguageService
     *
     * @return LanguageService
     */
    protected function getLanguageService()
    {
        return $GLOBALS['LANG'];
    }

    /**
     * Returns UriBuilder
     *
     * @return UriBuilder
     */
    protected function getUriBuilder()
    {
        return GeneralUtility::makeInstance(UriBuilder::class);
    }
}
