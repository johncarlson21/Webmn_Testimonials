<?php
class Webmn_Testimonials_Block_Adminhtml_Testimony_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("testimony_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("testimonials")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("testimonials")->__("Item Information"),
				"title" => Mage::helper("testimonials")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("testimonials/adminhtml_testimony_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
