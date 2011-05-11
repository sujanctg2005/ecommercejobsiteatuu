<?php

Zend_View_Helper_PaginationControl::setDefaultViewPartial('controls.phtml');

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initActionHelpers() {
        Zend_Controller_Action_HelperBroker::addHelper(
                        new APP_Action_Helper_CustomActionHelper()
        );
    }
}

