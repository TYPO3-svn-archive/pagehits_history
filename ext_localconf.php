<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['pagehits']['addHits'][] =
    'EXT:' . $_EXTKEY . '/Classes/tx_pagehitsHistory.php:tx_pagehitsHistory';
?>