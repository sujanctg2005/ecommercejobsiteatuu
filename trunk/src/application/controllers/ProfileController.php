<?php

class ProfileController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
        
    }

    public function createAction() {
        $this->view->addHelperPath('Zend/Dojo/View/Helper/', 'Zend_Dojo_View_Helper');
        $form = new Application_Form_EmployeeProfileForm();
        $form->Submit->setLabel('Submit');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
                    {
                
                $Username = $form->getValue('Username');
                $Password = $form->getValue('Password');

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
                
                $upload = new Zend_File_Transfer_Adapter_Http();
                $upload->setDestination(APPLICATION_PATH . "/../uploads");
                $va = $upload->getFileInfo();
                
                 $ImagePath = $this->view->baseUrl() ."/../uploads/". $va['ImagePath']['name']; //$form->getValue('ImagePath');

               
               
                try {
                    $upload->receive();
                } catch (Zend_File_Transfer_Exception $e) {
                    $e->getMessage();
                }
                $employeeInfo = new Application_Model_DbTable_EmployeeProfile();
                $addEmployee = $employeeInfo->addEmployee($Username, $Password, $Name, $DOB, $Gender, $MaritialStatus, $Nationality, $Religion, $CurrentAddress, $PermanentAddress, $HomePhone, $Mobile, $OfficePhone, $Email, $AlternativeEmail, $ImagePath);

                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
    }

}

