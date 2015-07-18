<?php
/**
 * @author
 * @copyright
 * @license
 */

defined("_JEXEC") or die("Restricted access");

class ModBvinfoHelper
{
    public static function getVisitorInfo() {

        JPluginHelper::importPlugin('system');
        $dispatcher = JDispatcher::getInstance();
        $visitorInfo = $dispatcher->trigger( 'onGetVisitorInfo' );
        return $visitorInfo[0];
    }
}
