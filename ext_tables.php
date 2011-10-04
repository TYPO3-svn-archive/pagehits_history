<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$newColumn = Array (
	'tx_pagehits_hits' => Array (
		'exclude' => 1,
		'label' => 'Pagehits History',
		'config' => Array (
			'type' => 'group',
			'internal_type' => 'db',
			'allowed' => 'pages',
			'show_thumbs' => 0,
			'size' => 6,
			'minitems' => 0,
			'maxitems' => 9999,
		),
	)
);

t3lib_div::loadTCA('fe_users');
t3lib_extMgm::addTCAcolumns('fe_users', $newColumn, 1);
?>