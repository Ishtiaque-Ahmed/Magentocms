<?php
class Digitab_Brandlogo_Block_Brandlogo extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getBrandlogo()     
     { 
        if (!$this->hasData('brandlogo')) {
            $this->setData('brandlogo', Mage::registry('brandlogo'));
        }
        return $this->getData('brandlogo');
        
    }
}