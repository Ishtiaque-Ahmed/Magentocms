<?php
class HarrisWebworks_Blogpostadmin_Block_Blogpost extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'blogpostadmin_blogpostcontroller';
    $this->_blockGroup = 'blogpostadmin';
    $this->_headerText = Mage::helper('blogpostadmin')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('blogpostadmin')->__('Add Item');
    //parent::__construct();
  }
}
