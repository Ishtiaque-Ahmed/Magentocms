<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17-Apr-18
 * Time: 3:44 PM
 */

// app/code/local/Envato/WidgetLinks/Model/Options.php
class Digitab_Brandlogo_Model_Options {
    /**
     * Provide available options as a value/label array
     *
     * @return array
     */
    public function toOptionArray() {
        return array(
            array('value' => 'print', 'label' => 'Print Button'),
            array('value' => 'email', 'label' => 'Inquiry Email Button'),
        );
    }
}