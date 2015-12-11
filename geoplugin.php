<?php
/*
This PHP class is free software: you can redistribute it and/or modify
the code under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

However, the license header, copyright and author credits
must not be modified in any form and always be displayed.

This class is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

@author geoPlugin (gp_support@geoplugin.com)
@copyright Copyright geoPlugin (gp_support@geoplugin.com)
$version 1.01


This PHP class uses the PHP Webservice of http://www.geoplugin.com/ to geolocate IP addresses

Geographical location of the IP address (visitor) and locate currency (symbol, code and exchange rate) are returned.

See http://www.geoplugin.com/webservices/php for more specific details of this free service

*/

class geoPlugin {

	//the geoPlugin server
	var $host = 'http://www.geoplugin.net/php.gp?ip={IP}&base_currency={CURRENCY}';

	//the default base currency
	var $currency = 'USD';

	//initiate the geoPlugin vars
    var $visitorInfo;
	
	function geoPlugin() {

	}

	function locate($ip = null) {

		global $_SERVER;

		if ( is_null( $ip ) ) {
            if (getenv('HTTP_CLIENT_IP')) {
                $ip = getenv('HTTP_CLIENT_IP');
            } else if(getenv('HTTP_X_FORWARDED_FOR')) {
                $ip = getenv('HTTP_X_FORWARDED_FOR');
            } else if(getenv('HTTP_X_FORWARDED')) {
              $ip = getenv('HTTP_X_FORWARDED');
            } else if(getenv('HTTP_FORWARDED_FOR')) {
              $ip = getenv('HTTP_FORWARDED_FOR');
            } else if(getenv('HTTP_FORWARDED')) {
              $ip = getenv('HTTP_FORWARDED');
            } else if(getenv('REMOTE_ADDR')) {
              $ip = getenv('REMOTE_ADDR');
            } else {
              $ip = 'UNKNOWN';
            }
		}

		$host = str_replace( '{IP}', $ip, $this->host );
		$host = str_replace( '{CURRENCY}', $this->currency, $host );

		$data = array();

		$response = $this->fetch($host);

		$data = unserialize($response);

		//set the geoPlugin vars
		$this->visitorInfo['ip'] = $ip;
		$this->visitorInfo['city'] = $data['geoplugin_city'];
		$this->visitorInfo['region'] = $data['geoplugin_region'];
		$this->visitorInfo['areaCode'] = $data['geoplugin_areaCode'];
		$this->visitorInfo['dmaCode'] = $data['geoplugin_dmaCode'];
		$this->visitorInfo['countryCode'] = $data['geoplugin_countryCode'];
		$this->visitorInfo['countryName'] = $data['geoplugin_countryName'];
		$this->visitorInfo['continentCode'] = $data['geoplugin_continentCode'];
		$this->visitorInfo['latitude'] = $data['geoplugin_latitude'];
		$this->visitorInfo['longitude'] = $data['geoplugin_longitude'];
		$this->visitorInfo['currencyCode'] = $data['geoplugin_currencyCode'];
		$this->visitorInfo['currencySymbol'] = $data['geoplugin_currencySymbol'];
		$this->visitorInfo['currencyConverter'] = $data['geoplugin_currencyConverter'];
        return $this->visitorInfo;

	}

	function fetch($host) {

		if ( function_exists('curl_init') ) {

			//use cURL to fetch data
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $host);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_USERAGENT, 'geoPlugin PHP Class v1.0');
			$response = curl_exec($ch);
			curl_close ($ch);

		} else if ( ini_get('allow_url_fopen') ) {

			//fall back to fopen()
			$response = file_get_contents($host, 'r');

		} else {

			trigger_error ('geoPlugin class Error: Cannot retrieve data. Either compile PHP with cURL support or enable allow_url_fopen in php.ini ', E_USER_ERROR);
			return;

		}

		return $response;
	}

	function convert($amount, $float=2, $symbol=true) {

		//easily convert amounts to geolocated currency.
		if ( !is_numeric($this->visitorInfo['currencyConverter']) || $this->visitorInfo['currencyConverter'] == 0 ) {
			trigger_error('geoPlugin class Notice: currencyConverter has no value.', E_USER_NOTICE);
			return $amount;
		}
		if ( !is_numeric($amount) ) {
			trigger_error ('geoPlugin class Warning: The amount passed to geoPlugin::convert is not numeric.', E_USER_WARNING);
			return $amount;
		}
		if ( $symbol === true ) {
			return $this->visitorInfo['currencySymbol'] . round( ($amount * $this->visitorInfo['currencyConverter']), $float );
		} else {
			return round( ($amount * $this->visitorInfo['currencyConverter']), $float );
		}
	}

	function nearby($radius=10, $limit=null) {

		if ( !is_numeric($this->visitorInfo['latitude']) || !is_numeric($this->visitorInfo['longitude']) ) {
			trigger_error ('geoPlugin class Warning: Incorrect latitude or longitude values.', E_USER_NOTICE);
			return array( array() );
		}

		$host = "http://www.geoplugin.net/extras/nearby.gp?lat=" . $this->visitorInfo['latitude'] . "&long=" . $this->visitorInfo['longitude'] . "&radius={$radius}";

		if ( is_numeric($limit) )
			$host .= "&limit={$limit}";

		return unserialize( $this->fetch($host) );

	}
    
    public function getVisitorInfo() {
        return $this->visitorInfo;
    }
}

?>
