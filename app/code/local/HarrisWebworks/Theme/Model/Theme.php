<?php

class Harriswebworks_Theme_Model_Theme extends Mage_Core_Model_Abstract {

    public function _construct() {
        parent::_construct();
        $this->_init('harriswebworks_theme/theme');
    }

    public function toOptionArray() {
        return array(
            array('value' => 1, 'label' => Mage::helper('theme')->__('Yes')),
            array('value' => 0, 'label' => Mage::helper('theme')->__('No')),
        );
    }
    

}
