<?php

class APP_Action_Helper_Authentication extends
Zend_Controller_Action_Helper_Abstract {

    public function preDispatch() {

                $req = $this->getRequest();

        $auth = Zend_Auth::getInstance();

        $usertype = 'guest';

        if($auth->hasIdentity())
                $usertype = $auth->getStorage ()->read()->UserType;

        $role = $this->getRole($usertype);
        $controller = $req->getControllerName();// ? 'index' : $req->getControllerName();
        $action = $req->getActionName();// ? 'index' : $req->getActionName();
        if (!$this->authorizeAccess($role, $req->getControllerName(), $req->getActionName()))
        {
            if($controller !='index' && $action != 'index')
            {
                $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('Redirector');
                $redirector->gotoUrl('/');
            }
        }
    }

    private function authorizeAccess($role, $controller, $action)
    {
        return APP_Authorization_Authorizer::isAccessAllowed($role, 
        strtolower($controller),
        strtolower($action));
    }

    private function getRole($usertype)
    {
        switch (strtolower($usertype))
        {
            case 'employee':
                return APP_Authorization_Roles::EMPLOYEE;
                break;
            case 'employer':
                return APP_Authorization_Roles::EMPLOYER;
                break;
            case 'admin':
                return APP_Authorization_Roles::ADMIN;
                break;
            default:
                return APP_Authorization_Roles::GUEST;
        }

    }
}

