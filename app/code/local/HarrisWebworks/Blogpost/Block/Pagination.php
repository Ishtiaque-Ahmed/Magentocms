<?php
class HarrisWebworks_Blogpost_Block_Pagination extends Mage_Core_Block_Template
{
    public function __construct()
    {
        parent::__construct();
        //set your own collection (get data from database so you can list it)
        $collection = Mage::getModel('blogpost/blogpost')->getCollection();
        $this->setCollection($collection);
    }
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        //this is toolbar we created in the previous step
        $pager = $this->getLayout()->createBlock('page/html_pager', 'custom.pager');
        //get collection of your model
        $collection = Mage::getModel('blogpost/blogpost')->getCollection();
        $pager->setAvailableLimit(array(2=>2,5=>5,10=>10,20=>20,'all'=>'all'));
        //this is where you set what options would you like to  have for sorting your grid. Key is your column in your database, value is just value that will be shown in template
       // $toolbar->setAvailableOrders(array('created_at'=> 'Created Time','id'=>'ID'));
        //$toolbar->setDefaultOrder('id');
        //$toolbar->setDefaultDirection("asc");
        $pager->setCollection($collection);
        $this->setChild('toolbar', $pager);
        $this->getCollection()->load();
        return $this;
    }

    //this is what you call in your .phtml file to render toolbar
    public function getToolbarHtml()
    {
        return $this->getChildHtml('toolbar');
    }
}