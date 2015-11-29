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
        $date = new Zend_Date(Mage::getModel('core/date')->timestamp(time(), false, Mage::app()->getLocale()->getLocaleCode()));

        Mage::log('User id: '. $customer->getId() .' - '.$customer->getName().' ('.$customer->getEmail() . ') has logged in at ' . $date->toString(), null, 'customer.log');
    }
}