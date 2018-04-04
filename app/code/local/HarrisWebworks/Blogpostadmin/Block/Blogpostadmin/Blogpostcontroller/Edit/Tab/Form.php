<?php

class HarrisWebworks_Blogpostadmin_Block_Blogpost_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('blogpost_form', array('legend'=>Mage::helper('blogpost')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('blogpost')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('blogpost')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('blogpost')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('blogpost')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('blogpost')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('blogpost')->__('Content'),
          'title'     => Mage::helper('blogpost')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getBlogpostData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getBlogpostData());
          Mage::getSingleton('adminhtml/session')->setBlogpostData(null);
      } elseif ( Mage::registry('blogpost_data') ) {
          $form->setValues(Mage::registry('blogpost_data')->getData());
      }
      return parent::_prepareForm();
  }
}