<?php

class Application_Model_DbTable_JobCategory extends Zend_Db_Table_Abstract
{
    protected $_name = 'tbl_job_category';

    public function getJobCategory($JobCategoryID)
    {
       $JobCategoryID = (int)$JobCategoryID;
       $row = $this->fetchRow();
       if(!$row)
       {
           throw new Exception("Couldnot find the row $JobCategoryID");
       }
       return $row->toArray();
    }

    public function getJobCategoryLike($category)
    {
        $this->select()->where('JobCategory LIKE ?', '$category');
    }

    public function addJobCategory($category)
    {
        $data = array('JobCategory'=> $category);
        $this->insert($data);
    }

    public function deleteJobCategory($JobCategoryID)
    {
        $this->deleteJobCategory($JobCategoryID);
    }

    public function updateJobCategory($JobCategoryID, $category)
    {
        $this->updateJobCategory($JobCategoryID, $category);
    }
}

