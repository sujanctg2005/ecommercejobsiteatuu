<?php

class Application_Model_JobsList
{

    protected $_table;

    public function  __construct()
    {
        $this->_table = Zend_Db_Table::getDefaultAdapter();
    }

    public function getJobsCountByCategory()
    {
        $select = $this->_table->select();

        $select->from(array('j'=>'tbl_job'),null)
                ->join(
                        array('jc'=>'tbl_job_category'),
                        'j.jobcategoryid=jc.jobcategoryid',
                        array('jc.jobcategoryid', 'jc.jobcategory',
                            'jobcount'=>'count(jc.jobcategoryid)')
                       )
                ->group(array('jc.jobcategoryid', 'jc.jobcategory'))
                ->order('jobcount');

        return $this->_table->fetchAll($select);
    }

    public function getJobsForCategory($categoryid)
    {
        $query = $this->_table
                ->select()
                ->from('tbl_job')
                ->where('jobcategoryid='.$categoryid);

        //APP_Action_Helper_CustomActionHelper::getQueryProfileDump($query);
        return $this->_table->fetchAll($query);
    }

    public function getJobDetail($jobid)
    {

        $select = $this->_table->select();

        $select->from(array('j'=>'tbl_job'))
                ->join(
                        array('jc'=>'tbl_job_category'),
                        'j.jobcategoryid=jc.jobcategoryid',
                        array('Job Category :)'=>'JobCategory')
                       )
                ->join(array('emp'=>'tbl_employer'),
                        'j.employeerid = emp.userid')
                ->where('jobid='.$jobid)
                ->order('jobpostdate');

        return $this->_table->fetchAll($select);
    }

    public function getJobsByEmployer($employerid)
    {
        $query = $this->_table
                ->select()
                ->from('tbl_job')
                ->where('employeerid='.$employerid);

        //APP_Action_Helper_CustomActionHelper::getQueryProfileDump($query);
        return $this->_table->fetchAll($query);

    }

    public function getCategoryName($jobCategoryID)
    {
        $select = $this->_table->select();

        $select->from(array('jc'=>'tbl_job_category'), 'JobCategory')
                ->where('jc.jobcategoryid ='.$jobCategoryID);

        return $this->_table->fetchOne($select);
    }

    public function getListOfJobCategory()
    {
        $select = $this->_table->select();

        $select->from(array('jc'=>'tbl_job_category'), 'JobCategory');

        return $this->_table->fetchAll($select);
    }

    public function getJobSearchResult($sql)
    {
        return $this->_table->fetchAll($sql);
    }
}

