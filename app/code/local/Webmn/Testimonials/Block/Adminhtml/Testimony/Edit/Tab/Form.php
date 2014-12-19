<?php
class Webmn_Testimonials_Block_Adminhtml_Testimony_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("testimonials_form", array("legend"=>Mage::helper("testimonials")->__("Item information")));

				
						$fieldset->addField("testimony_name", "text", array(
						"label" => Mage::helper("testimonials")->__("Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "testimony_name",
						));
									
						$fieldset->addField('testimony_filename', 'image', array(
						'label' => Mage::helper('testimonials')->__('Filename'),
						'name' => 'testimony_filename',
						'note' => '(*.jpg, *.png, *.gif)',
						));
									
						$fieldset->addField('testimony_thumb', 'image', array(
						'label' => Mage::helper('testimonials')->__('Thumbnail'),
						'name' => 'testimony_thumb',
						'note' => '(*.jpg, *.png, *.gif)',
						));
						
						$fieldset->addField("testimony_headline", "text", array(
						"label" => Mage::helper("testimonials")->__("Headline"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "testimony_headline",
						));
					
						$fieldset->addField("testimony_description", "textarea", array(
						"label" => Mage::helper("testimonials")->__("Description"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "testimony_description",
						));
					
						//$fieldset->addField("testimony_type", "text", array(
						$fieldset->addField("testimony_type", "select", array(
						"label" => Mage::helper("testimonials")->__("Type"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "testimony_type",
						"value" => "R",
						"values" => array('-1'=>"Please Select..", "R"=>"Residential", "B"=>"Business")
						));
						
						
					
						$fieldset->addField("testimony_mural", "text", array(
						"label" => Mage::helper("testimonials")->__("Mural"),
						"name" => "testimony_mural",
						));
					
						$fieldset->addField("testimony_url", "text", array(
						"label" => Mage::helper("testimonials")->__("URL"),
						"name" => "testimony_url",
						));
						
						$fieldset->addField("testimony_order", "text", array(
						"label" => Mage::helper("testimonials")->__("Order"),
						"name" => "testimony_order",
						));

				if (Mage::getSingleton("adminhtml/session")->getTestimonyData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getTestimonyData());
					Mage::getSingleton("adminhtml/session")->setTestimonyData(null);
				} 
				elseif(Mage::registry("testimony_data")) {
				    $form->setValues(Mage::registry("testimony_data")->getData());
				}
				return parent::_prepareForm();
		}
}
