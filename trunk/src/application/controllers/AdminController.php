<?php

class AdminController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
	 $this->_helper->getHelper('layout')->disableLayout();
        // action body
    }

   public function  jobspostAction(){
   	
   	$application_Model_Jobvacancy = new Application_Model_Jobvacancy();   	
    $postjoblist = $application_Model_Jobvacancy->summaryJob();
   	
	  $this->_helper->viewRenderer->setNoRender();
   	 $this->_helper->getHelper('layout')->disableLayout();
	 
	 
$nbrows=count($postjoblist);

if($nbrows>0){
		
		$jsonresult = json_encode($postjoblist);
		if(isset( $_REQUEST['callback'])){
			echo $_REQUEST['callback'].'({"total":"'.$nbrows.'","results":'.$jsonresult.'});';
		}else{
			echo '{"total":'.$nbrows.',"results":'.$jsonresult.'}';
		}
		
	} else {
		echo '({"total":"0", "results":""})';
	}
	
	 
   }
   
public function  monthjobspostAction(){
   	
   	$application_Model_Jobvacancy = new Application_Model_Jobvacancy();   	
    $postjoblist = $application_Model_Jobvacancy->monthlySummaryJob();
   	 
	  $this->_helper->viewRenderer->setNoRender();
   	 $this->_helper->getHelper('layout')->disableLayout();
	 
	 $nbrows=count($postjoblist);
	 if($nbrows>0){
		
		$jsonresult = json_encode($postjoblist);
		if(isset( $_REQUEST['callback'])){
			echo $_REQUEST['callback'].'({"total":"'.$nbrows.'","results":'.$jsonresult.'});';
		}else{
			echo '{"total":'.$nbrows.',"results":'.$jsonresult.'}';
		}
		
	} else {
		echo '({"total":"0", "results":""})';
	}
	
	 
   }
   
   public function getpaymentstatusAction(){
   	
   	 	$application_Model_Jobvacancy = new Application_Model_Jobvacancy();   	
    	$postjoblist = $application_Model_Jobvacancy->getPaymentStatus();
   		
       $this->_helper->viewRenderer->setNoRender();
	   $this->_helper->getHelper('layout')->disableLayout();
   	
$nbrows=count($postjoblist);

if($nbrows>0){
		
		$jsonresult = json_encode($postjoblist);
		if(isset( $_REQUEST['callback'])){
			echo $_REQUEST['callback'].'({"total":"'.$nbrows.'","results":'.$jsonresult.'});';
		}else{
			echo '{"total":'.$nbrows.',"results":'.$jsonresult.'}';
		}
		
	} else {
		echo '({"total":"0", "results":""})';
	}
	
	
   }
   

}



