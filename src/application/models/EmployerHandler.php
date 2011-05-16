<?php
/**
 * Description of EmployerHandler
 *
 * @author Admin
 */
class Application_Model_EmployerHandler {

    protected $_table;

    public function  __construct()
    {
        $this->_table = Zend_Db_Table::getDefaultAdapter();
    }

    public function getListOfEmployers()
    {
        $select = $this->_table->select();

        $select->from(array('j'=>'tbl_employer'),
                array(
                    'EmployerID'=>'UserID',
                    'EmployerName'=>'CompanyName'
                ))
                ->order('j.CompanyName');

        return $this->_table->fetchAll($select);
    }
}