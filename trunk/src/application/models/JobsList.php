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
                        'j.jobcategoryid=jc.jobcategory',
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
                ->where("jobcategoryid='".$categoryid."'");

        return $this->_table->fetchAll($query);
    }

    public function getJobDetail($jobid)
    {

        $select = $this->_table->select();

        $select->from(array('j'=>'tbl_job'))
                ->join(
                        array('jc'=>'tbl_job_category'),
                        'j.jobcategoryid=jc.jobcategory',
                        array('Job Category :)'=>'JobCategory')
                       )
                ->join(array('emp'=>'tbl_employer'),
                        'j.employeerid = emp.userid')
                ->joinLeft(array('req'=>'tbl_job_requirement'),
                        'j.jobid=req.jobid')
                ->where('j.jobid='.$jobid)
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

    public function applyForJob($jobid, $employeeid)
    {
        $result = $this->_table->fetchOne(
                "select 1 from tbl_job_application where jobid='$jobid'
                and employeeid ='$employeeid'");

        if(!$result)
        {
            $this->_table->insert('tbl_job_application',
                    array(
                        'jobid'=>$jobid,
                        'employeeid'=>$employeeid,
                        'ApplicationDate'=>new Zend_Db_Expr("CURDATE()")
                        ));
            return true;
        }

        return false;
    }

        public function getJobHistory($employeeid)
    {
        $sql ="SELECT
                    T1.JobID,
                    T2.JobTitle,
                    T2.CompanyName,
                    T1.ApplicationDate,
                    T2.JobPostDate
                    
            FROM tbl_job_application T1, tbl_job T2, tbl_employer T3
                where T1.jobid = T2.jobid and T2.employeerid = T3.userid
                and T1.employeeid =$employeeid";
        $result = $this->_table->fetchAll($sql);
        return $result;
    }

    public function removeJobApplication($jobid, $employeeid)
    {
        $this->_table->delete('tbl_job_application',
                "jobid=$jobid and employeeid = $employeeid");
    }
}

