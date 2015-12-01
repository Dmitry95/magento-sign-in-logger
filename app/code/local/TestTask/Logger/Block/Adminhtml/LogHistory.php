<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 30.11.15
 * Time: 18:29
 */

class TestTask_Logger_Block_Adminhtml_LogHistory
    extends Mage_Core_Block_Template
{
    public function getLogHistory()
    {
        $logs = Mage::getModel('logger/loginHistory')->getCollection();
        return $logs;
    }

    public function getCustomers()
    {
        $customersModel = Mage::getModel('customer/customer');
        return $customersModel;
    }
}