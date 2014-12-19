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
			$this->_title($this->__("Testimonials"));
			$this->_title($this->__("Import Testimonies"));
			
			$this->loadLayout();
			$this->_setActiveMenu("testimonials/testimonials");
			$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
			$this->_addContent($this->getLayout()->createBlock("testimonials/adminhtml_testimonials_import"))->_addLeft($this->getLayout()->createBlock("testimonials/adminhtml_testimonials_import_tabs"));
			$this->renderLayout();
		}
		
		/*public function fixorderAction() {
			$testimonials = Mage::getModel('testimonials/testimony')->getTestimonialsASC();
			$z = 355;
			foreach($testimonials as $t) {
				$t->setTestimonyOrder($z);
				$t->save();
				$z--;
			}
		}*/
		
		public function importsaveAction() {
			try {
				if (isset($_FILES)){
					if ($_FILES['import_file']['name']) {
						$path = Mage::getBaseDir('media') . DS . 'testimonials' . DS .'testimony' . DS . 'tmp' . DS;
						$uploader = new Varien_File_Uploader('import_file');
						$uploader->setAllowedExtensions(array('zip'));
						$uploader->setAllowRenameFiles(false);
						$uploader->setFilesDispersion(false);
						$destFile = $path.$_FILES['import_file']['name'];
						$filename = $uploader->getNewFileName($destFile);
						$uploader->save($path, $filename);
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("File Uploaded!"));
						// unzip file
						@exec("cd ".$path."; unzip ".$filename,$cout,$ret);
						/*Mage::getSingleton("adminhtml/session")->addSuccess(print_r($cout,true));
						Mage::getSingleton("adminhtml/session")->addSuccess(print_r($ret,true));
						Mage::getSingleton("adminhtml/session")->addSuccess("unzip ".$path.$filename);*/
						
						$importFile = $path."import.csv";
						if (($handle = fopen($importFile, "r")) !== FALSE) {
							while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
								$tdata = array(
									'testimony_name' => isset($data[2]) && !empty($data[2]) ? $data[2] : '',
									'testimony_filename' => isset($data[0]) && !empty($data[0]) ? $data[0] : '',
									'testimony_thumb' => isset($data[1]) && !empty($data[1]) ? $data[1] : '',
									'testimony_headline' => isset($data[3]) && !empty($data[3]) ? $data[3] : '',
									'testimony_description' => isset($data[4]) && !empty($data[4]) ? $data[4] : '',
									'testimony_type' => isset($data[5]) && !empty($data[5]) ? $data[5] : '',
									'testimony_mural' => isset($data[6]) && !empty($data[6]) ? $data[6] : '',
									'testimony_url' => isset($data[7]) && !empty($data[7]) ? $data[7] : '',
									'testimony_order' => 0
								);
								if (file_exists($path.$data[0]) && file_exists($path.$data[1])) {
									if (file_exists(str_replace(DS.'tmp', '', $path).$data[0])) {
										// need to rename the file so use a timestamp
										$file = str_replace(".jpg", "_".time().".jpg", $data[0]);
										$nfile = str_replace(DS.'tmp', '', $path).$file;
										@rename($path.$data[0], $nfile);
										$tdata['testimony_filename'] = 'testimonials/testimony/'.$file;
									} else {
										$nfile = str_replace(DS.'tmp', '', $path).$data[0];
										@rename($path.$data[0], $nfile);
									}
									if (file_exists(str_replace(DS.'tmp', '', $path).$data[1])) {
										// need to rename the file so use a timestamp
										$file = str_replace(".jpg", "_".time().".jpg", $data[1]);
										$nfile = str_replace(DS.'tmp', '', $path).$file;
										@rename($path.$data[1], $nfile);
										$tdata['testimony_thumb'] = 'testimonials/testimony/'.$file;
									} else {
										$nfile = str_replace(DS.'tmp', '', $path).$data[1];
										@rename($path.$data[1], $nfile);
									}
									$model = Mage::getModel("testimonials/testimony")
									->addData($tdata)
									->save();
								} else {
									Mage::getSingleton("adminhtml/session")->addError(Mage::helper("adminhtml")->__("Testimony File: ".$data[0].", or the thumb file was not found!"));
									@unlink($path.$data[0]);
									@unlink($path.$data[1]);
								}
							}
							fclose($handle);
						}
						
						@unlink($path.$filename);
						@unlink($path."import.csv");
						
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Testimonies Imported"));
					} else {
						Mage::getSingleton("adminhtml/session")->addError(Mage::helper("adminhtml")->__("That is not a valid file"));
					}
				}
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/import', array('id' => $this->getRequest()->getParam('id')));
				return;
        	}
			
			$this->_redirect("*/*/import");
		}
		
}