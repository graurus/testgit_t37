<?php
namespace TYPO3\CMS\Backend\Form\FormDataProvider;

/*
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

use TYPO3\CMS\Backend\Form\FormDataProviderInterface;
use TYPO3\CMS\Core\Authentication\BackendUserAuthentication;

/**
 * Fetch information of user specific inline record expanded / collapsed state
 * from user->uc and put it into $result['inlineExpandCollapseStateArray']
 */
class TcaInlineExpandCollapseState implements FormDataProviderInterface
{
    /**
     * Add inline expand / collapse state
     *
     * @param array $result
     * @return array
     */
    public function addData(array $result)
    {
        if (!empty($result['inlineExpandCollapseStateArray'])) {
            // Early return if a parent record has already set this, happens for existing inline children
            // when opening a parent record.
            return $result;
        } elseif (!empty($result['inlineTopMostParentUid']) && !empty($result['inlineTopMostParentTableName'])) {
            // Happens in inline ajax context, top parent uid and top parent table are set
            $fullInlineState = unserialize($this->getBackendUser()->uc['inlineView']);
            if (!is_array($fullInlineState)) {
                $fullInlineState = [];
            }
            $inlineStateForTable = [];
            if ($result['command'] !== 'new') {
                $table = $result['inlineTopMostParentTableName'];
                $uid = $result['inlineTopMostParentUid'];
                if (!empty($fullInlineState[$table][$uid])) {
                    $inlineStateForTable = $fullInlineState[$table][$uid];
                }
            }
            $result['inlineExpandCollapseStateArray'] = $inlineStateForTable;
        } else {
            // Default case for a single record
            $fullInlineState = unserialize($this->getBackendUser()->uc['inlineView']);
            if (!is_array($fullInlineState)) {
                $fullInlineState = [];
            }
            $inlineStateForTable = [];
            if ($result['command'] !== 'new') {
                $table = $result['tableName'];
                $uid = $result['databaseRow']['uid'];
                if (!empty($fullInlineState[$table][$uid])) {
                    $inlineStateForTable = $fullInlineState[$table][$uid];
                }
            }
            $result['inlineExpandCollapseStateArray'] = $inlineStateForTable;
        }

        return $result;
    }

    /**
     * @return BackendUserAuthentication
     */
    protected function getBackendUser()
    {
        return $GLOBALS['BE_USER'];
    }
}
