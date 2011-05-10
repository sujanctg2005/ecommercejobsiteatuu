<?php

class JobsController extends Zend_Controller_Action
{

    protected $_jobsLoader;

    public function init()
    {
        /* Initialize action controller here */
        $this->_jobsLoader = new Application_Model_JobsList();
    }

    public function indexAction()
    {
        $this->view->joblist = $this->_jobsLoader->getJobsCountByCategory();
    }

    public function jobsbycategoryAction()
    {
        $this->view->jobslist = $this->_jobsLoader
                ->getJobsForCategory($this->getRequest()->getParam('jobcatid'));
    }

    public function jobdetailAction()
    {
        $this->view->jobdetail = $this->_jobsLoader
                ->getJobDetail($this->getRequest()->getParam('jobid'));
    }

}