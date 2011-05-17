<?php

class IndexController extends Zend_Controller_Action {

    public $db = null;

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {

        $test = new Application_Model_JobsList();

        $this->view->paginator = APP_Action_Helper_CustomActionHelper::
                getPaginationControl($test->getJobsCountByCategory(),
                        $this->getRequest()->getParam('page'));
    }

    public function addAction() {
        $form = new Application_Form_CreateJobCategory();
        $this->view->form = $form;
    }

    public function contactusAction()
    {

        
    }

    public function aboutAction()
    {
        
        
    }
}

