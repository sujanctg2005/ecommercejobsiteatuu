<?php


class APP_Authorization_Authorizer {
    //put your code here

    protected static $_acl = null;

    private static function getInstance()
    {
        if(null == self::$_acl)
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
           $acl->addResource($resource);
        }

        //LOAD PRIVILEGES
        $acl->allow(APP_Authorization_Roles::GUEST, 'index',null);
        $acl->allow(APP_Authorization_Roles::GUEST,'authentication',null);
        $acl->allow(APP_Authorization_Roles::GUEST, 'jobs',null);

        $acl->allow(APP_Authorization_Roles::EMPLOYER, 'employer', null);

        $acl->allow(APP_Authorization_Roles::EMPLOYEE, 'profile', null);
        $acl->allow(APP_Authorization_Roles::EMPLOYEE, 'resume', null);

        return $acl;
    }

    public static function isAccessAllowed($role, $controller, $action)
    {
        return self::getInstance()->isAllowed($role, $controller, $action);
    }
}

