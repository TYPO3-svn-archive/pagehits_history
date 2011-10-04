<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Armin Ruediger Vieweg <info@professorweb.de>
*
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

class tx_pagehitsHistory {
	/**
	 * settings of extension
	 * @var array
	 */
	protected $extensionSettings = array();

	/**
	 * Initializes the hook
	 *
	 * @return void
	 */
	protected function initializeHook() {
		$this->extensionSettings = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['pagehits_history']);
	}

	/**
	 * Hook 'addHits'
	 *
	 * @param user_Pagehits $userFunction Unused in this context
	 * @param Tx_Pagehits_Model_Pagehits $pagehitsModel
	 * @return void
	 */
	public function main($userFunction, $pagehitsModel) {
		$this->initializeHook();
		if ($GLOBALS['TSFE']->fe_user->user) {
			$usersHistory = $this->getUsersHistory($GLOBALS['TSFE']->fe_user->user['uid']);

			// Add current pagehit to usersHistory (at the beginning of array)
			array_unshift($usersHistory, $pagehitsModel->getPageUid());
			$usersHistory = array_unique($usersHistory);

			$this->setUsersHisotry(
				$GLOBALS['TSFE']->fe_user->user['uid'],
				$usersHistory
			);
		}
	}

	/**
	 * Returns userHistory as array of user
	 *
	 * @param integer $userUid uid of user to get history for
	 *
	 * @return array the pages of history in array.
	 */
	protected function getUsersHistory($userUid) {
		$user = $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow(
			'tx_pagehits_history_history',
			'fe_users',
			'uid = ' . $userUid
		);

		$userHistory = t3lib_div::trimExplode(
			',',
			$user['tx_pagehits_history_history'],
			TRUE
		);
		array_splice($userHistory, intval($this->extensionSettings['HISTORYCOUNT']) - 1);
		return $userHistory;
	}

	/**
	 * Sets the userHistory of given user
	 *
	 * @param integer $userUid uid of user to set history for
	 * @param array $usersHistory page history (newest items, are at first)
	 *
	 * @return void
	 */
	protected function setUsersHisotry($userUid, array $usersHistory) {
		$updateUsersHistory = array(
			'tx_pagehits_history_history' => implode(',', $usersHistory)
		);

		$GLOBALS['TYPO3_DB']->exec_UPDATEquery(
			'fe_users',
			'uid = ' . $userUid,
			$updateUsersHistory
		);
	}
}
?>