<?php

/**
 * Copyright [2014] [Harriswebworks]
 *
 * @package   Harriswebworks_StoreMaintenance
 * @author    Harriswebworks
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 */
 
class Harriswebworks_Theme_Model_Cmspage
{
    public function toOptionArray()
    {
        if(!$this -> _options){
            $this    -> _options = array(
                array(
                    'value' => 0,
                    'label' => Mage::helper('catalog')->__('Please select one ...'),
                )
            );

            $collection = Mage::getModel('cms/page')->getCollection()
			//->addStoreFilter(Mage::app()->getStore()->getId())
        	->addFieldToFilter('is_active',1)
			->setOrder('title', 'ASC');
			$options = $collection->toOptionArray();
            $this -> _options = array_merge($this -> _options, $options);
        }
		
        return $this->_options;
    }

}