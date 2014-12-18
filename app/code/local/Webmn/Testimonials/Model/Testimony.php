<?php

class Webmn_Testimonials_Model_Testimony extends Mage_Core_Model_Abstract
{
    protected function _construct(){

       $this->_init("testimonials/testimony");

    }
	
	public function getTestimonials() {
		$testimonials = $this->getCollection();
		return $testimonials;
	}

}
	 