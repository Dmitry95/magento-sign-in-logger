<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 01.12.15
 * Time: 17:03
 */

class TestTask_Logger_Adminhtml_LoggerController
    extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('customer/customer');
        $this->renderLayout();

    }
}