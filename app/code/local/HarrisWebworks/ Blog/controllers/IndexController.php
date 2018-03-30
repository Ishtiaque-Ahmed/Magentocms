<?php
class HarrisWebworks_Blog_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/ blog?id=15 
    	 *  or
    	 * http://site.com/ blog/id/15 	
    	 */
    	/* 
		$ blog_id = $this->getRequest()->getParam('id');

  		if($ blog_id != null && $ blog_id != '')	{
			$ blog = Mage::getModel(' blog/ blog')->load($ blog_id)->getData();
		} else {
			$ blog = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($ blog == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$ blogTable = $resource->getTableName(' blog');
			
			$select = $read->select()
			   ->from($ blogTable,array(' blog_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$ blog = $read->fetchRow($select);
		}
		Mage::register(' blog', $ blog);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}