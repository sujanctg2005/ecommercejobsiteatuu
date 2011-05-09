<?php

class Application_Model_DbTable_EmployeeProfile extends Zend_Db_Table_Abstract
{

    protected $_name = 'tbl_employee';

    public function addEmployee($Name, $DOB, $Gender, $MaritialStatus, $Nationality, $Religion,
            $CurrentAddress, $PermanentAddress, $HomePhone, $Mobile, $OfficePhone, $Email,
            $AlternativeEmail, $ImagePath) {
        $data = array(
            'Name' => $Name,
            'DateOfBirth' => $DOB,
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
        $this->insert($data);
    }
}

