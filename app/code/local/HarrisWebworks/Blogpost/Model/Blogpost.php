<?php

class HarrisWebworks_Blogpost_Model_Blogpost extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('blogpost/blogpost');
    }
}