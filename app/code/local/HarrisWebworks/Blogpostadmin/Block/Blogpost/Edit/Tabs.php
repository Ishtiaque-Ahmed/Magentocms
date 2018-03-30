<?php

class HarrisWebworks_Blogpostadmin_Block_Blogpost_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('blogpostadmin_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('blogpost')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('blogpost')->__('Item Information'),
          'title'     => Mage::helper('blogpost')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('blogpost/adminhtml_blogpost_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}
