<?php

class HarrisWebworks_Blogpost_Model_Blogpost extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('blogpost/blogpost');
    }
    protected function _beforeSave()
    {
        $this->_dataSaveAllowed = true;

        if(empty($this->getTitle()))
        {
            #cancel save
            $this->_dataSaveAllowed = false;
        }

        return parent::_beforeSave();
    }
}