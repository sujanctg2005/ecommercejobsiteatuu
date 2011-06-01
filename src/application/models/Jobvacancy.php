<?php
class Application_Model_Jobvacancy
{
    private $jobID;
    private $jobTitle;
    private $noOfVacancy;
    private $jobCategoryID;
    private $jobPostDate;
    private $applicationDeadline;
    private $employeerID;
    private $designation;
    private $companyName;
    private $hideCompanyName;
    private $jobRequirementID;
    private $gender;
    private $minimumAgeLimit;
    private $maximumAgeLimit;
    private $jobType;
    private $educationalQualificationalID;
    private $minexperience;
    private $mixexperience;
    private $jobResponsibility;
    private $additionalJobRequirement;
    private $minimumSalaryRange;
    private $maximumSalaryRange;
    private $benifits;
	 // sujan
    private $totalJob;
    /**
     * @return the $totalJob
     */
    public function getTotalJob ()
    {
        return $this->totalJob;
    }
    /**
     * @param field_type $totalJob
     */
    public function setTotalJob ($totalJob)
    {
        $this->totalJob = $totalJob;
    }
    // end sujan
    /**
     * @return the $jobID
     */
    public function getJobID ()
    {
        return $this->jobID;
    }
    /**
     * @return the $jobTitle
     */
    public function getJobTitle ()
    {
        return $this->jobTitle;
    }
    /**
     * @return the $noOfVacancy
     */
    public function getNoOfVacancy ()
    {
        return $this->noOfVacancy;
    }
    /**
     * @return the $jobCategoryID
     */
    public function getJobCategoryID ()
    {
        return $this->jobCategoryID;
    }
    /**
     * @return the $jobPostDate
     */
    public function getJobPostDate ()
    {
        return $this->jobPostDate;
    }
    /**
     * @return the $applicationDeadline
     */
    public function getApplicationDeadline ()
    {
        return $this->applicationDeadline;
    }
    /**
     * @return the $employeerID
     */
    public function getEmployeerID ()
    {
        return $this->employeerID;
    }
    /**
     * @return the $designation
     */
    public function getDesignation ()
    {
        return $this->designation;
    }
    /**
     * @return the $companyName
     */
    public function getCompanyName ()
    {
        return $this->companyName;
    }
    /**
     * @return the $hideCompanyName
     */
    public function getHideCompanyName ()
    {
        return $this->hideCompanyName;
    }
    /**
     * @return the $jobRequirementID
     */
    public function getJobRequirementID ()
    {
        return $this->jobRequirementID;
    }
    /**
     * @return the $gender
     */
    public function getGender ()
    {
        return $this->gender;
    }
    /**
     * @return the $minimumAgeLimit
     */
    public function getMinimumAgeLimit ()
    {
        return $this->minimumAgeLimit;
    }
    /**
     * @return the $maximumAgeLimit
     */
    public function getMaximumAgeLimit ()
    {
        return $this->maximumAgeLimit;
    }
    /**
     * @return the $jobType
     */
    public function getJobType ()
    {
        return $this->jobType;
    }
    /**
     * @return the $educationalQualificationalID
     */
    public function getEducationalQualificationalID ()
    {
        return $this->educationalQualificationalID;
    }
    /**
     * @return the $minexperience
     */
    public function getMinexperience ()
    {
        return $this->minexperience;
    }
    /**
     * @return the $mixexperience
     */
    public function getMixexperience ()
    {
        return $this->mixexperience;
    }
    /**
     * @return the $jobResponsibility
     */
    public function getJobResponsibility ()
    {
        return $this->jobResponsibility;
    }
    /**
     * @return the $additionalJobRequirement
     */
    public function getAdditionalJobRequirement ()
    {
        return $this->additionalJobRequirement;
    }
    /**
     * @return the $minimumSalaryRange
     */
    public function getMinimumSalaryRange ()
    {
        return $this->minimumSalaryRange;
    }
    /**
     * @return the $maximumSalaryRange
     */
    public function getMaximumSalaryRange ()
    {
        return $this->maximumSalaryRange;
    }
    /**
     * @return the $benifits
     */
    public function getBenifits ()
    {
        return $this->benifits;
    }
    /**
     * @param field_type $jobID
     */
    public function setJobID ($jobID)
    {
        $this->jobID = $jobID;
    }
    /**
     * @param field_type $jobTitle
     */
    public function setJobTitle ($jobTitle)
    {
        $this->jobTitle = $jobTitle;
    }
    /**
     * @param field_type $noOfVacancy
     */
    public function setNoOfVacancy ($noOfVacancy)
    {
        $this->noOfVacancy = $noOfVacancy;
    }
    /**
     * @param field_type $jobCategoryID
     */
    public function setJobCategoryID ($jobCategoryID)
    {
        $this->jobCategoryID = $jobCategoryID;
    }
    /**
     * @param field_type $jobPostDate
     */
    public function setJobPostDate ($jobPostDate)
    {
        $this->jobPostDate = $jobPostDate;
    }
    /**
     * @param field_type $applicationDeadline
     */
    public function setApplicationDeadline ($applicationDeadline)
    {
        $this->applicationDeadline = $applicationDeadline;
    }
    /**
     * @param field_type $employeerID
     */
    public function setEmployeerID ($employeerID)
    {
        $this->employeerID = $employeerID;
    }
    /**
     * @param field_type $designation
     */
    public function setDesignation ($designation)
    {
        $this->designation = $designation;
    }
    /**
     * @param field_type $companyName
     */
    public function setCompanyName ($companyName)
    {
        $this->companyName = $companyName;
    }
    /**
     * @param field_type $hideCompanyName
     */
    public function setHideCompanyName ($hideCompanyName)
    {
        $this->hideCompanyName = $hideCompanyName;
    }
    /**
     * @param field_type $jobRequirementID
     */
    public function setJobRequirementID ($jobRequirementID)
    {
        $this->jobRequirementID = $jobRequirementID;
    }
    /**
     * @param field_type $gender
     */
    public function setGender ($gender)
    {
        $this->gender = $gender;
    }
    /**
     * @param field_type $minimumAgeLimit
     */
    public function setMinimumAgeLimit ($minimumAgeLimit)
    {
        $this->minimumAgeLimit = $minimumAgeLimit;
    }
    /**
     * @param field_type $maximumAgeLimit
     */
    public function setMaximumAgeLimit ($maximumAgeLimit)
    {
        $this->maximumAgeLimit = $maximumAgeLimit;
    }
    /**
     * @param field_type $jobType
     */
    public function setJobType ($jobType)
    {
        $this->jobType = $jobType;
    }
    /**
     * @param field_type $educationalQualificationalID
     */
    public function setEducationalQualificationalID (
    $educationalQualificationalID)
    {
        $this->educationalQualificationalID = $educationalQualificationalID;
    }
    /**
     * @param field_type $minexperience
     */
    public function setMinexperience ($minexperience)
    {
        $this->minexperience = $minexperience;
    }
    /**
     * @param field_type $mixexperience
     */
    public function setMixexperience ($mixexperience)
    {
        $this->mixexperience = $mixexperience;
    }
    /**
     * @param field_type $jobResponsibility
     */
    public function setJobResponsibility ($jobResponsibility)
    {
        $this->jobResponsibility = $jobResponsibility;
    }
    /**
     * @param field_type $additionalJobRequirement
     */
    public function setAdditionalJobRequirement ($additionalJobRequirement)
    {
        $this->additionalJobRequirement = $additionalJobRequirement;
    }
    /**
     * @param field_type $minimumSalaryRange
     */
    public function setMinimumSalaryRange ($minimumSalaryRange)
    {
        $this->minimumSalaryRange = $minimumSalaryRange;
    }
    /**
     * @param field_type $maximumSalaryRange
     */
    public function setMaximumSalaryRange ($maximumSalaryRange)
    {
        $this->maximumSalaryRange = $maximumSalaryRange;
    }
    /**
     * @param field_type $benifits
     */
    public function setBenifits ($benifits)
    {
        $this->benifits = $benifits;
    }
    public function insertJobVacancey ()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        // $DB->insert('tbl_job', $this->puplateToArray());
        $DB->insert('tbl_job', $this->puplateToArray());
        $id = $DB->lastInsertId();
        $this->setJobID($id);
        $DB->insert('tbl_job_requirement', $this->puplateRequirmentToArray());
    }
    public function editJobVacancey ()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        $where[] = "JobID =".$this->getJobID();
        $DB->update('tbl_job', $this->puplateToArray(), $where);
       $where[] = "JobRequirementID =".$this->getJobRequirementID();
        $DB->update('tbl_job_requirement', $this->puplateRequirmentToArray(),$where);
    }
    public function deleteJobVacancey ()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        $DB->delete('tbl_job', 'JobID = ' . $this->getJobID());
        $DB->delete('tbl_job_requirement', 
        'JobRequirementID = ' . $this->getJobRequirementID());
    }
	
	    // sujan
    public function summaryJob ()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        $sql = "SELECT e.CompanyName CompanyName, count( JobID ) totalJob
						FROM tbl_job j, tbl_employer e
						WHERE j.EmployeerID = e.UserID
						GROUP BY e.CompanyName";
        $result = $DB->fetchAll($sql);
        return $result;
    }
    public function monthlySummaryJob ()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        $sql = "SELECT  MONTHNAME( JobPostDate ) month, count( JobID ) totalJob
FROM tbl_job j, tbl_employer e
WHERE j.EmployeerID = e.UserID
GROUP BY  MONTHNAME( JobPostDate )   order by MONTH(JobPostDate)";
        $result = $DB->fetchAll($sql);
        return $result;
    }
    public function pupolateJobSummery ($result)
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        $entries = array();
        foreach ($result as $row) {
            $entry = new Application_Model_Jobvacancy();
            $entry->setJobID($row->CompanyName);
            $entry->setJobTitle($row->totalJob);
            $entries[] = $entry;
        }
        return $entries;
    }
    
 public function getPaymentStatus ()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        $sql = "Select e.`CompanyName`, charge.ServiceId, charge.ServiceType, charge.ServiceFee, serv.Status  from  `tbl_service_charge` charge,
 `tbl_employerpaymentstatus` serv , tbl_employer e
 where charge.ServiceId = serv.ServiceId and e.`UserID`=serv.`EmployerId`";
        $result = $DB->fetchAll($sql);
        return $result;
    }
    
    
    
    
    // end sujan
    public function findJobVacanceyById()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
       
        $sql = "SELECT * FROM `tbl_job` where JobID =".$this->getJobID();
        $result = $DB->fetchRow($sql);
        $this->puplateObject($result);
    }
 public function findJobPostByEmplyerID()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        $sql = "SELECT * FROM `tbl_job` where EmployeerID=".$this->getEmployeerID();
        $result = $DB->fetchAll($sql);
        return $this->puplateObjectList($result);
    }
  public function puplateToArray ()
    {
        $data = array('JobTitle' => $this->getJobTitle(), 
        'NoOfVacancy' => $this->getNoOfVacancy(), 
        'JobCategoryID' => $this->getJobCategoryID(), 
        'JobPostDate' =>new Zend_Db_Expr("CURDATE()"),
        'ApplicationDeadline' => $this->getApplicationDeadline(), 
        'EmployeerID' => $this->getEmployeerID(), 
        'Designation' => $this->getDesignation(), 
        'CompanyName' => $this->getCompanyName(), 
        'HeightCompanyName' => $this->getHideCompanyName());
        return $data;
    }
    
    public function puplateRequirmentToArray ()
    {   
         //$this->setJobID(7);
    	$data = array('JobID' =>$this->getJobID(),
         'Gender' => $this->getGender(), 
        'MinimumAgeLimit' => $this->getMinimumAgeLimit(),  
        'MaximumAgeLimit' => $this->getMaximumAgeLimit(), 
        'JobType' => $this->getJobType(), 
        'EducationalQualificational' => $this->getEducationalQualificationalID(), 
        'MinimumExperience' => $this->getMinexperience(), 
        'MaximumExperience' => $this->getMixexperience(), 
        'JobResponsibility' => $this->getJobResponsibility(), 
        'AdditionalJobRequirement' => $this->getAdditionalJobRequirement(), 
        'MinimumSalaryRange' => $this->getMinimumSalaryRange(), 
        'MaximumSalaryRange' => $this->getMaximumSalaryRange(), 
        'Benifits' => $this->getBenifits());
        return $data;
    }
    public function puplateObject ($result)
    {   
         $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
    	$row = $result;
    	$this->setJobID($row->JobID);
        $this->setJobTitle($row->JobTitle);
        $this->setNoOfVacancy($row->NoOfVacancy);
        $this->setJobCategoryID($row->JobCategoryID);
        $this->setJobPostDate($row->JobPostDate);
        $this->setApplicationDeadline($row->ApplicationDeadline);
        $this->setEmployeerID($row->EmployeerID);
        $this->setDesignation($row->Designation);
        $this->setCompanyName($row->CompanyName);
        $this->setHideCompanyName($row->HeightCompanyName);
        
        $sql = "SELECT * FROM `tbl_job_requirement` where JobID='".$this->getJobID()."'";
        $rows = $DB->fetchRow($sql);
         //$this->setJobRequirementID($rows->JobRequirementID);
        $this->setjobID($rows->JobID);
        $this->setGender($rows->Gender);
        $this->setMinimumAgeLimit($rows->MinimumAgeLimit);
        $this->setMaximumAgeLimit($rows->MaximumAgeLimit);
        $this->setJobType($rows->JobType);
        $this->setEducationalQualificationalID(
        $rows->EducationalQualificational);
        $this->setMinexperience($rows->MinimumExperience);
        $this->setMixexperience($rows->MaximumExperience);
        $this->setJobResponsibility($rows->JobResponsibility);
        $this->setAdditionalJobRequirement($rows->AdditionalJobRequirement);
        $this->setMinimumSalaryRange($rows->MinimumSalaryRange);
        $this->setMaximumSalaryRange($rows->MaximumSalaryRange);
        $this->setBenifits($rows->Benifits);
    }
    public function puplateObjectList ($result)
    {   
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        $entries = array();
        foreach ($result as $row) {
            $entry = new Application_Model_Jobvacancy();
            $entry->setJobID($row->JobID);
            $entry->setJobTitle($row->JobTitle);
            $entry->setNoOfVacancy($row->NoOfVacancy);
            $entry->setJobCategoryID($row->JobCategoryID);
            $entry->setJobPostDate($row->JobPostDate);
            $entry->setApplicationDeadline($row->ApplicationDeadline);
            $entry->setEmployeerID($row->EmployeerID);
            $entry->setDesignation($row->Designation);
            $entry->setCompanyName($row->CompanyName);
            $entry->setHideCompanyName($row->HeightCompanyName);
            $sql = "SELECT * FROM `tbl_job_requirement` where JobID='".$entry->getJobID()."'";
            $rows = $DB->fetchRow($sql);
            $entry->setJobRequirementID($rows->JobRequirementID);
            $entry->setjobID($rows->JobID);
            $entry->setGender($rows->Gender);
            $entry->setMinimumAgeLimit($rows->MinimumAgeLimit);
            $entry->setMaximumAgeLimit($rows->MaximumAgeLimit);
            $entry->setJobType($rows->JobType);
            $entry->setEducationalQualificationalID(
            $rows->EducationalQualificational);
            $entry->setMinexperience($rows->MinimumExperience);
            $entry->setMixexperience($rows->MaximumExperience);
            $entry->setJobResponsibility($rows->JobResponsibility);
            $entry->setAdditionalJobRequirement($rows->AdditionalJobRequirement);
            $entry->setMinimumSalaryRange($rows->MinimumSalaryRange);
            $entry->setMaximumSalaryRange($rows->MaximumSalaryRange);
            $entry->setBenifits($rows->Benifits);
            $entries[] = $entry;
        }
        return $entries;
    }
  
    
   }	

