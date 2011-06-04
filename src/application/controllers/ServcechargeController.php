<?php

class ServcechargeController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
     $request = $this->getRequest();
     
     $application_Model_Service = new Application_Model_Service();  
     $entries = $application_Model_Service->findServiceCharge(); 
     $this->view->service=$entries;
     $this->view->assign('seervicpayment', $request->getBaseURL()."/servcecharge/servicepayment");
     $this->view->assign('postjob', $request->getBaseURL()."/jobpost/postform");
     $this->view->assign('searchcv', $request->getBaseURL()."/searchcv/index");
      $this->view->assign('servicecharge', $request->getBaseURL()."/servcecharge/index");
       $this->view->assign('home', $request->getBaseURL()."/jobpost/index");
        $this->view->assign('contact', $request->getBaseURL()."/employer/index");
    }

    public function servicepaymentAction()
    {
     $request = $this->getRequest();
     $application_Model_UserInfo = new Application_Model_UserInfo();
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $val = Zend_Auth::getInstance()->getStorage()->read()->Username;
             
             $application_Model_UserInfo->setUsername($val);
             $application_Model_UserInfo->findUserInfo();
           
        }
    $application_Model_Service = new Application_Model_Service(); 
    $application_Model_Service->setServiceId($request->getParam("id"));
    $application_Model_Service->setUserId($application_Model_UserInfo->getUserId());
    $application_Model_Service->insertPayment();
    
    
     
    }


}



