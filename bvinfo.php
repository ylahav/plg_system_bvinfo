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
	var $geoplugin;

    public function PlgSystemBvinfo(&$subject, $config)
	{
        if ($this->debug) {
			echo "<br>     PlgSystemBvinfo -  PlgSystemBvinfo<br>";
		}
		$this->geoplugin = new geoPlugin();
		echo "<br>		--- geoplugin --------------------------<br>";
		//prinr_r($this->geoplugin);
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
		echo "<br>     PlgSystemBvinfo -  onGetVisitorInfo<br>";
		$info->ip = $this->getVisitorIp();
		$ipInfo = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$info->ip));
        echo "<br>     PlgSystemBvinfo -  after getIp<br>";
        print_r ($ipInfo);
		echo "<br>		-----------------------------<br>";
		$this->geoplugin->locate();
		echo "<br>		--- geoplugin --------------------------<br>";
		// prinr_r($this->geoplugin);
		return $ipInfo;
	}

	function getVisitorIp()
     {
          $ipaddress = '';
          if (getenv('HTTP_CLIENT_IP'))
              $ipaddress = getenv('HTTP_CLIENT_IP');
          else if(getenv('HTTP_X_FORWARDED_FOR'))
              $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
          else if(getenv('HTTP_X_FORWARDED'))
              $ipaddress = getenv('HTTP_X_FORWARDED');
          else if(getenv('HTTP_FORWARDED_FOR'))
              $ipaddress = getenv('HTTP_FORWARDED_FOR');
          else if(getenv('HTTP_FORWARDED'))
              $ipaddress = getenv('HTTP_FORWARDED');
          else if(getenv('REMOTE_ADDR'))
              $ipaddress = getenv('REMOTE_ADDR');
          else
              $ipaddress = 'UNKNOWN';

          return $ipaddress;
     }
}
