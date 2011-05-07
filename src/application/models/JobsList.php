<?php

class Application_Model_JobsList
{

    public function getJobsCountByCategory($top)
    {
        $dbtable = Zend_Db_Table::getDefaultAdapter();

        $select = $dbtable->select();

        $select->from(array('j'=>'tbl_job'),null)
                ->join(
                        array('jc'=>'tbl_job_category'),
                        'j.jobcategoryid=jc.jobcategoryid',
                        array('jc.jobcategoryid', 'jc.jobcategory',
                            'jobcount'=>'count(jc.jobcategoryid)')
                       )
                ->group(array('jc.jobcategoryid', 'jc.jobcategory'))
                ->order('jobcount')
                ->limit($top);

        return $dbtable->fetchAll($select);
    }

    public function getJobsForCategory($categoryid)
    {
        $jobtable = new Application_Model_DbTable_Job();

        return $jobtable->fetchAll('jobcategoryid='.$categoryid);
    }

    public function getJobDetail($jobid)
    {
        $dbtable = Zend_Db_Table::getDefaultAdapter();

        $select = $dbtable->select();

        $select->from(array('j'=>'tbl_job'))
                ->join(
                        array('jc'=>'tbl_job_category'),
                        'j.jobcategoryid=jc.jobcategoryid'
                       )
                ->where('jobid='.$jobid)
                ->order('jobpostdate');


        return $dbtable->fetchAll($select);
    }
}

