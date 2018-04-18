<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17-Apr-18
 * Time: 3:39 PM
 *
 *  <link_options>
<label>Link Options</label>
<visible>1</visible>
<required>1</required>
<type>multiselect</type>
<source_model>brandlogo/options</source_model>
</link_options>
 */
class Digitab_Brandlogo_Block_Links extends Mage_Core_Block_Abstract  implements Mage_Widget_Block_Interface{


    protected function _prepareLayout() {
        $scripts = '<script async src="https://cdn.ampproject.org/v0.js"></script> <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>';
        if ($head = $this->getLayout()->getBlock('head')) {
            try{
                //Mage::app()->getLayout()->getBlock('head')->addJs('js/calendar/calendar.js');
            }catch (Exception $e)
            {
                var_dump($e->getMessage());
                die();
            }
        }
        return parent::_prepareLayout();
    }




    protected function _toHtml() {
        $html = '<amp-youtube ';
        $scripts = '<script async src="https://cdn.ampproject.org/v0.js"></script> <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>';
        //$html.=$scripts;
       // $link_options = $this->_getData('link_options');
        $width=$this->_getData('set_width');
        $html.=' width='.$width.' ';

        $height=$this->_getData('set_height');

        $html.=' height='.$height.' ';

        $url=$this->_getData('video_link');
        $url_array=explode('=',$url);


        $video_id=$url_array[count($url_array)-1];
        if(count($url_array)>1)

        {
            $html.=' data-videoid='.$video_id.' ';
        }
        else
        {
            $url_array=explode('/',$url);
            $video_id=$url_array[count($url_array)-1];

            $html.=' data-live-channelid='.$video_id.' ';

        }

        $responsive=$this->_getData('is_responsive');
        $autoplay=$this->_getData('autoplay');
        if($responsive=='Yes')$html.=' layout="responsive" ';
        if($autoplay=='Yes')$html.= ' autoplay ';

        $html.=' >  ';


        $html.= '</amp-youtube>';



        /*$arr_options = explode(',', $link_options);

        if (is_array($arr_options) && count($arr_options)) {
            foreach ($arr_options as $option) {
                Switch ($option) {
                    case 'print':
                        $html .= '<div><a href="javascript: window.print();">Print</a></div>';
                        break;
                    case 'email':
                        $html .= '<div><a href="https://www.facebook.com/">Contact Us</a></div>';
                        break;
                }
            }
        }*/
        $html.='<div>'.$width.'</div>';

        return $html;
    }



}