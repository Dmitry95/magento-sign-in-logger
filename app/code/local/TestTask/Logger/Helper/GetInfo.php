<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 30.11.15
 * Time: 15:35
 */

class TestTask_Logger_Helper_GetInfo
{
    public function getCustomerLogList($logFileName = 'customer.log')
    {
        $baseDir = Mage::getBaseDir();
        $logFilePath = $baseDir.DS.'var'.DS.'log'.DS.$logFileName;
        $handle = fopen($logFilePath, 'r') or die('Cannot open file: '.$logFilePath);

        $logArray = [];
        while (($line = fgets($handle)) !== false) {
            $posOfUserId = strpos($line, 'User id: ') + 9;
            $posOfUserName = strpos($line, ' - ', $posOfUserId) + 3;
            $posOfUserEmail = strpos($line, ' (', $posOfUserName) + 2;
            $posOfLogTime = strpos($line, ') has logged in at ', $posOfUserEmail) + 19;
            array_push($logArray, [
                'userId' => substr($line, $posOfUserId, $posOfUserName - 3 - $posOfUserId),
                'userName' => substr($line, $posOfUserName, $posOfUserEmail - 2 - $posOfUserName),
                'userEmail' => substr($line, $posOfUserEmail, $posOfLogTime - 19 - $posOfUserEmail),
                'logTime' => substr($line, $posOfLogTime)
            ]);
        }

        return $logArray;
    }
}