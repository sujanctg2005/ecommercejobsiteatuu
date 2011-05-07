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
        $jobCategories = new Application_Model_DbTable_JobCategory();
        $this->view->jobCategories = $jobCategories->fetchAll();
    }

    public function addAction()
    {
        $form = new Application_Form_CreateJobCategory();

        $this->view->form = $form;
    }
}


