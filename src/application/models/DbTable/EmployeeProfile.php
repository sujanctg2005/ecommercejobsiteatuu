<?php

class Application_Model_DbTable_EmployeeProfile extends Zend_Db_Table_Abstract {

    protected $_name = 'tbl_employee';
    protected $_employeeinfo = 'tbl_user_info';

    public function checkUnique($username)
    {
        $select = "select Username from tbl_user_info where Username = '". $username . "'";
        $result = $this->getAdapter()->fetchOne($select);
        if($result){
            return true;
        }
        return false;
    }

    public function checkAvailable($password)
    {
        $oldPassword = Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper')
                    ->md5encrypt($data['Password']);
        $currentPassword = Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper')
                    ->md5encrypt($password);
        $select = "select '". $oldPassword ."' from tbl_user_info where Password = '". $currentPassword . "'";
        var_dump($select);
        exit;
        $result = $this->getAdapter()->fetchOne($select);
        if($result){
            return true;
        }
        return false;
    }
    
    public function addEmployee($Username, $Password, $Name, $DOB, $Gender,
            $MaritialStatus, $Nationality, $Religion, $CurrentAddress,
            $PermanentAddress, $HomePhone, $Mobile, $OfficePhone, $Email,
            $AlternativeEmail, $ImagePath) {
        $table = Zend_Db_Table_Abstract::getDefaultAdapter();
        $table->beginTransaction();

        $CurDate = $table->fetchOne('select curdate()');
        $employeeLoginInfo = array(
            'Username' => $Username,
            'Password' => Zend_Controller_Action_HelperBroker::getExistingHelper('CustomActionHelper')->md5encrypt($password),
            'UserType' => 'Employee',
            'CreatedOn' => $CurDate,
            'LastUpdatedOn' => $CurDate
        );
        $table->insert('tbl_user_info',$employeeLoginInfo);
        
        $UserID = $table->fetchOne('select last_insert_id()');
        $modifiedDOB = new Zend_Db_Expr("str_to_date('$DOB','%m/%d/%Y')");
        $employeeInfo = array(
            'UserID' => $UserID,
            'Name' => $Name,
            'DateOfBirth' => $modifiedDOB,
            'Gender' => $Gender,
            'MaritialStatus' => $MaritialStatus,
            'Nationality' => $Nationality,
            'Religion' => $Religion,
            'CurrentAddress' => $CurrentAddress,
            'PermanentAddress' => $PermanentAddress,
            'HomePhone' => $HomePhone,
            'Mobile' => $Mobile,
            'OfficePhone' => $OfficePhone,
            'Email' => $Email,
            'AlternativeEmail' => $AlternativeEmail,
            'ImagePath' => $ImagePath
        );
        $table->insert('tbl_employee',$employeeInfo);
        $table->commit();
    }

    public function updateEmplyeeInfo($UserID, $Name, $DOB, $Gender,
            $MaritialStatus, $Nationality, $Religion, $CurrentAddress,
            $PermanentAddress, $HomePhone, $Mobile, $OfficePhone, $Email,
            $AlternativeEmail, $ImagePath) {
        $table = Zend_Db_Table_Abstract::getDefaultAdapter();
        $modifiedDOB = new Zend_Db_Expr("str_to_date('$DOB','%m/%d/%Y')");
        echo $modifiedDOB;
        
        $data = array(
           'Name' => $Name,
            'DateOfBirth' => $modifiedDOB,
            'Gender' => $Gender,
            'MaritialStatus' => $MaritialStatus,
            'Nationality' => $Nationality,
            'Religion' => $Religion,
            'CurrentAddress' => $CurrentAddress,
            'PermanentAddress' => $PermanentAddress,
            'HomePhone' => $HomePhone,
            'Mobile' => $Mobile,
            'OfficePhone' => $OfficePhone,
            'Email' => $Email,
            'AlternativeEmail' => $AlternativeEmail,
            'ImagePath' => $ImagePath
        );
        $this->update($data, 'UserID = '. (int)$UserID);
    }
}

