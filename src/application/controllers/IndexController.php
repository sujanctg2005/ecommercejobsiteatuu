<?php

class IndexController extends Zend_Controller_Action {

    public $db = null;

    public function init() {
        /* Initialize action controller here */

    }

    public function indexAction() {


        $actionhelper = Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper');
        $role = $actionhelper->getRole();
        $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('Redirector');
        if ($actionhelper->getRole() == APP_Authorization_Roles::EMPLOYEE) {
            $redirector->gotoUrl('/profile/index/');
        } else if ($actionhelper->getRole() == APP_Authorization_Roles::EMPLOYER) {
            //echo 'here2';
            $redirector->gotoUrl('/employer/index/');
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

