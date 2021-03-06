<?php
class HarrisWebworks_Blogpost_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {


        $req=$this->getRequest()->getParams('blogtitle');
        //$file=$this->getRequest()->getFile
     //  var_dump($req);echo '<br>';
      //var_dump($_POST);
    //  print_r($_FILES);



        //print_r($req['blogtitle']);
            if(isset($req['blogtitle']))
            {


                $model=Mage::getModel('blogpost/blogpost');

                $model->title=$req['blogtitle'];
                $model->content=$req['blogcontent'];
              // var_dump(Mage::helper('blogpost/data')->upload());
                $path=Mage::helper('blogpost/data')->upload();
                $model->filename='tempimage'.DS.$path['file'];

                $images='tempimage'.DS.$path['file'];
               // var_dump($images);
                Mage::register('custom_var',$images );
                $model->status=1;

                try {
                    $model->save();
                    $blogId= $model->getId();
                    $url=preg_replace("/[^0-9a-zA-Z ]/", "", $req['blogtitle']);
                    $url=str_replace(' ','-',$url);
                    $url=strtolower($url);


                    Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The baz has been saved.'));

                    Mage::getModel('core/url_rewrite')
                        ->setIsSystem(true)
                        ->setIdPath('blogpost/index/pagination/?id='.$blogId)
                        ->setTargetPath('blogpost/index/pagination/?id='.$blogId)
                        ->setRequestPath('blogpost/index/pagination/'.$url)
                        ->save();


                    // $this->_redirect('*/*/');

                    //return;
                }
                catch (Mage_Core_Exception $e) {
                    Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                }


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
    public function paginationAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
    public function sendAction()
    {

      $emailTemplate = Mage::getModel('core/email');
      $emailTemplate->setFromName('Your Store Name');

      $body = 'Test from Magento';
      $subject = 'No subject';
      $emailTemplate->setBody($body);
      $emailTemplate->setSubject($subject);
      $emailTemplate->setType('html');
      $emailTemplate->setToEmail('ist1205.buet@gmail.com');
      try
      {
        $emailTemplate->send();
        echo 'success';
      }
      catch (Exception $e)
      {
        print_r($e->getMessage());
      }
    }


}