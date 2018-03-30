<?php
$installer = $this;
$installer->startSetup();
$installer->run("
	ALTER TABLE {$this->getTable('blog')}
	CHANGE COLUMN `filename` `filename` text NULL DEFAULT ,
	CHANGE COLUMN `created_time` `created_time` datetime CURRENT_TIMESTAMP DEFAULT ,
	ADD COLUMN `sub_title` VARCHAR(255) NOT NULL AFTER `title`;
	");
$installer->endSetup();
