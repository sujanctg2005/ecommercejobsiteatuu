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

        $jobCategories = $test->getJobsCountByCategory();

        $this->view->joblist = $test->getJobsCountByCategory();

        $pagenumber = $currentpage = $this->getRequest()->getParam('page');

        $paginator = Zend_Paginator::factory($jobCategories);
        
        if($pagenumber > 0)
            $paginator->setCurrentPageNumber($pagenumber);
        else
            $paginator->setCurrentPageNumber(1);

        $this->view->paginator = $paginator;
    }

    public function addAction()
    {
        $form = new Application_Form_CreateJobCategory();
        $this->view->form = $form;
    }
}




