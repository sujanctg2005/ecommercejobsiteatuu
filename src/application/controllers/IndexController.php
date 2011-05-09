<?php

class IndexController extends Zend_Controller_Action
{

    public $db = null;

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $test = new Application_Model_JobsList();
        $this->view->joblist = $test->getJobsCountByCategory(20);
//        $jobCategories = new Application_Model_DbTable_JobCategory();
//
//        $this->view->jobCategories = $jobCategories->fetchAll();
    }

    public function addAction()
    {
        $form = new Application_Form_CreateJobCategory();
        $this->view->form = $form;
    }
}




