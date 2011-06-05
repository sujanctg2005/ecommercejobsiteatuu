<?php


class APP_Authorization_Authorizer {
    //put your code here

    protected static $_acl = null;

    private static function getInstance()
    {
        if(self::$_acl == null)
        {
            self::$_acl = self::getPrivilegesLoadedACL();
        }

        return self::$_acl;
    }

    private static function getPrivilegesLoadedACL()
    {
        $acl = new Zend_Acl();

        //LOAD ROLES

        $acl->addRole(new Zend_Acl_Role(APP_Authorization_Roles::GUEST));
        $acl->addRole(new Zend_Acl_Role(APP_Authorization_Roles::ADMIN),
                APP_Authorization_Roles::GUEST);
        $acl->addRole(new Zend_Acl_Role(APP_Authorization_Roles::EMPLOYEE),
                APP_Authorization_Roles::GUEST);
        $acl->addRole(new Zend_Acl_Role(APP_Authorization_Roles::EMPLOYER),
                APP_Authorization_Roles::GUEST);

        //LOAD RESOURCES
        foreach(APP_Authorization_Resources::getListOfControllers() as $resource)
        {
           $acl
            ->addResource($resource);
        }

        //LOAD PRIVILEGES
        $acl->allow(APP_Authorization_Roles::GUEST, 'index',null);
        $acl->allow(APP_Authorization_Roles::GUEST,'authentication',null);
        $acl->allow(APP_Authorization_Roles::GUEST, 'jobs',null);
        $acl->allow(APP_Authorization_Roles::GUEST, 'error',null);
        $acl->allow(APP_Authorization_Roles::GUEST, 'search',null);
        $acl->allow(APP_Authorization_Roles::GUEST, 'employer','listemployer');
        $acl->allow(APP_Authorization_Roles::GUEST, 'employer','listemployer');
        $acl->allow(APP_Authorization_Roles::GUEST, 'employer','registerform');
		$acl->allow(APP_Authorization_Roles::GUEST, 'employer','index');
		$acl->allow(APP_Authorization_Roles::GUEST, 'employer','createemployee');
        $acl->allow(APP_Authorization_Roles::GUEST, 'profile','create');
        $acl->allow(APP_Authorization_Roles::GUEST, 'admin',null);

        $acl->allow(APP_Authorization_Roles::EMPLOYER, 'employer', null);
		$acl->allow(APP_Authorization_Roles::EMPLOYER, 'searchcv', null);
		$acl->allow(APP_Authorization_Roles::EMPLOYER, 'servcecharge', null);
		$acl->allow(APP_Authorization_Roles::EMPLOYER, 'jobpost', null);

        $acl->allow(APP_Authorization_Roles::EMPLOYEE, 'profile', null);
        $acl->allow(APP_Authorization_Roles::EMPLOYEE, 'resume', null);
        $acl->allow(APP_Authorization_Roles::EMPLOYEE, 'employer', 'block');
        $acl->allow(APP_Authorization_Roles::EMPLOYEE, 'view', null);
        $acl->allow(APP_Authorization_Roles::EMPLOYEE, 'notification', null);
        $acl->allow(APP_Authorization_Roles::EMPLOYEE, 'change', null);
        $acl->allow(APP_Authorization_Roles::EMPLOYEE, 'qualification', null);


        $acl->allow(APP_Authorization_Roles::EMPLOYER, 'jobpost', null);

        return $acl;
    }

    public static function isAccessAllowed($role, $controller, $action)
    {
        return self::getInstance()->isAllowed($role, $controller, $action);
    }
}

