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
        $jobid = $this->getRequest()->getParam('jobid');
        $this->view->jobid = $jobid;
        $this->view->jobdetail = $this->_jobsLoader
                ->getJobDetail($jobid);
    }

    public function jobsbyemployerAction()
    {
        $this->view->paginator = APP_Action_Helper_CustomActionHelper::
                getPaginationControl($this->_jobsLoader
                ->getJobsByEmployer($this->getRequest()->getParam('employerid')),
                        $this->getRequest()->getParam('page'));

    }

    public function applyjobAction()
    {
        $jobid = $this->_request->getPost('jobid');

        $actionhelper = Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper');
        $employeeid = $actionhelper->getUserID();

        $role = $actionhelper->getRole();

        if($role == APP_Authorization_Roles::EMPLOYEE)
        {
            $result = $this->_jobsLoader->applyForJob($jobid, $employeeid);
            if($result)
                $this->_redirect('jobs/jobhistory');
            else
            {
                echo "<div class='errors'>You have already applied for this post earlier.</div>";

            }
        }
        else if($role == APP_Authorization_Roles::GUEST)
        {
            echo "<h1 class = 'errors'>Please login to apply for the job</h1>";

            $form = new Application_Form_Login();

            $form->setAction($this->view->url(array('controller' => 'authentication', 'action' => 'login')));

            $form->setMethod('post');

            echo $form;
        }
    }

    public function jobhistoryAction()
    {  
        $actionhelper = Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper');
        $employeeid = $actionhelper->getUserID();
        $value = $this->_request->getParam('delete');
        if($value)
        {
            $this->_jobsLoader->removeJobApplication($value, $employeeid);
        }
        $result = $this->_jobsLoader->getJobHistory($employeeid);
        $this->view->jobhistory = $result;
    }


}