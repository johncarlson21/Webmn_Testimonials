<?php  

class Webmn_Testimonials_Block_Adminhtml_Testimonials extends Mage_Adminhtml_Block_Template {
	public function __construct()
	{

		$this->_controller = "adminhtml_testimonials";
		$this->_blockGroup = "testimonials";
		$this->_mode = 'import';
		$this->_headerText = Mage::helper("testimonials")->__("Testimony Importer");
		parent::__construct();
		
	}
}