<?php

/**
 * Copyright [2014] [Harriswebworks]
 *
 * @package   Harriswebworks_StoreMaintenance
 * @author    Harriswebworks
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 */
 
class Harriswebworks_Theme_Model_Urltype
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'cms-page-view', 'label'=>Mage::helper('harriswebworks_theme')->__('CMS Pages')),
            array('value'=>'catalog-category-view', 'label'=>Mage::helper('harriswebworks_theme')->__('Category Pages')),
			array('value'=>'catalog-product-view', 'label'=>Mage::helper('harriswebworks_theme')->__('Product Pages')),
        );
    }

}