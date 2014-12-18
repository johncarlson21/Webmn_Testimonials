<?php

class Webmn_Testimonials_Adminhtml_TestimonialsController extends Mage_Adminhtml_Controller_Action
{
		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("testimonials/testimonials")->_addBreadcrumb(Mage::helper("adminhtml")->__("Import Tesimonies"),Mage::helper("adminhtml")->__("Import Tesimonies"));
				return $this;
		}
		
		public function indexAction() 
		{
			    $this->_title($this->__("Testimonials"));
			    $this->_title($this->__("Import Testimonies"));

				$this->_initAction();
				$this->renderLayout();
		}
		
		public function importAction() {
			Mage::getSingleton("adminhtml/session")->addSuccess("got here");
			print_r('here we are');
		}
		
}