<?php

class AdminController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

   public function  jobspostAction(){
   	
   	$application_Model_Jobvacancy = new Application_Model_Jobvacancy();   	
    $entries = $application_Model_Jobvacancy->summaryJob();
   	 $this->view->postjoblist=$entries;
   	
   }
   
public function  monthjobspostAction(){
   	
   	$application_Model_Jobvacancy = new Application_Model_Jobvacancy();   	
    $entries = $application_Model_Jobvacancy->monthlySummaryJob();
   	 $this->view->postjoblist=$entries;
   	
   }
   
   public function getpaymentstatusAction(){
   	
   	 	$application_Model_Jobvacancy = new Application_Model_Jobvacancy();   	
    	$entries = $application_Model_Jobvacancy->getPaymentStatus();
   		$this->view->postjoblist=$entries;
        
   	
   }
   

}



