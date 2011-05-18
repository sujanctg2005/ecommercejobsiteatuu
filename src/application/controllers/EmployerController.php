<?php

class EmployerController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
                if(Zend_Auth::getInstance()->hasIdentity())
        {
            $this->_redirect(array('controller'=>'index','action'=>'index'));
        }

          $form = new Application_Form_Login();

          $form -> setAction($this->view->url(array('controller'=>'authentication','action'=>'login')));

          $form->setMethod('post');

          $errors = '';

         if($this->getRequest()->isPost())
         {

            $data = $this->getRequest()->getParams();

            if($form->isValid($data))
            {
                //authenticate the user
                $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());

                $authAdapter ->setTableName("tbl_user_info");

                $authAdapter ->setIdentityColumn("username")
                             ->setCredentialColumn("password");

                $authAdapter->setIdentity($data['username'])
                                ->setCredential($data['password']);

                $authenticate = Zend_Auth::getInstance()
                                ->authenticate($authAdapter);

                 if($authenticate->isValid())
                 {
                     $userInfo = $authAdapter->getResultRowObject(null,'password');
                     print_r($userInfo);
                     $authStorage = Zend_Auth::getInstance()-> getStorage();
                     $authStorage->write($userInfo);
                     $this->_redirect(array('controller'=>'index','action'=>'index'));
                 }
                 else
                 {
                      $this->view->errors = 'The username or password you entered is incorrect.';
                 }
            }

            $form->setDefaults($data);
        }

        echo $form;
    }

    public function registerformAction() {
        $request = $this->getRequest();
        $this->view->assign('postjob', $request->getBaseURL() . "/jobpost/postform");
        $this->view->assign('searchcv', $request->getBaseURL() . "/searchcv/index");
        $this->view->assign('servicecharge', $request->getBaseURL() . "/servcecharge/index");
        $this->view->assign('home', $request->getBaseURL() . "/jobpost/index");
        $this->view->assign('contact', $request->getBaseURL() . "/employer/index");
        $this->view->assign('test', $request->getParam("NAME"));
        $request = $this->getRequest();
        $this->view->assign('action', $request->getBaseURL() . "/employer/createemployee");
    }

    public function createemployeeAction() {

        $request = $this->getRequest();
        $application_Model_Employer = new Application_Model_Employer();
        $application_Model_Employer->setUserId(2);
        $application_Model_Employer->setUsername($request->getParam("txtUserName"));
        $application_Model_Employer->setPassword($request->getParam("txtPassword"));
        $application_Model_Employer->setPassword($request->getParam("txtConfirmPassword"));
        $application_Model_Employer->setCompanyname($request->getParam("txtCompanyName"));
        $application_Model_Employer->setAlternativeCompany($request->getParam("txtAliasName"));
        $application_Model_Employer->setCompanyAddress($request->getParam("txtCompanyAddress"));
        $application_Model_Employer->setContactPhone($request->getParam("txtContactPhone"));
        $application_Model_Employer->setContactMail($request->getParam("txtEmail"));
        $application_Model_Employer->setWebsiteAddress($request->getParam("txtURL"));
        $application_Model_Employer->setCompanyLogo("logo");

        $application_Model_Employer->setContactperson($request->getParam("txtContactPerson"));
        $application_Model_Employer->setContactPersonDesignation($request->getParam("txtDesignation"));
        $application_Model_Employer->setCountry($request->getParam("cboCountry"));
        $application_Model_Employer->setBusinessType($request->getParam("cboBusinessType"));
        $application_Model_Employer->setBillingAddress($request->getParam("txtBillingAddress"));
        $application_Model_Employer->setCityId($request->getParam("cboCity"));
        $application_Model_Employer->insertEmployer();
        $this->_redirect('/jobpost/index');
        $this->view->assign('action', $request->getBaseURL() . "/jobpost/index");
        $this->view->assign('company', $application_Model_Employer->getCompanyname());
        $this->view->assign('userId', $application_Model_Employer->getUserId());
    }

    public function findemployerAction() {
        $application_Model_Employer = new Application_Model_Employer();
        $request = $this->getRequest();
        $application_Model_Employer->setUserId(1);
        $application_Model_Employer->setUsername("Mesfin Mamuye");
        //  $entries   = array();
        $application_Model_Employer->findEmployerId();
        // $entries[]=$application_Model_Employer;
        //$application_Model_Employer->setUsername($request->getParam("username"));
        //$application_Model_Employer->findEmployerId();
        $this->view->assign('action', $request->getBaseURL() . "/employer/editemployee");
        $this->view->username = $application_Model_Employer;
        //$this->view->assign('username', $entries); 
    }

    public function editemployeeAction() {

        $request = $this->getRequest();
        $application_Model_Employer = new Application_Model_Employer();
        $application_Model_Employer->setUserId($request->getParam("txtuserID"));
        $application_Model_Employer->setCompanyname($request->getParam("txtCompanyName"));
        $application_Model_Employer->setAlternativeCompany($request->getParam("txtAliasName"));
        $application_Model_Employer->setCompanyAddress($request->getParam("txtCompanyAddress"));
        $application_Model_Employer->setContactPhone($request->getParam("txtContactPhone"));
        $application_Model_Employer->setContactMail($request->getParam("txtEmail"));
        $application_Model_Employer->setWebsiteAddress($request->getParam("txtURL"));
        $application_Model_Employer->setCompanyLogo("logo");

        $application_Model_Employer->setContactperson($request->getParam("txtContactPerson"));
        $application_Model_Employer->setContactPersonDesignation($request->getParam("txtDesignation"));
        $application_Model_Employer->setCountry($request->getParam("cboCountry"));
        $application_Model_Employer->setBusinessType($request->getParam("cboBusinessType"));
        $application_Model_Employer->setBillingAddress($request->getParam("txtBillingAddress"));
        $application_Model_Employer->setCityId($request->getParam("cboCity"));
        $application_Model_Employer->editEmployer();
        $this->_redirect('/jobpost/index');
        $this->view->assign('action', $request->getBaseURL() . "/jobpost/index");
        $this->view->assign('company', $application_Model_Employer->getCompanyname());
        $this->view->assign('userId', $application_Model_Employer->getUserId());
    }

    public function listemployerAction() {
        $employerhandler = new Application_Model_EmployerHandler();

        $this->view->paginator = APP_Action_Helper_CustomActionHelper::
                getPaginationControl($employerhandler->getListOfEmployers(),
                        $this->getRequest()->getParam('page'));
    }
}

