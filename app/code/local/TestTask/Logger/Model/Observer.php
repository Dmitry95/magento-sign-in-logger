<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 29.11.15
 * Time: 13:14
 */

class TestTask_Logger_Model_Observer
{
    public function logCustomer($observer)
    {
        $customer = $observer->getCustomer();

        $logData = array('entity_id'=>$customer->getId());
        $log = Mage::getModel('logger/loginHistory')->setData($logData);
        $log->save();

        if(Mage::getStoreConfig('logger/logger_group/active', Mage::app()->getStore()))
        {
            $date = new Zend_Date(Mage::getModel('core/date')->timestamp(time(), false, Mage::app()->getLocale()->getLocaleCode()));
            Mage::log('User id: '. $customer->getId() .' - '.$customer->getName().' ('.$customer->getEmail() . ') has logged in at ' . $date->toString(), null, 'customer.log');
        }
    }
}