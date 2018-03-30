<?php
class Digitab_Brandlogoadmin_Block_Adminhtml_Brandlogo extends Mage_Adminhtml_Block_Widget_Grid_Container
{
     public function __construct()
    {
        $this->_controller = 'brandlogoadmin';
        $this->_blockGroup = 'brandlogoadmin';
        $this->_headerText = Mage::helper('brandlogo')->__('Item Manager');
        $this->_addButtonLabel = Mage::helper('brandlogo')->__('Add Item');
        parent::__construct();
    }


}
