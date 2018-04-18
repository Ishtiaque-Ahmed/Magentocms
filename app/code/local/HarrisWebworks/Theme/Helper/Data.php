<?php
require_once Mage::getModuleDir('', 'Harriswebworks_Theme') . DS . 'Library' . DS . 'Mobile_Detect.php';
class Harriswebworks_Theme_Helper_Data extends Mage_Core_Helper_Abstract{
	const CFG_ACTIVE = 'harriswebworks_theme/amp/active';
	const CFG_HOME = 'harriswebworks_theme/amp/home_page';
	const CFG_PAGES = 'harriswebworks_theme/amp/amp_page';
	const CFG_CUSTOM = 'harriswebworks_theme/amp/cus_page';
	const CFG_ANALYTIC = 'harriswebworks_theme/amp/analytic';
	const CFG_CSS_HOME = 'harriswebworks_theme/amp_design/cus_css_home';
	const CFG_CSS_CATEGORY = 'harriswebworks_theme/amp_design/cus_css_category';
	const CFG_CSS_PRODUCT = 'harriswebworks_theme/amp_design/cus_css_product';
	const CFG_ACTIVE_PHONE = 'harriswebworks_theme/amp_device/active_phone';
	const CFG_ACTIVE_TABLET = 'harriswebworks_theme/amp_device/active_tablet';
	
    public function getExtensionVersion()
    {
        return (string) Mage::getConfig()->getNode()->modules->Harriswebworks_Theme->version;
    }
	public function checkDevice(){
		
		$detect = new Mobile_Detect;
		$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
		return $deviceType;
	}
	public function isEnabledAmp()
    {
        return Mage::getStoreConfigFlag(self::CFG_ACTIVE);
    }
	public function isEnabledAmpOnPhone()
    {
        return Mage::getStoreConfigFlag(self::CFG_ACTIVE_PHONE);
    }
	public function isEnabledAmpOnTablet()
    {
        return Mage::getStoreConfigFlag(self::CFG_ACTIVE_TABLET);
    }
	public function getHomePage()
    {
		$id = Mage::getStoreConfig(self::CFG_HOME);
		return 'CMS_'.$id;
    }
	public function getCustomRoute()
    {
		$customroutes =array();
		$ids = Mage::getStoreConfig(self::CFG_CUSTOM);
		if($ids)	
		$customroutes = explode(',',trim($ids,','));
		return $customroutes;
    }
	public function getAmpPages()
    {
		$amproutes =array();
		$ids = Mage::getStoreConfig(self::CFG_PAGES);
		if($ids)	
		$amproutes = explode(',',trim($ids,','));
		return $amproutes;
    }
	public function getAnalyticAccNo()
    {
		 return Mage::getStoreConfig(self::CFG_ANALYTIC);
    }
	public function isEnabledTaxredumption()
    {//Mage::log('customerdd',true);
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
		return $taxredumption;
    }
	
}
