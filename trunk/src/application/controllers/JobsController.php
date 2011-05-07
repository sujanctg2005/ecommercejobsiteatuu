<?php

class JobsController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $test = new Application_Model_JobsList();
        $this->view->joblist = $test->getJobsCountByCategory(20);
    }

    public function jobsbycategoryAction()
    {
        $jobcategoryid = $this->getRequest()->getParam('jobcatid');

        $tbl = new Application_Model_JobsList();

        $this->view->jobslist = $tbl->getJobsForCategory($jobcategoryid);
    }

    public function jobdetailAction()
    {
        $jobid = $this->getRequest()->getParam('jobid');

        $tbl = new Application_Model_JobsList();
        // action body
        print_r($tbl->getJobDetail($jobid));
    }


}





