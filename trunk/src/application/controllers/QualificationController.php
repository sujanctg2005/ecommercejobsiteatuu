<?php

class QualificationController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function addAction()
    {
        $form = new Application_Form_EmployeeQualification();
        $form->Submit->setLabel('Submit');
        $this->view->form = $form;
    }
}



