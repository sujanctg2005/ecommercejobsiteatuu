<?php
class Application_Model_DbTable_EmployeeQualification extends Zend_Db_Table_Abstract {

    public function addQualification($data){
        $table = Zend_Db_Table_Abstract::getDefaultAdapter();
        $table->beginTransaction();
        $table->insert('tbl_academic_qualification',$data[0]);
        $table->insert('tbl_qualification',$data[1]);
        $table->commit();
    }

    public function updateQualification($data){
        $table = Zend_Db_Table_Abstract::getDefaultAdapter();
        $table->beginTransaction();
        $table->update('tbl_academic_qualification',$data[0], 'EmployeeID = ' . $data[0]["EmployeeID"]);
        $table->update('tbl_qualification',$data[1], 'EmployeeID = '. $data[0]["EmployeeID"]);
        $table->commit();
    }
}
?>
