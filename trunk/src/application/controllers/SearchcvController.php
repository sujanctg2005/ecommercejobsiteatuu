<?php

class SearchcvController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $request = $this->getRequest();
        $application_Model_SearchResume = new Application_Model_SearchResume();   	
        $entries = $application_Model_SearchResume->findAllEmployee();
        $this->view->postjoblist=$entries;
      
        $this->view->assign('SearchResume', 
        $request->getBaseURL() . "/searchcv/searchresumebyqualification");
        $this->view->assign('viewQualification', 
        $request->getBaseURL() . "/searchcv/viewqualification");
         $this->view->assign('sendEmail', 
        $request->getBaseURL() . "/searchcv/sendemail");
        $this->view->assign('addresume', 
        $request->getBaseURL() . "/searchcv/addtoresumelist");
        
        $this->view->assign('findemployer', $request->getBaseURL() . "/employer/findemployer");
        $this->assignViewformAction($request);
    }

    public function assignViewformAction($request)
    {
    $this->view->assign('postjob', $request->getBaseURL()."/jobpost/postform");
     $this->view->assign('searchcv', $request->getBaseURL()."/searchcv/index");
      $this->view->assign('servicecharge', $request->getBaseURL()."/servcecharge/index");
      $this->view->assign('home', $request->getBaseURL()."/jobpost/index");
       $this->view->assign('contact', $request->getBaseURL()."/employer/index");
    }

    public function searchresumebyqualificationAction()
    {
        // action body
    }

    public function viewqualificationAction()
    
    {   $request = $this->getRequest();
  
        $application_Model_SearchResume = new Application_Model_SearchResume();   	
        $entries = $application_Model_SearchResume->findAllEmployee();
        $this->view->postjoblist=$entries;
        
        $application_Model_SearchResume = new Application_Model_SearchResume();
        $application_Model_SearchResume->setEmployeeId( $request->getParam("emId")) ;	
        $entries = $application_Model_SearchResume->findResumeByEmployeeId();
        $this->view->empId=$request->getParam("emId");
        $this->view->qalification=$entries;
       // $this->_redirect('/searchcv/index');
    }

    public function sendemailAction()
    {
        $request = $this->getRequest();
        $emailId =$request->getParam("email") ;	
        $this->view->emailId= $emailId;
       $this->view->assign('sendtoEmployee', $request->getBaseURL()."/searchcv/sendtoemployee");
       // $this->_redirect('/searchcv/sendemail');
    }

    public function addtoresumelistAction()
    {
        // action body
    }

    public function sendtoemployeeAction()
    
    {
        $request = $this->getRequest();
        $application_Model_SearchResume = new Application_Model_SearchResume();
        $application_Model_SearchResume->setEmployeeId($request->getParam("txtToEmail")) ;
        $application_Model_SearchResume->setEmailTo($request->getParam("txtToEmail")) ;
        $application_Model_SearchResume->setEmailFrom( $request->getParam("taxtEmailFrom")) ;
        $application_Model_SearchResume->setSubjject( $request->getParam("taxtSubject")) ;
        $application_Model_SearchResume->setBody( $request->getParam("txtbody")) ;
        $application_Model_SearchResume->insertEmployeeEmail();
        	$this->view->emailId= $request->getParam("txtToEmail");
       // $entries = $application_Model_SearchResume->findResumeByEmployeeId();
    }


}











