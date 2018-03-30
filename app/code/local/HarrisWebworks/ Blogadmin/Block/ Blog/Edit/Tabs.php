<?php

class HarrisWebworks_ Blogadmin_Block_ Blog_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId(' blogadmin_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper(' blog')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper(' blog')->__('Item Information'),
          'title'     => Mage::helper(' blog')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock(' blog/adminhtml_ blog_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}
