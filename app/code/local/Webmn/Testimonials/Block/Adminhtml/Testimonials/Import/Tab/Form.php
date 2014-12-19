<?php
class Webmn_Testimonials_Block_Adminhtml_Testimonials_Import_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("testimonials_form", array("legend"=>Mage::helper("testimonials")->__("Import information")));
				
				$fieldset->addField('import_file', 'file', array(
				  'label'     => Mage::helper('testimonials')->__('Upload'),
				  'value'  => 'Uplaod',
				  'name'	=> 'import_file',
				  'disabled' => false,
				  'readonly' => true,
				  'tabindex' => 1
				));
				
		}		
}