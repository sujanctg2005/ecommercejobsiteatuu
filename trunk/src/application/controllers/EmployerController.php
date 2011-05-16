<?php

class EmployerController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

    public function blockAction() {
        // action body
    }

    public function listemployerAction() {
        $employerhandler = new Application_Model_EmployerHandler();
        
        $this->view->paginator = APP_Action_Helper_CustomActionHelper::
                getPaginationControl($employerhandler->getListOfEmployers(),
                        $this->getRequest()->getParam('page'));
    }
}

