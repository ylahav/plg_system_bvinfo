# BVinfo
Joomla plugin - get vistor information (ip, countery etc.)

The plugin is based on geoplugin service (www.geoplugin.com)
The data on your visitor returned to you by all of the web services shows their:

    City
    Region
    Area Code
    DMA Code
    2-Letter ISO 3166 Country Code -> www.geoplugin.com/iso3166
    Country Name
    2-Letter Continent Code
    Latitude
    Longitude
    3-Letter Currency Code - en.wikipedia.org/wiki/ISO_4217
    HTML Currency Symbol
    Currency Exchange Rate

Usage:

    JPluginHelper::importPlugin('system');
    $dispatcher = JDispatcher::getInstance();
    $customerInfo = $dispatcher->trigger( 'onGetVisitorInfo' );
    
    $customerInfo[0] - store the visitor information.
