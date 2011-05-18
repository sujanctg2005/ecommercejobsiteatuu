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

    public function feedbackAction()
    {
        $form = new Application_Form_FeedbackForm();

        $form -> setAction($this->view->url(array('controller'=>'index','action'=>'feedback')));

        $errors = '';

         if($this->getRequest()->isPost())
         {
            $data = $this->getRequest()->getParams();

            if($form->isValid($data))
            {
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
            }
            else
            {
                $form->setDefaults($data);
            }
        }

        $this->view->form = $form;

    }
}

