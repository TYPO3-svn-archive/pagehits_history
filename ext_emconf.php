<?php

########################################################################
# Extension Manager/Repository config file for ext "pagehits_history".
#
# Auto generated 04-10-2011 14:34
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Pagehits: History',
	'description' => 'Extends the pagehits extension and fills a new field in fe_user with a history of visited pages.',
	'category' => 'plugin',
	'author' => 'Armin Ruediger Vieweg',
	'author_email' => 'info@professorweb.de',
	'author_company' => 'Professor Web - Webdesign Blog',
	'shy' => '',
	'dependencies' => 'pagehits',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'version' => '1.0.1',
	'loadOrder' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.5.0-0.0.0',
			'pagehits' => '1.1.0-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:6:{s:21:"ext_conf_template.txt";s:4:"6283";s:12:"ext_icon.gif";s:4:"1d2d";s:17:"ext_localconf.php";s:4:"028e";s:14:"ext_tables.php";s:4:"1c0d";s:14:"ext_tables.sql";s:4:"f01e";s:30:"Classes/tx_pagehitsHistory.php";s:4:"fc33";}',
	'suggests' => array(
	),
);

?>