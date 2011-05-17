<?php

Zend_View_Helper_PaginationControl::setDefaultViewPartial('controls.phtml');

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initActionHelpers() {
        Zend_Controller_Action_HelperBroker::addHelper(
                        new APP_Action_Helper_CustomActionHelper()
        );
    }

    protected function _initMailSettings()
    {
       $emailConfig = $this->getOption('email');

        $host = $emailConfig['options']['host'];

        unset($emailConfig['options']['host']);

        $mailTransport = new Zend_Mail_Transport_Smtp($host, $emailConfig['options']);

        Zend_Mail::setDefaultTransport($mailTransport);
    }

    protected function _initNavigation()
    {
        $actionhelper = Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper');

        $this->bootstrap('layout');

        $layout = $this->getResource('layout');

        $view = $layout->getView();

        $config = new Zend_Config_XML(
                APPLICATION_PATH . '/configs/navigation.xml',
                $actionhelper->getNavigationRootNodeName());

        $navigation = new Zend_Navigation($config);
//        var_dump($view);
//        exit;

        $view->navigation($navigation);
    }
}

