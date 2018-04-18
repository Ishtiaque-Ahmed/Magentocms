<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Harriswebworks
 * @package     Harriswebworks_CustomAttribute
 * @copyright   Copyright (c) 2012 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

class Harriswebworks_Theme_Model_Observer extends Varien_Event_Observer
{
	
	protected function activateAmp(){
		if($this->checkPages()){
			Mage::getDesign()->setArea('frontend')->setPackageName('harriswebworks')->setTheme('amp');	
		}
	}
	protected function checkPages()
	{
		$pages = array('cms_index_index');
		$fullActionName = Mage::app()->getFrontController()->getAction()->getFullActionName();
		 Mage::log($fullActionName,true);
		if(in_array($fullActionName,$pages)){
			return true;
		}else if(in_array($fullActionName,Mage::helper('harriswebworks_theme')->getAmpPages()))
		{
			return true;
		}else if(in_array($fullActionName,Mage::helper('harriswebworks_theme')->getCustomRoute()))
		{
			return true;
		}
		
		return false;
	}
	
	public function activateAmpTheme(Varien_Event_Observer $observer)
	{
		if(Mage::helper('harriswebworks_theme')->isEnabledAmp()){
			$device = Mage::helper('harriswebworks_theme')->checkDevice();
			if($device=='phone' && Mage::helper('harriswebworks_theme')->isEnabledAmpOnPhone()){
				
				$this->activateAmp();
			}else if($device=='tablet' && Mage::helper('harriswebworks_theme')->isEnabledAmpOnTablet()){
				
				$this->activateAmp();
			}
			
		}
	}
	public function checkTax(Varien_Event_Observer $observer)
    {
		$quote = $observer->getQuote();
		//$enabled  = Mage::helper('harriswebworks_theme')->isEnabledTaxredumption();
		$taxredumption =false;
		if(Mage::getSingleton('customer/session')->isLoggedIn())
  		{
			$customer_id = Mage::getSingleton('customer/session')->getCustomerId();
			//Mage::log('customer'.$customer_id,true);
			$ids = Mage::getStoreConfig('harriswebworks_theme/theme/enable_taxredumption');
			
			//Mage::log($ids,true);
			$customerids = explode(',',trim($ids,','));
			//Mage::log($customerids,true);
			if(in_array($customer_id,$customerids))
				$taxredumption=true;
				//Mage::log($taxredumption,true);
		}
		if($taxredumption)
  		{
			$taxAmount=0;
			 Mage::getSingleton('checkout/session')->setData('shiptaxclass_highestaxrate', 6);
			//Mage::getSingleton('customer/session')->getCustomer->setGroup(self::GROUP_EXEMPT_VAT)->save();
			$quote_items = $quote->getAllVisibleItems();
    		foreach ($quote_items as $item) {
        		$item->getProduct()->setTaxClassId(6);
        		//$product->;
       			$item->setPriceInclTax($item->getPrice());
        		$item->setBasePriceInclTax($item->getBasePrice());
        		
				
				$item->setTaxAmount($taxAmount);
   				$item->setBaseTaxAmount($taxAmount);
				$item->setBaseRowTotalInclTax($item->setBaseRowTotal());
				//$quote_item->save();
				//Mage::log($quote_item->getPrice(),true);
    		}
			$quote->setCustomerTaxClassId(5);
			 Mage::getSingleton('checkout/session')->setData('shiptaxclass_highestaxrateclass', 6);
    		$quote->save();
			
			 Mage::getSingleton('checkout/session')->setData('shiptaxclass_highestaxrateclass', 6);
		}
	}
	public function checkShippingTax(Varien_Event_Observer $observer)
	{
		$enabled  = Mage::helper('harriswebworks_theme')->isEnabledTaxredumption();
		if($enabled)
  		{
			$quote = $observer->getQuote();
			//$quote->setCustomeGroupId(8);
			//Mage::getSingleton('customer/session')->getCustomer->setGroup(self::GROUP_EXEMPT_VAT)->save();
			//$shippingaddress =$quote->getShippingAddress();
			Mage::getSingleton('checkout/session')->setData('shiptaxclass_highestaxrateclass', 6);
			$shippingaddress = Mage::getSingleton('checkout/session')->getQuote()->getShippingAddress();
			$sta = $shippingaddress->getShippingTaxAmount();
			$bsta = $shippingaddress->getBaseShippingTaxAmount();
			$gt = $shippingaddress->getGrandTotal();
			$bgt = $shippingaddress->getBaseGrandTotal();
			
			$shippingaddress->setTaxAmount(0);
			$shippingaddress->setBaseTaxAmount(0);
			$shippingaddress->setShippingTaxAmount(0);
			$shippingaddress->setBaseShippingTaxAmount(0);
			$shippingaddress->setShippingInclTax($shippingaddress->getShippingAmount());
			$shippingaddress->setBaseShippingInclTax($shippingaddress->getBaseShippingAmount());
			//Mage::log($shippingaddress->getShippingTaxClass(),true);
			$shippingaddress->setShippingTaxClass(6);
			//Mage::log($shippingaddress->getShippingTaxClass(),true);
			$shippingaddress->setGrandTotal($gt-$sta);
			$shippingaddress->setBaseGrandTotal($bgt-$bsta);
			 //$shippingaddress->removeAllShippingRates();
$shippingaddress->save();
//$quote->save();
		}
	}
}