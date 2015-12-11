# BVinfo
Joomla plugin - get vistor information (ip, countery etc.)

The plugin is based on geoplugin service (www.geoplugin.com)

Usage:

    JPluginHelper::importPlugin('system');
    $dispatcher = JDispatcher::getInstance();
    $customerInfo = $dispatcher->trigger( 'onGetVisitorInfo' )[0];
    
    $customerInfo - store the visitor information, with the following attributes:

	$customerInfo['ip']					- Visitor IP address
	$customerInfo['city']				- City
	$customerInfo['region']				- Region
	$customerInfo['areaCode']			- Area Code
	$customerInfo['dmaCode']			- DMA Code
	$customerInfo['countryCode']		- Country Code: 2-Letter ISO 3166 Country Code -> www.geoplugin.com/iso3166
	$customerInfo['countryName']		- Country Name
	$customerInfo['continentCode']		- Continent Code: 2-Letter Continent Code
	$customerInfo['latitude']			- Latitude
	$customerInfo['longitude']			- Longitude
	$customerInfo['currencyCode']		- Currency Code: 3-Letter Currency Code - en.wikipedia.org/wiki/ISO_4217
	$customerInfo['currencySymbol']		- HTML Currency Symbol
	$customerInfo['currencyConverter']	- Currency Exchange Rate