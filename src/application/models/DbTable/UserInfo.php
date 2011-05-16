<?php

class Application_Model_DbTable_UserInfo extends Zend_Db_Table_Abstract
{

    protected $_name = 'tbl_user_info';

    private $_username;
    private $_password;
    private $_usertype;
    private $_createdon;
    private $_lastupdatedon;

    public function getUserName()
    {
        return $_username;
    }

    public function setUserName($username)
    {
        return $_username = $username;
    }

     public function getPassword()
    {
        return $_password;
    }

    public function setPassword($password)
    {
        return $_password = $password;
    }

     public function getUserType()
    {
        return $_username;
    }

}

