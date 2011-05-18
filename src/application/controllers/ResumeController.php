<?php

class ResumeController extends Zend_Controller_Action
{
    protected $_resumeLoader;

    public function init()
    {
        $this->_resumeLoader = new Application_Model_ResumeList();
    }

    public function indexAction()
    {
        // action body
    }

    public function editAction()
    {
        // action body
       // $this->_helper->layout()->disableLayout();
    }

    public function viewAction()
    {
        $actionhelper = Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper');
        $data = $this->_resumeLoader
                ->getResumeDetail($actionhelper->getUserID());
        $this->view->imagepath = $data[0]['ImagePath'];
        $this->view->view = $data;
    }

    public function emailAction()
    {
        // action body
    }

    public function deleteAction()
    {
        // action body
    }


}









