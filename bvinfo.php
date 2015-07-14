<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.bvinfo
 *
 * @copyright   Copyright (C) 2015 Yair Lahav, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

require_once('geoplugin.php');

/**
 * Joomla! BVinfo Plugin.
 *
 * @since  3.0
 */
class PlgSystemBvinfo extends JPlugin {

	var $debug = false;
	var $geoInplugin;

    public function PlgSystemBvinfo(&$subject, $config) {
        if ($this->debug) {
        	echo "<br>     PlgSystemBvinfo -  PlgSystemBvinfo<br>";
	}
	$this->geoplugin = new geoPlugin();
			$this->geoplugin->locate();
        	if ($this->debug) {
			echo "<br>		--- geoplugin --------------------------<br>";
			print_r($this->geoplugin);
		}

	parent::__construct($subject, $config);
    }

	/**
	 * Gets visitor information.
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	public function onGetVisitorInfo()
	{
        	if ($this->debug) {
			echo "<br>     PlgSystemBvinfo -  onGetVisitorInfo<br>";
		}
		return $this->geoplugin;
	}
}
