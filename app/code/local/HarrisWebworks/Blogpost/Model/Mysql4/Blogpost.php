<?php

class HarrisWebworks_Blogpost_Model_Mysql4_Blogpost extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the blogpost_id refers to the key field in your database table.
        $this->_init('blogpost/blogpost', 'blogpost_id');
    }
}