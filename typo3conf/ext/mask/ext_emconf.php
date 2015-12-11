<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "mask".
 *
 * Auto generated 10-12-2015 23:58
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'Mask',
  'description' => 'Create your own content elements and page templates. Easy to use, even without programming skills because of the comfortable drag&drop system. Stored in structured database tables.',
  'category' => 'plugin',
  'author' => 'TYPO3.experten Team',
  'author_email' => 'office@typo3experten.com',
  'author_company' => 'WEBprofil - Gernot Ploiner e.U.',
  'state' => 'stable',
  'uploadfolder' => false,
  'createDirs' => '',
  'clearCacheOnLoad' => 1,
  'version' => '1.1.1',
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '6.2.0-7.6.99',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
      'gridelements' => '',
    ),
  ),
  'autoload' => 
  array (
    'psr-4' => 
    array (
      'MASK\\Mask\\' => 'Classes/',
    ),
  ),
  'clearcacheonload' => true,
);

