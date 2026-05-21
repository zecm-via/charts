<?php

defined('TYPO3') or die();

(static function (string $extKey = 'charts') {
    $GLOBALS['TBE_STYLES']['skins'][$extKey]['stylesheetDirectories'][] = 'EXT:' . $extKey . '/Resources/Public/Css/Backend/';
})();
