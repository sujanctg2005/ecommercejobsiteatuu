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
        try
        {
        $jobcategoryid = $this->getRequest()->getParam('jobcatid');

        $data = $this->_jobsLoader
                ->getJobsForCategory($jobcategoryid);

        $this->view->paginator = APP_Action_Helper_CustomActionHelper::
                getPaginationControl($data,
                        $this->getRequest()->getParam('page'));
        }
        catch(Exception $e)
        {}
    }

    public function jobdetailAction()
    {
        $this->view->jobdetail = $this->_jobsLoader
                ->getJobDetail($this->getRequest()->getParam('jobid'));
    }

}