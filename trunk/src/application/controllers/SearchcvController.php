<?php

class SearchcvController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	 $request = $this->getRequest();
       $this->view->assign('postjob', $request->getBaseURL()."/jobpost/postform");
     $this->view->assign('searchcv', $request->getBaseURL()."/searchcv/index");
      $this->view->assign('servicecharge', $request->getBaseURL()."/servcecharge/index");
       $this->view->assign('home', $request->getBaseURL()."/jobpost/index");
        $this->view->assign('contact', $request->getBaseURL()."/employer/index");
    }


}

