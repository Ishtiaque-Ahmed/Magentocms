<?php
require_once ("lib/Varien/File/Uploader.php");
class HarrisWebworks_Blogpost_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function upload(){
        $result=NULL;
        // all "image" is name of the input.
        if( !empty($_FILES['simage']['name']) ){
            $result='not working';
            try {
                $uploader = new Varien_File_Uploader($_FILES['simage']);
               // $uploader->setAllowedExtensions(array('jpg', 'jpeg', 'png'));
                $uploader->setAllowRenameFiles(true);
                $uploader->setFilesDispersion(false);
                $path = Mage::getBaseDir('media') . DS.'tempimage'.DS; // where we save images
                $result = $uploader->save($path,$_FILES['simage']['name']);
            } catch (Exception $e) {
                $result= $e->getMessage();
            }
        }
        return $result;
    }
    public function process_url($title)
    {
        $blog_url=preg_replace("/[^0-9a-zA-Z ]/", "", $title);
        $blog_url=str_replace(' ','-',$blog_url); $blog_url=strtolower($blog_url);
        return $blog_url;
    }
}