<?php
	
class Webmn_Testimonials_Block_Adminhtml_Testimonials_Import extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "import_id";
				$this->_blockGroup = "testimonials";
				$this->_mode = 'import';
				$this->_controller = "adminhtml_testimonials";
				
				$this->_removeButton('delete');
				$this->_removeButton('save');
				$this->_removeButton('reset');

				$this->_addButton("import", array(
					"label"     => Mage::helper("testimonials")->__("Import"),
					"onclick"   => "importandcontinue()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "
							function importandcontinue(){
								editForm.submit($('edit_form').action+'back/import/');
							}
						";
		}

		public function getHeaderText()
		{
				return Mage::helper("testimonials")->__("Import Testimonials");
		}
}