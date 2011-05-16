<?php

class Application_Model_DbTable_EmployeeProfile extends Zend_Db_Table_Abstract {

    public function addEmployee($Username, $Password, $Name, $DOB, $Gender, $MaritialStatus, $Nationality, $Religion, $CurrentAddress, $PermanentAddress, $HomePhone, $Mobile, $OfficePhone, $Email, $AlternativeEmail, $ImagePath) {
        $table = Zend_Db_Table_Abstract::getDefaultAdapter();
        $table->beginTransaction();

        $CurDate = $table->fetchOne('select curdate()');
        $employeeLoginInfo = array(
            'Username' => $Username,
            'Password' => $Password,
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
}

