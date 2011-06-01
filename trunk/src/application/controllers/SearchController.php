<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SearchController
 *
 * @author Admin
 */
class SearchController extends Zend_Controller_Action {

    protected $_searchform;

    public function init() {
        $this->_searchform = new Application_Form_JobSearchForm();
        $this->_searchform->setAction('jobsearchresult');
        $this->_searchform->setMethod('POST');
    }

    public function jobsearchAction() {
        $this->view->form = $this->_searchform;
        $_SESSION['searchquery'] = '';
    }

    public function quickjobsearchAction()
    {
        $data = $this->getRequest()->getParams();
        var_dump($data);
        exit;
        $val = array();
        array_push($val, array('keyword','asdf'));
        $_SESSION['searchquery'] = $this->getSqlQuery($val);
        $this->_forward('jobsearchresult');
    }

    private function getSqlQuery($querylist)
    {

        $whereclause = " where 1=1";
        $sortby = " T1.JobTitle ";
        $sortorder = " Asc ";

        $query = "SELECT T1.JobID, T1.JobTitle, T4.CompanyName, T1.NoOfVacancy, T1.JobPostDate, T1.ApplicationDeadline
                    FROM
                     tbl_job T1
                    LEFT JOIN tbl_job_requirement T3 ON T1.jobid = T3.jobid
                    LEFT JOIN tbl_job_category T2 on T1.jobcategoryid = T2.jobcategoryid
                    LEFT JOIN tbl_employer T4 ON T1.EmployeerID = T4.UserID
                ";

        foreach($querylist as $querykey => $queryvalue)
        {
            if($queryvalue[0] == 'keyword')
            {
                if(strlen($whereclause) > 0)
                    $whereclause = $whereclause . " AND ";
                $whereclause = $whereclause . " (T1.jobtitle like '%" . $queryvalue[1] . "%') ";
            }
            else if($queryvalue[0] == 'jobcategory' && strtolower($queryvalue[1]) != 'all')
            {
                if(strlen($whereclause) > 0)
                    $whereclause = $whereclause . " AND ";
                $whereclause = $whereclause . " (T2.jobcategory ='" . $queryvalue[1] . "') ";
            }
            else if($queryvalue[0] == 'jobtype' && strtolower($queryvalue[1]) != 'any')
            {

                if(strlen($whereclause) > 0)
                    $whereclause = $whereclause . " AND ";
                $whereclause = $whereclause . " (T3.jobtype ='" . $queryvalue[1] . "') ";
            }
            else if($queryvalue[0] == 'employer')
            {
                if(strlen($whereclause) > 0)
                    $whereclause = $whereclause . " AND ";
                $whereclause = $whereclause . " (T4.companyname like '%" . $queryvalue[1] . "%') ";
            }
            else if($queryvalue[0] == 'salaryfrom')
            {
                if(strlen($whereclause) > 0)
                    $whereclause = $whereclause . " AND ";
                $whereclause = $whereclause . " (ifnull(T3.MinimumSalaryRange,0) >= " . $queryvalue[1] . ") ";
            }
            else if($queryvalue[0] == 'salaryto')
            {
                if(strlen($whereclause) > 0)
                    $whereclause = $whereclause . " AND ";
                $whereclause = $whereclause . " (ifnull(T3.MaximumSalaryRange,0) <= " . $queryvalue[1] . ") ";
            }
            else if($queryvalue[0] == 'experience')
            {
                if(strtolower($queryvalue[1]) == 'any')
                    continue;
                if(strlen($whereclause) > 0)
                    $whereclause = $whereclause . " AND ";
                $whereclause = $whereclause . " (T3.Experience >= " . $this->getExperience($queryvalue[1]) . ") ";
            }
            else if($queryvalue[0] == 'sortorder')
            {
                $sortorder = " " . $this->getSortOrder($queryvalue[1]) . " ";
            }
            else if($queryvalue[0] == 'sortby')
            {
                $sortby = " " . $this->getSortBy($queryvalue[1]) . " ";
            }
        }
        $query = $query . " " . $whereclause . " order by " . $sortby . " " . $sortorder;
        return $query;
    }

     private function getSortOrder($value)
    {
        $value = strtolower($value);
        if($value == 'ascending')
        {
            return ' ASC ';
        }
        return ' DESC ';
    }
    
    private function getSortBy($value)
    {
        $value = strtolower($value);
        if($value == 'company name')
        {
            return ' T4.companyname ';
        }
        else if($value == 'job title')
        {
            return ' T1.jobtitle  ';
        }
        else if($value == 'job post date')
        {
            return ' T1.jobpostdate ';
        }
        else if($value == 'application deadline')
        {
            return ' T1.applicationdeadline ';
        }
    }


    public function jobsearchresultAction() {
        $joblist = new Application_Model_JobsList();
        if (strlen($_SESSION['searchquery']) == 0 && $this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParams();
            
            if (!$this->_searchform->isValid($data)) {
                $this->_forward('jobsearch');
            }
            else
            {
                $querylist = $this->_searchform->getQuery();
                $_SESSION['searchquery'] = $this->getSqlQuery($querylist);
            }
        }
        $result = $joblist->getJobSearchResult($_SESSION['searchquery']);
        $this->view->paginator = APP_Action_Helper_CustomActionHelper::
                getPaginationControl($result,
                        $this->getRequest()->getParam('page'));
        $this->view->resultlist = $result;
    }
}

?>
