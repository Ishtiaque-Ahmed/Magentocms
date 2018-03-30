<?php
class HarrisWebworks_Blogpost_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {


        $req=$this->getRequest()->getParams('blogtitle');
        //print_r($req['blogtitle']);
            if(isset($req['blogtitle']))
            {
                Mage::register('custom_var', $req['blogtitle']);
            }

    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/blogpost?id=15 
    	 *  or
    	 * http://site.com/blogpost/id/15 	
    	 */
    	/* 
		$blogpost_id = $this->getRequest()->getParam('id');

  		if($blogpost_id != null && $blogpost_id != '')	{
			$blogpost = Mage::getModel('blogpost/blogpost')->load($blogpost_id)->getData();
		} else {
			$blogpost = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($blogpost == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$blogpostTable = $resource->getTableName('blogpost');
			
			$select = $read->select()
			   ->from($blogpostTable,array('blogpost_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$blogpost = $read->fetchRow($select);
		}
		Mage::register('blogpost', $blogpost);
		*/


		$this->loadLayout(array('default'));
		$this->renderLayout();
    }

}