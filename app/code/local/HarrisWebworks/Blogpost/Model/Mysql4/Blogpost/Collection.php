<?php

class HarrisWebworks_Blogpost_Model_Mysql4_Blogpost_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('blogpost/blogpost');
    }
}