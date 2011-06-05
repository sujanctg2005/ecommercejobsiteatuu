<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APP_Authentication_Authenticator
 *
 * @author Admin
 */
class APP_Authentication_Authenticator
{

    public static function authenticateUser($username, $password)
    {
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());

        $authAdapter ->setTableName("tbl_user_info");

        $authAdapter ->setIdentityColumn("username")
                     ->setCredentialColumn("password");

        $authAdapter->setIdentity($username)
                        ->setCredential(
                                 Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper')->md5encrypt($password));

        $authenticate = Zend_Auth::getInstance()
                        ->authenticate($authAdapter);

         if($authenticate->isValid())
         {
             $userInfo = $authAdapter->getResultRowObject(null,'password');
             $authStorage = Zend_Auth::getInstance()-> getStorage();
             $authStorage->write($userInfo);
             return true;
         }
         else
         {
              return false;
         }

    }

    public static function logout()
    {
        Zend_Auth::getInstance()->clearIdentity();
    }
}
