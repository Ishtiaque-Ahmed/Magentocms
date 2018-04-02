<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 02-Apr-18
 * Time: 12:43 PM
 */

$installer = $this;
$connection = $installer->getConnection();

$installer->startSetup();


$definition='datetime DEFAULT CURRENT_TIMESTAMP';

$installer->getConnection()
    ->changeColumn($installer->getTable('blogpost/blogpost'),
        'created_at','created_at',$definition
       /* array(
            'type' => Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
            'nullable' => true,
            'default' => GETDATE(),
            'comment' => 'Created At'
        )*/
    );
$installer->getConnection()
    ->changeColumn($installer->getTable('blogpost/blogpost'),
        'update_time','updated_at',$definition
      /*  array(
            'type' => Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
            'nullable' => true,
            'default' => GETDATE(),
            'comment' => 'Updated At'
        )*/
    );

$installer->endSetup();