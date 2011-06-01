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
        $form->setMethod("post");
        $this->view->form = $form;

        $employeeInfo = new Application_Model_DbTable_EmployeeProfile();
        $UserID = Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper')->getUserID();
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();

            $OldPassword = $formData['OldPassword'];
            $NewPassword = $formData['NewPassword'];
            $RePassword = $formData['Repassword'];

            if ($form->isValid($formData)) {
            $md5oldPassword = Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper')
                    ->md5encrypt($OldPassword);

            $md5newPassword = Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper')
                    ->md5encrypt($NewPassword);

                if($employeeInfo->checkAvailable($md5oldPassword))
                {
                    $updatePassword = $employeeInfo->updatePassword($UserID,
                            $md5newPassword);
                    $this->_helper->redirector('index');
                }
            else
            {
                $this->view->errorMessage = "Old password doesn't match. Please try again.";
                $form->populate($formData);
                //$form->getElement('OldPassword')->setValue('');
                return;
                }
            }
            }
        }
}



