<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17-Apr-18
 * Time: 7:09 PM
 */

class Digitab_Brandlogo_Model_Responsive {
    /**
     * Provide available options as a value/label array
     *
     * @return array
     */
    public function toOptionArray() {
        return array(
            array('value' => 'Yes', 'label' => 'Yes'),
            array('value' => 'No', 'label' => 'No'),
        );
    }
}