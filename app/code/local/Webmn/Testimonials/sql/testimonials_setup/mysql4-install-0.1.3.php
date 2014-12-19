<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
DROP TABLE IF EXISTS testimony;



CREATE TABLE IF NOT EXISTS testimony (

  `testimony_id` int(11) NOT NULL AUTO_INCREMENT,

  `testimony_name` varchar(250) NOT NULL,

  `testimony_filename` varchar(250) NOT NULL,

  `testimony_thumb` varchar(250) NOT NULL,

  `testimony_headline` varchar(250) NOT NULL,

  `testimony_description` text NOT NULL,

  `testimony_type` varchar(2) NOT NULL,

  `testimony_mural` varchar(100) NOT NULL,

  `testimony_url` varchar(250) NOT NULL,
  
  `tesimony_order` int(11) NOT NULL,

  PRIMARY KEY (`testimony_id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
SQLTEXT;

$installer->run($sql);

$installer->endSetup();
	 