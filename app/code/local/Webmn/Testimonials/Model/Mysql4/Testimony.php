<?php
class Webmn_Testimonials_Model_Mysql4_Testimony extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("testimonials/testimony", "testimony_id");
    }
}