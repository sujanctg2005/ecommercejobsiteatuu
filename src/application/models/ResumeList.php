<?php
class Application_Model_ResumeList{
    protected $_table;

    public function __construct(){
        $this->_table = Zend_Db_Table::getDefaultAdapter();
    }

    public function getResumeDetail($userid){
        $sql = "
                select
                Name,
                DATE_FORMAT(DateOfBirth,'%m/%d/%Y') as DateOfBirth,
                Gender,
                MaritialStatus,
                Nationality,
                Religion,
                CurrentAddress,
                PermanentAddress,
                HomePhone,
                Mobile,
                OfficePhone,
                Email,
                AlternativeEmail,
                ImagePath
                From tbl_employee
                where UserID =
            " . $userid;
        $select = $this->_table->select();
        $select->from(array('tbl_employee'))
                ->where('tbl_employee.UserID='.$userid);
        return $this->_table->fetchAll($sql);
    }
}
?>
