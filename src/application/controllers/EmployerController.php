<?php
class EmployerController extends Zend_Controller_Action
{
    public function init ()
    {
      
        /* Initialize action controller here */
	$this->_customactionhelper = Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper');
    
    }
    public function indexAction ()
    {
        // action body
        $request = $this->getRequest();
     
        $this->view->assign('login', $request->getBaseURL() . "/authentication/login");
        $this->view->assign('create', 
        $request->getBaseURL() . "/employer/registerform");
        $this->assignViewformAction($request);

        $form = new Application_Form_Login();

        $form->setAction($this->view->url(array('controller' => 'authentication', 'action' => 'login')));

        $form->setMethod('post');

        $this->view->login = $form;
    }
    public function assignViewformAction ($request)
    {
        $this->view->assign('postjob', 
        $request->getBaseURL() . "/jobpost/postform");
        $this->view->assign('searchcv', 
        $request->getBaseURL() . "/searchcv/index");
        $this->view->assign('servicecharge', 
        $request->getBaseURL() . "/servcecharge/index");
        $this->view->assign('home', $request->getBaseURL() . "/jobpost/index");
        $this->view->assign('contact', $request->getBaseURL() .
         "/employer/index");
    }
    public function registerformAction ()
    {
        $application_Model_LuCountry = new Application_Model_LuCountry();
        $entries = $application_Model_LuCountry->findAllCountry();
        $this->view->country = $entries;
        $entries = $application_Model_LuCountry->findAllBusinessType();
        $this->view->businessType = $entries;
        $entries = $application_Model_LuCountry->findAllBusinessType();
        $this->view->businessType = $entries;
        $application_Model_LuCountry->setCountryId(1);
        $entries = $application_Model_LuCountry->findCityByCountryId();
        $this->view->city = $entries;
        
        $request = $this->getRequest();
        $this->view->assign('action', 
        $request->getBaseURL() . "/employer/createemployee");
        $this->assignViewformAction($request);
    }
    public function createemployeeAction ()
    {
        $request = $this->getRequest();
        
        $application_Model_Employer = new Application_Model_Employer();
       // $application_Model_Employer->setUserId(2);
        $application_Model_Employer->setUsername(
        $request->getParam("txtUserName"));
        $application_Model_Employer->setPassword(
        $request->getParam("txtPassword"));
        $application_Model_Employer->setPassword(
        $request->getParam("txtConfirmPassword"));
        $application_Model_Employer->setCompanyname(
        $request->getParam("txtCompanyName"));
        $application_Model_Employer->setAlternativeCompany(
        $request->getParam("txtAliasName"));
        $application_Model_Employer->setCompanyAddress(
        $request->getParam("txtCompanyAddress"));
        $application_Model_Employer->setContactPhone(
        $request->getParam("txtContactPhone"));
        $application_Model_Employer->setContactMail(
        $request->getParam("txtEmail"));
        $application_Model_Employer->setWebsiteAddress(
        $request->getParam("txtURL"));
        $application_Model_Employer->setCompanyLogo("logo");
        $application_Model_Employer->setContactperson(
        $request->getParam("txtContactPerson"));
        $application_Model_Employer->setContactPersonDesignation(
        $request->getParam("txtDesignation"));
        $application_Model_Employer->setCountry(
        $request->getParam("cboCountry"));
        $application_Model_Employer->setBusinessType(
        $request->getParam("cboBusinessType"));
        $application_Model_Employer->setBillingAddress(
        $request->getParam("txtBillingAddress"));
        $application_Model_Employer->setCityId($request->getParam("cboCity"));
        $application_Model_Employer->insertEmployer();
        $this->_redirect('/jobpost/index');
        $this->view->assign('action', $request->getBaseURL() . "/jobpost/index");
        $this->view->assign('company', 
        $application_Model_Employer->getCompanyname());
        $this->view->assign('userId', $application_Model_Employer->getUserId());
       // }
    }
    public function findemployerAction ()
    {  
      $request = $this->getRequest();
     
       $application_Model_UserInfo = new Application_Model_UserInfo();
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $val = Zend_Auth::getInstance()->getStorage()->read()->Username;
             
             $application_Model_UserInfo->setUsername($val);
             $application_Model_UserInfo->findUserInfo();
           
        }
       
        $application_Model_LuCountry = new Application_Model_LuCountry();
        $entries = $application_Model_LuCountry->findAllCountry();
        $this->view->country = $entries;
        $entries = $application_Model_LuCountry->findAllBusinessType();
        $this->view->businessType = $entries;
        $entries = $application_Model_LuCountry->findAllBusinessType();
        $this->view->businessType = $entries;
        $application_Model_LuCountry->setCountryId(1);
        $entries = $application_Model_LuCountry->findCityByCountryId();
        $this->view->city = $entries;
    	$application_Model_Employer = new Application_Model_Employer();
        $application_Model_Employer->setUserId($application_Model_UserInfo->getUserID());
        $application_Model_Employer->setUsername($application_Model_UserInfo->getUsername());
        $application_Model_Employer->findEmployerId();
        $this->view->assign('action', 
        $request->getBaseURL() . "/employer/editemployee");
        $this->view->username = $application_Model_Employer;
        $this->assignViewformAction($request);
    }
    public function editemployeeAction ()
    {
        $request = $this->getRequest();
        $application_Model_Employer = new Application_Model_Employer();
        $application_Model_Employer->setUserId($request->getParam("txtuserID"));
        $application_Model_Employer->setCompanyname(
        $request->getParam("txtCompanyName"));
        $application_Model_Employer->setAlternativeCompany(
        $request->getParam("txtAliasName"));
        $application_Model_Employer->setCompanyAddress(
        $request->getParam("txtCompanyAddress"));
        $application_Model_Employer->setContactPhone(
        $request->getParam("txtContactPhone"));
        $application_Model_Employer->setContactMail(
        $request->getParam("txtEmail"));
        $application_Model_Employer->setWebsiteAddress(
        $request->getParam("txtURL"));
        $application_Model_Employer->setCompanyLogo("logo");
        $application_Model_Employer->setContactperson(
        $request->getParam("txtContactPerson"));
        $application_Model_Employer->setContactPersonDesignation(
        $request->getParam("txtDesignation"));
        $application_Model_Employer->setCountry(
        $request->getParam("cboCountry"));
        $application_Model_Employer->setBusinessType(
        $request->getParam("cboBusinessType"));
        $application_Model_Employer->setBillingAddress(
        $request->getParam("txtBillingAddress"));
        $application_Model_Employer->setCityId($request->getParam("cboCity"));
        $application_Model_Employer->editEmployer();
        $this->_redirect('/jobpost/index');
        $this->view->assign('action', $request->getBaseURL() . "/jobpost/index");
        $this->view->assign('company', 
        $application_Model_Employer->getCompanyname());
        $this->view->assign('userId', $application_Model_Employer->getUserId());
    }
	
	    public function listemployerAction() {
        $employerhandler = new Application_Model_EmployerHandler();

        $this->view->paginator = APP_Action_Helper_CustomActionHelper::
                getPaginationControl($employerhandler->getListOfEmployers(),
                        $this->getRequest()->getParam('page'));
    }

    public function blockAction(){
        
    }
}







