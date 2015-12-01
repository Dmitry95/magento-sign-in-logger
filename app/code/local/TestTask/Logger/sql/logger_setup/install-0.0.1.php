<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 30.11.15
 * Time: 22:25
 */

$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('logger/login_history'))
    ->addColumn('log_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'ID')
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => false,
        'default'   => '0',
    ), 'Entity Id')
    ->addColumn('column_name', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'default' => Varien_Db_Ddl_Table::TIMESTAMP_INIT
    ), 'Time of login')
    ->addIndex($installer->getIdxName('logger/login_history', array('entity_id')),
        array('entity_id'))
    ->addForeignKey($installer->getFkName('logger/login_history', 'entity_id', 'customer/entity', 'entity_id'),
        'entity_id', $installer->getTable('customer/entity'), 'entity_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE);
$installer->getConnection()->createTable($table);

$installer->endSetup();