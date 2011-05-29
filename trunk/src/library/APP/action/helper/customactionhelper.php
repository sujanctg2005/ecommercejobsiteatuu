<?php

class APP_Action_Helper_CustomActionHelper extends
Zend_Controller_Action_Helper_Abstract {


    public function preDispatch() {
        $this->redirectIfNotAuthorized();
    }

    public function redirectIfNotAuthorized()
    {
        $req = $this->getRequest();
        $controller = $req->getControllerName();
        $action = $req->getActionName();
        if (!$this->authorizeAccess($this->getRole(), 
                $controller,
                $action))
        {
//            if($controller !='index' && $action != 'index')
//            {
                $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('Redirector');
                $redirector->gotoUrl('/error/showauthorizationerror/');
//            }
        }
    }

    public function  postDispatch() {
        parent::postDispatch();


    }

    private function authorizeAccess($role, $controller, $action)
    {
        return APP_Authorization_Authorizer::isAccessAllowed($role, 
        strtolower($controller),
        strtolower($action));
    }

    public function getUserID()
    {
        $auth = Zend_Auth::getInstance();

        if($auth->hasIdentity())
                return $auth->getStorage()->read()->UserID;

        return -1;

    }

    public function getRole()
    {
        $auth = Zend_Auth::getInstance();

        $usertype = 'guest';

        if($auth->hasIdentity())
                $usertype = $auth->getStorage()->read()->UserType;

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

    public static function md5encrypt($data)
    {
        $crypted = crypt(md5($data),  md5($data));
        return $crypted;
    }

    public static function getPaginationControl($data, $currentPage)
    {
        $paginator = Zend_Paginator::factory($data);

        if($currentPage > 0)
            $paginator->setCurrentPageNumber($currentPage);
        else
            $paginator->setCurrentPageNumber(1);

        return $paginator;
    }

    public static function getURL($controller, $action)
    {
        return self::getControllerBaseURL()."/".$controller."/".$action;
    }

    public static function getControllerBaseURL()
    {
        return Zend_Controller_Front::getInstance()->getBaseUrl();
    }

    public function getRequests()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getNavigationRootNodeName()
    {
        $role = $this->getRole();

        if($role == APP_Authorization_Roles::ADMIN)
            return "adminnavigation";

        if($role == APP_Authorization_Roles::EMPLOYEE)
            return "employeenavigation";

        if($role == APP_Authorization_Roles::EMPLOYER)
            return "employernavigation";

        return "guestnavigation";
    }
}

