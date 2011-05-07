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
}

