<?php

class ProfileController extends Zend_Controller_Action {

    public function init() {
        require_once 'upload.php';
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
            $employeeInfo = new Application_Model_DbTable_EmployeeProfile();
            if ($form->isValid($formData)) {
                if($employeeInfo->checkUnique($formData['Username']))
                {
                    $this->view->errorMessage = $formData['Username'] ." not available, Please choose another.";
                    $form->populate($formData);
                    $form->getElement('Username')->setValue('');
                    return;
                }
                $data = $form->getValues();
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
                $ImagePath = Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper')->
                        returnImage($_FILES['ImagePath'],$this->view->baseUrl());

                $addEmployee = $employeeInfo->addEmployee($Username, $Password, $Name, $DOB, $Gender, $MaritialStatus, $Nationality, $Religion, $CurrentAddress, $PermanentAddress, $HomePhone, $Mobile, $OfficePhone, $Email, $AlternativeEmail, $ImagePath);

                //authenticate the user
                $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());

                $authAdapter->setTableName("tbl_user_info");

                $authAdapter->setIdentityColumn("username")
                        ->setCredentialColumn("password");

                $authAdapter->setIdentity($Username)
                        ->setCredential(Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper')->md5encrypt($Password));

                $authenticate = Zend_Auth::getInstance()
                                ->authenticate($authAdapter);

                if ($authenticate->isValid()) {
                    $userInfo = $authAdapter->getResultRowObject(null, 'password');
                    $authStorage = Zend_Auth::getInstance()->getStorage();
                    $authStorage->write($userInfo);


                    $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('Redirector');
                    $redirector->gotoUrl('/profile/index/');
                }
            } else {
                $form->populate($formData);
            }
        }
    }

}

