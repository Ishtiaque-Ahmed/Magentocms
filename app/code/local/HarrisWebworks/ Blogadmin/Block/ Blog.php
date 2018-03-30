<?php
class HarrisWebworks_ Blogadmin_Block_Adminhtml_ Blog extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = ' blogadmin';
    $this->_blockGroup = ' blogadmin';
    $this->_headerText = Mage::helper(' blogadmin')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper(' blogadmin')->__('Add Item');
    parent::__construct();
  }
}
