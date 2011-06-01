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

//        if(ispost())
//        {
//            $data -> get from the request;
//            check if the password exist otherwise set error message
//            update table
//
//        }


        if ($this->getRequest()->isPost()) {
            echo "testing";
            $formData = $this->getRequest()->getPost();
            $employeeInfo = new Application_Model_DbTable_EmployeeProfile();

            if ($form->isValid($formData)) {
                echo "testing";
                if($employeeInfo->checkAvailable($formData['OldPassword']))
                {
                    
                }
            }
            else
            {
                $this->view->errorMessage = $formData['OldPassword'] ." doesn't match. Please try again.";
                $form->populate($formData);
                $form->getElement('OldPassword')->setValue('');
                return;
            }
                $OldPassword = $form->getValue('OldPassword');
                $NewPassword = $form->getValue('NewPassword');
                $RePassword = $form->getValue('RePassword');
            }
        }
}



