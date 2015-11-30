<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 30.11.15
 * Time: 18:29
 */

class TestTask_Logger_Block_LogHistory
    extends Mage_Core_Block_Template
{
    public function getLogHistory()
    {
        $getInfoHelper = Mage::helper('logger/getInfo');
        $logsArray = $getInfoHelper->getCustomerLogList();
        return $logsArray;
    }
}