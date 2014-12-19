<?php

class Webmn_Testimonials_Model_Testimony extends Mage_Core_Model_Abstract
{
    protected function _construct(){

       $this->_init("testimonials/testimony");

    }
	
	public function getTestimonials() {
		$testimonials = $this->getCollection()->setOrder('testimony_order', 'ASC');
		return $testimonials;
	}
	
	public function getTestimonialsASC() {
		$testimonials = $this->getCollection()->setOrder('testimony_id', 'ASC');
		return $testimonials;
	}

}
	 