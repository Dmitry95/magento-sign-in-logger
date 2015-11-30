<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 30.11.15
 * Time: 21:19
 */

class TestTask_Logger_Model_LoginHistory
    extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('logger/login_history');
    }
}