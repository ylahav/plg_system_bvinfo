<?php
/**
 * @author
 * @copyright
 * @license
 */

defined("_JEXEC") or die("Restricted access");
?>

    <div class="bvinfo-container">
        <h3><?php echo JText::_('MOD_BVINFO_HEADER'); ?></h3>
        <div class="bvinfo-item">
            <div class="bvinfo-label">
                <?php echo JText::_('MOD_BVINFO_IP'); ?>:
            </div>
            <div class="bvinfo-value">
                <?php echo $visitorInfo->ip; ?>
            </div>
        </div>
        <div class="bvinfo-item">
            <div class="bvinfo-label">
                <?php echo JText::_('MOD_BVINFO_CITY'); ?>
            </div>
            <div class="bvinfo-value">
                <?php echo $visitorInfo->city; ?>
            </div>
        </div>
        <div class="bvinfo-item">
            <div class="bvinfo-label">
                <?php echo JText::_('MOD_BVINFO_REGION'); ?>
            </div>
            <div class="bvinfo-value">
                <?php echo $visitorInfo->region; ?>
            </div>
        </div>
        <div class="bvinfo-item">
            <div class="bvinfo-label">
                <?php echo JText::_('MOD_BVINFO_AREACODE'); ?>
            </div>
            <div class="bvinfo-value">
                <?php echo $visitorInfo->areaCode; ?>
            </div>
        </div>
        <div class="bvinfo-item">
            <div class="bvinfo-label">
                <?php echo JText::_('MOD_BVINFO_DMACODE'); ?>
            </div>
            <div class="bvinfo-value">
                <?php echo $visitorInfo->dmaCode; ?>
            </div>
        </div>
        <div class="bvinfo-item">
            <div class="bvinfo-label">
                <?php echo JText::_('MOD_BVINFO_COUNTRYCODE'); ?>
            </div>
            <div class="bvinfo-value">
                <?php echo $visitorInfo->countryCode; ?>
            </div>
        </div>
        <div class="bvinfo-item">
            <div class="bvinfo-label">
                <?php echo JText::_('MOD_BVINFO_COUNTRYNAME'); ?>
            </div>
            <div class="bvinfo-value">
                <?php echo $visitorInfo->countryName; ?>
            </div>
        </div>
        <div class="bvinfo-item">
            <div class="bvinfo-label">
                <?php echo JText::_('MOD_BVINFO_CONTINENTCODE'); ?>
            </div>
            <div class="bvinfo-value">
                <?php echo $visitorInfo->continentCode; ?>
            </div>
        </div>
        <div class="bvinfo-item">
            <div class="bvinfo-label">
                <?php echo JText::_('MOD_BVINFO_LATITUDE'); ?>
            </div>
            <div class="bvinfo-value">
                <?php echo $visitorInfo->latitude; ?>
            </div>
        </div>
        <div class="bvinfo-item">
            <div class="bvinfo-label">
                <?php echo JText::_('MOD_BVINFO_LONGTITUDE'); ?>
            </div>
            <div class="bvinfo-value">
                <?php echo $visitorInfo->longitude; ?>
            </div>
        </div>
        <div class="bvinfo-item">
            <div class="bvinfo-label">
                <?php echo JText::_('MOD_BVINFO_CURRENCYCODE'); ?>
            </div>
            <div class="bvinfo-value">
                <?php echo $visitorInfo->currencyCode; ?>
            </div>
        </div>
        <div class="bvinfo-item">
            <div class="bvinfo-label">
                <?php echo JText::_('MOD_BVINFO_CURRENCYSYMBOL'); ?>
            </div>
            <div class="bvinfo-value">
                <?php echo $visitorInfo->currencySymbol; ?>
            </div>
        </div>
        <div class="bvinfo-item">
            <div class="bvinfo-label">
                <?php echo JText::_('MOD_BVINFO_CURRENCYCONVERTER'); ?>
            </div>
            <div class="bvinfo-value">
                <?php echo $visitorInfo->currencyConverter; ?>
            </div>
        </div>
    </div>
