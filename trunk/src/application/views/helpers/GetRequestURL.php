<?php
class Zend_View_Helper_GetRequestURL extends Zend_View_Helper_Abstract
{

    public function getRequestURL()
    {
        $actionhelper = Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper');
        return $actionhelper->getRequests();
    }
}

?>