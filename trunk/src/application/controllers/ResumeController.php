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
        $this->view->view = $this->_resumeLoader
                ->getResumeDetail($this->getRequest()->getParam('UserID'));
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









