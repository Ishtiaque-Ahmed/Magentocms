<?php
class HarrisWebworks_Blogpost_Block_Blogpost extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getBlogpost()     
     { 
        if (!$this->hasData('blogpost')) {
            $this->setData('blogpost', Mage::registry('blogpost'));
        }
        return $this->getData('blogpost');
        
    }
}