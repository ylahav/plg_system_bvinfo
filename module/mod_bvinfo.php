<?php
/**
 * @author
 * @copyright
 * @license
 */

defined("_JEXEC") or die("Restricted access");

$doc =& JFactory::getDocument();
$doc->addStyleSheet( JURI::base() . "/modules/mod_bvinfo/css/style.css");
require_once dirname(__FILE__) . '/helper.php';
$visitorInfo =  ModBvinfoHelper::getVisitorInfo();

require JModuleHelper::getLayoutPath('mod_bvinfo', $params->get('layout', 'default'));
