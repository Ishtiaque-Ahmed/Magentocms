<?php
class Digitab_Brandlogo_Adminhtml_BrandlogoController extends Mage_Adminhtml_Controller_action
{

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
    public function exportCsvAction()
    {
        $fileName   = 'employee.csv';
        $content    = $this->getLayout()->createBlock('brandlogo/adminhtml_brandlogo_grid')->getCsv();

        $this->_prepareDownloadResponse($fileName, $content);
    }
    public  function editAction()
    {
        $id=$this->getRequest()->getParams();
        var_dump($id['id']);
        $this->_redirect('*/*/');



    }
    public  function  newAction()
    {

        $this->loadLayout();
        $new_layout=null;
        try
        {
           $new_layout= $this->getLayout()->createBlock('brandlogo/adminhtml_brandlogo_edit_form');

        }
        catch (Exception $e)
        {
            var_dump($e->getMessage());
            die();
        }


        $this->_addContent($new_layout);
           // ->_addLeft($this->getLayout()->createBlock('form/adminhtml_form_edit_tabs'));
        $this->renderLayout();

      //  $this->_redirect('*/*/');

    }
    public function  massDeleteAction()
    {
        var_dump('nothign');
    }



}