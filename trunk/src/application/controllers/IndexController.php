<?php

class IndexController extends Zend_Controller_Action {

    public $db = null;

    public function init() {
        /* Initialize action controller here */

    }

    public function indexAction() {
        $val1 = 'images/HotJobs/advertising-agency-logo.gif';
        $val2 = 'images/HotJobs/images (1).jpg';
        $val3 = 'images/HotJobs/images (2).jpg';
        $val4 = 'images/HotJobs/images (3).jpg';
        $val5 = 'images/HotJobs/images (4).jpg';
        $val6 = 'images/HotJobs/images (5).jpg';
        $val7 = 'images/HotJobs/images (6).jpg';
        $val8 = 'images/HotJobs/images (7).jpg';
        $val9 = 'images/HotJobs/images (8).jpg';
        $val10 = 'images/HotJobs/images (9).jpg';
        $val = 'images/HotJobs/images (10).jpg';
        $hotjobs = array(    
            //array('imagepath'=>"$val1",'jobtitle'=>'This is title1','jobdescription'=>'this is description1', 'link'=>''),
            //array('imagepath'=>"$val1",'jobtitle'=>'','jobdescription'=>'', 'link'=>''),
            array('imagepath'=>"$val2",'jobtitle'=>'','jobdescription'=>'', 'link'=>''),
            array('imagepath'=>"$val3",'jobtitle'=>'','jobdescription'=>'', 'link'=>''),
            array('imagepath'=>"$val4",'jobtitle'=>'','jobdescription'=>'', 'link'=>''),
            array('imagepath'=>"$val5",'jobtitle'=>'','jobdescription'=>'', 'link'=>''),
            array('imagepath'=>"$val6",'jobtitle'=>'','jobdescription'=>'', 'link'=>'')
//            array('imagepath'=>"$val2",'jobtitle'=>'','jobdescription'=>'', 'link'=>''),
//            array('imagepath'=>"$val2",'jobtitle'=>'','jobdescription'=>'', 'link'=>'')
//            array('imagepath'=>"$val3",'jobtitle'=>'This is title1','jobdescription'=>'this is description1', 'link'=>''),
//            array('imagepath'=>"$val4",'jobtitle'=>'This is title1','jobdescription'=>'this is description1', 'link'=>''),
//            array('imagepath'=>"$val5",'jobtitle'=>'This is title1','jobdescription'=>'this is description1', 'link'=>''),
//            array('imagepath'=>"$val6",'jobtitle'=>'This is title1','jobdescription'=>'this is description1', 'link'=>''),
//            array('imagepath'=>"$val7",'jobtitle'=>'This is title1','jobdescription'=>'this is description1', 'link'=>''),
//            array('imagepath'=>"$val8",'jobtitle'=>'This is title1','jobdescription'=>'this is description1', 'link'=>''),
//            array('imagepath'=>"$val9",'jobtitle'=>'This is title1','jobdescription'=>'this is description1', 'link'=>''),
//            array('imagepath'=>"$val10",'jobtitle'=>'This is title1','jobdescription'=>'this is description1', 'link'=>'')
//            array('imagepath'=>"$val",'jobtitle'=>'This is title1','jobdescription'=>'this is description1', 'link'=>''),
//            array('imagepath'=>"$val",'jobtitle'=>'This is title1','jobdescription'=>'this is description1', 'link'=>''),
//            array('imagepath'=>"$val",'jobtitle'=>'This is title1','jobdescription'=>'this is description1', 'link'=>''),
//            array('imagepath'=>"$val",'jobtitle'=>'This is title1','jobdescription'=>'this is description1', 'link'=>''),
//            array('imagepath'=>"$val",'jobtitle'=>'This is title1','jobdescription'=>'this is description1', 'link'=>'')
            );
        
        $this->view->hotjobs = $hotjobs;

        $actionhelper = Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper');
        $role = $actionhelper->getRole();
        $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('Redirector');
        if ($actionhelper->getRole() == APP_Authorization_Roles::EMPLOYEE) {
            $redirector->gotoUrl('/profile/index/');
        } else if ($actionhelper->getRole() == APP_Authorization_Roles::EMPLOYER) {
            //echo 'here2';
            $redirector->gotoUrl('/jobpost/index/');
        } else if ($actionhelper->getRole() == APP_Authorization_Roles::ADMIN) {
            //echo 'here2';
            $redirector->gotoUrl('/admin');
        }
        
        $test = new Application_Model_JobsList();

        $this->view->paginator = APP_Action_Helper_CustomActionHelper::
                getPaginationControl($test->getJobsCountByCategory(),
                        $this->getRequest()->getParam('page'));

        $form = new Application_Form_Login();

        $form->setAction($this->view->url(array('controller' => 'authentication', 'action' => 'login')));

        $form->setMethod('post');

        $this->view->login = $form;
    }

    public function addAction() {
        $form = new Application_Form_CreateJobCategory();
        $this->view->form = $form;
    }

    public function contactusAction() {

    }

    public function aboutAction() {
        
    }

    public function feedbackAction() {
        $form = new Application_Form_FeedbackForm();

        $form->setAction($this->view->url(array('controller' => 'index', 'action' => 'feedback')));

        $errors = '';

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParams();

            if ($form->isValid($data)) {
                $email = $form->getValue('email');
                $description = $form->getValue('description');
                $template = "<html><body>Email: $email<br/>Description: <br/>$description</body></html>";
                $mail = new Zend_Mail();
                $mail->addTo($email)
                        ->setSubject("Feedback...")
                        ->setBodyHtml($template)
                        ->send();
                echo "Thankyou for the feedback.";
                $form = null;
            } else {
                $form->setDefaults($data);
            }
        }

        $this->view->form = $form;
    }

}

