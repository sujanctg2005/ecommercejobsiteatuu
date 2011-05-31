<?php

class ResumeController extends Zend_Controller_Action
{
    protected $_resumeLoader;

    public function init()
    {
        require_once 'upload.php';
        $this->_resumeLoader = new Application_Model_ResumeList();
    }

    public function indexAction()
    {
        // action body
    }

    public function editAction()
    {
        $actionhelper = Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper');
                $data = $this->_resumeLoader
                        ->getResumeDetail($actionhelper->getUserID());
       $form = new Application_Form_EmployeeUpdateProfile();
       $form->Submit->setLabel('Update');
       $this->view->form = $form;

       if($this->getRequest()->isPost()){
           $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $UserID = $actionhelper->getUserID();
                $Name = $form->getValue('Name');
                $DOB = $form->getValue('DateOfBirth');
                $optionGender = $form->getElement('Gender')->getMultiOptions();
                $Gender = $optionGender[$form->getValue('Gender')];
                $optionStatus = $form->getElement('MaritialStatus')->getMultiOptions();
                $MaritialStatus = $optionStatus[$form->getValue('MaritialStatus')];
                $Nationality = $form->getValue('Nationality');
                $Religion = $form->getValue('Religion');
                $CurrentAddress = $form->getValue('CurrentAddress');
                $PermanentAddress = $form->getValue('PermanentAddress');
                $HomePhone = $form->getValue('HomePhone');
                $Mobile = $form->getValue('Mobile');
                $OfficePhone = $form->getValue('OfficePhone');
                $Email = $form->getValue('Email');
                $AlternativeEmail = $form->getValue('AlternativeEmail');
                $ImagePath = Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper')->
                        returnImage($_FILES['ImagePath'],$this->view->baseUrl());

                $employeeInfo = new Application_Model_DbTable_EmployeeProfile();
                $updateEmployeeInfo = $employeeInfo->updateEmplyeeInfo($UserID, $Name, $DOB, $Gender,
                                        $MaritialStatus, $Nationality, $Religion, $CurrentAddress,
                                        $PermanentAddress, $HomePhone, $Mobile, $OfficePhone, $Email,
                                        $AlternativeEmail, $ImagePath);

                $this->_helper->redirector('index');
            }
            else {
                $form->populate($data[0]);
            }
       }
       else {
            $EmployeeID = $actionhelper->getUserID();
            if ($EmployeeID > 0) {
                $EmployeeInfo = new Application_Model_DbTable_EmployeeProfile();
                
                $form->populate($data[0]);
            }
        }
    }

    public function viewAction()
    {
        $actionhelper = Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper');
        $data = $this->_resumeLoader
                ->getResumeDetail($actionhelper->getUserID());
        $this->view->imagepath = $data[0]['ImagePath'];
        $this->view->view = $data;
    }

    public function emailAction()
    {
        // action body
    }

    public function deleteAction()
    {
        // action body
    }


}









