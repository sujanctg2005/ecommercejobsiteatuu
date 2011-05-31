<?php

class ChangeController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function passwordAction()
    {
        $form = new Application_Form_EmployeeChangePassword();
        $form->setUserName(
        Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper')->getUserName());
        $form->Submit->setLabel('Submit');
        $this->view->form = $form;
    }


}



