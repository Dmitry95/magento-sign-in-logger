<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 30.11.15
 * Time: 21:41
 */

class TestTask_Logger_Model_Resource_LoginHistory_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('logger/login_history');
    }
}