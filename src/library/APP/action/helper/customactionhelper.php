<?php

class APP_Action_Helper_CustomActionHelper extends
Zend_Controller_Action_Helper_Abstract {

    public function preDispatch() {
        //$this->redirectIfNotAuthorized();
    }

    public function redirectIfNotAuthorized()
    {
        $req = $this->getRequest();
        if (!$this->authorizeAccess($this->getRole(), 
                $req->getControllerName(),
                $req->getActionName()))
        {
            if($controller !='index' && $action != 'index')
            {
                $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('Redirector');
                $redirector->gotoUrl('/');
            }
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

    private function getRole()
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

    public static function getPaginationControl($data, $currentPage)
    {
        $paginator = Zend_Paginator::factory($data);

        if($currentPage > 0)
            $paginator->setCurrentPageNumber($currentPage);
        else
            $paginator->setCurrentPageNumber(1);

        return $paginator;
    }

    public static function getQueryProfileDump($str)
    {
        $dbAdapter = Zend_Db_Table::getDefaultAdapter();

        $profiler = $dbAdapter->getProfiler();

        $profiler->setEnabled(true);

        $queryId = $profiler->queryStart($str);

        $qp = $profiler->getQueryProfile($queryId);

        if ($qp->hasEnded()) {
        echo 'query ended';
            $queryId = $profiler->queryClone($qp);
        $qp = $profiler->getQueryProfile($queryId);
        }
        $qp->start($queryId);
        $q = mysql_query($str);
        $profiler->queryEnd($queryId);
        var_dump($profiler->getQueryProfiles());
    }

    public static function getURL($controller, $action)
    {
        return self::getControllerBaseURL()."/".$controller."/".$action;
    }

    public static function getControllerBaseURL()
    {
        return Zend_Controller_Front::getInstance()->getBaseUrl();
    }
}

