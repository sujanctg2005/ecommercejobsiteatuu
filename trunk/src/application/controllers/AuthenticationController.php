<?php

class AuthenticationController extends Zend_Controller_Action
{
    public function init()
    {
        //$this->_forward('login', 'authentication');
    }

    public function indexAction()
    {
        $this->_forward('login', 'authentication');
    }

    public function loginAction()
    {
          $form = new Application_Form_Login();

          $form -> setAction($this->view->url(array('controller'=>'authentication','action'=>'login')));

          $form->setMethod('post');

         if($this->getRequest()->isPost())
         {

            $data = $this->getRequest()->getParams();

            if($form->isValid($data))
            {
                //authenticate the user
                $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());

                $authAdapter ->setTableName("tbl_user_info");

                $authAdapter ->setIdentityColumn("username")
                             ->setCredentialColumn("password");

                $authAdapter->setIdentity($data['username'])
                                ->setCredential($data['password']);

                $authenticate = Zend_Auth::getInstance()
                                ->authenticate($authAdapter);

                 if($authenticate->isValid())
                 {
                     $userInfo = $authAdapter->getResultRowObject(null, 'password');
                     $authStorage = $auth->getStorage();
                     $authStorage->write($userInfo);
                     $this->_redirect(array('controller'=>'index','action'=>'index'));
                 }
            }

            $form->setDefaults($data);
        }

        $this->view->form = $form;
    }

    public function logoutAction()
    {
        // action body
        Zend_Auth::getInstance()->clearIdentity();
        return $this->_redirect(array('controller'=>'index','action'=>'index'));
    }
}





