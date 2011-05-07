<?php

class IndexController extends Zend_Controller_Action
{
    public $db;
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
$this->_helper->layout->setLayout('layout');     
	 $auth = Zend_Auth::getInstance();

        if($auth->hasIdentity())
        {
            //$this->_redirect($this->url(array('authentication','logout')));
            //print_r($auth->getStorage());
        }

        $jobCategories = new Application_Model_DbTable_JobCategory();

        $this->view->jobCategories = $jobCategories->fetchAll();
    }

    public function addAction()
    {
        $form = new Application_Form_CreateJobCategory();

        $this->view->form = $form;
    }
}


