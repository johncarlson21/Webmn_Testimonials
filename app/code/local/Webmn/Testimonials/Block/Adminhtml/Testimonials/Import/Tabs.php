<?php
class Webmn_Testimonials_Block_Adminhtml_Testimonials_Import_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("testimonials_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("testimonials")->__("Import Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("testimonials")->__("Import Information"),
				"title" => Mage::helper("testimonials")->__("Import Information"),
				"content" => $this->getLayout()->createBlock("testimonials/adminhtml_testimonials_import_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
