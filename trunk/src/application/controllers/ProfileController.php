<?php

class ProfileController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function createAction()
    {
       $form = new Application_Form_EmployeeProfileForm();
       $form->Submit->setLabel('Submit');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $Name=$form->getValue('Name' );
                $DOB=$form->getValue('DateOfBirth');
                $Gender=$form->getValue('Gender');
                $MaritialStatus=$form->getValue('MaritialStatus');
                $Nationality=$form->getValue('Nationality');
                $Religion=$form->getValue('Religion');
                $CurrentAddress=$form->getValue('CurrentAddress');
                $PermanentAddress=$form->getValue('PermanentAddress');
                $HomePhone=$form->getValue('HomePhone');
                $Mobile=$form->getValue('Mobile');
                $OfficePhone=$form->getValue('OfficePhone');
                $Email=$form->getValue('Email');
                $AlternativeEmail=$form->getValue('AlternativeEmail');
                $ImagePath=$form->getValue('ImagePath');

                $employeeInfo = new Application_Model_DbTable_EmployeeProfile();
                $addEmployee = $employeeInfo->addEmployee($Name, $DOB, $Gender, $MaritialStatus, $Nationality, $Religion, $CurrentAddress, $PermanentAddress, $HomePhone, $Mobile, $OfficePhone, $Email, $AlternativeEmail, $ImagePath);

                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
    }
}



