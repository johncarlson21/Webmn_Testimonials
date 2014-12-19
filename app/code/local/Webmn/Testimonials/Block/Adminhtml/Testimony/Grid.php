<?php

class Webmn_Testimonials_Block_Adminhtml_Testimony_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("testimonyGrid");
				$this->setDefaultSort("testimony_order");
				$this->setDefaultDir("ASC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("testimonials/testimony")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("testimony_id", array(
				"header" => Mage::helper("testimonials")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "testimony_id",
				));
                
				$this->addColumn("testimony_name", array(
				"header" => Mage::helper("testimonials")->__("Name"),
				"index" => "testimony_name",
				));
				$this->addColumn("testimony_headline", array(
				"header" => Mage::helper("testimonials")->__("Headline"),
				"index" => "testimony_headline",
				));
				$this->addColumn("testimony_type", array(
				"header" => Mage::helper("testimonials")->__("Type"),
				"index" => "testimony_type",
				));
				$this->addColumn("testimony_mural", array(
				"header" => Mage::helper("testimonials")->__("Mural"),
				"index" => "testimony_mural",
				));
				$this->addColumn("testimony_url", array(
				"header" => Mage::helper("testimonials")->__("URL"),
				"index" => "testimony_url",
				));
				$this->addColumn("testimony_order", array(
				"header" => Mage::helper("testimonials")->__("Order"),
				"index" => "testimony_order",
				));
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('testimony_id');
			$this->getMassactionBlock()->setFormFieldName('testimony_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_testimony', array(
					 'label'=> Mage::helper('testimonials')->__('Remove Testimony'),
					 'url'  => $this->getUrl('*/adminhtml_testimony/massRemove'),
					 'confirm' => Mage::helper('testimonials')->__('Are you sure?')
				));
			return $this;
		}
			

}