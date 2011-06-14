<?php

class Application_Model_SearchResume
{
private $postDate;
private $qualificationType;
private $fullName;
private $emailAddress;
private $employeeId;
private $location;
private $qualificattionId;
private $mobile;
private $gender;
private $fromDate;
private $toDate;
private $address;
private $organization;
private $emailTo;
private $emailFrom;
private $subjject;
private $body;

/**
	 * @return the $emailTo
	 */
	public function getEmailTo() {
		return $this->emailTo;
	}

/**
	 * @return the $emailFrom
	 */
	public function getEmailFrom() {
		return $this->emailFrom;
	}

/**
	 * @return the $subjject
	 */
	public function getSubjject() {
		return $this->subjject;
	}

/**
	 * @return the $body
	 */
	public function getBody() {
		return $this->body;
	}

/**
	 * @param field_type $emailTo
	 */
	public function setEmailTo($emailTo) {
		$this->emailTo = $emailTo;
	}

/**
	 * @param field_type $emailFrom
	 */
	public function setEmailFrom($emailFrom) {
		$this->emailFrom = $emailFrom;
	}

/**
	 * @param field_type $subjject
	 */
	public function setSubjject($subjject) {
		$this->subjject = $subjject;
	}

/**
	 * @param field_type $body
	 */
	public function setBody($body) {
		$this->body = $body;
	}

	/**
	 * @return the $organization
	 */
	public function getOrganization() {
		return $this->organization;
	}

/**
	 * @param field_type $organization
	 */
	public function setOrganization($organization) {
		$this->organization = $organization;
	}

	/**
	 * @return the $fromDate
	 */
	public function getFromDate() {
		return $this->fromDate;
	}

/**
	 * @return the $toDate
	 */
	public function getToDate() {
		return $this->toDate;
	}

/**
	 * @return the $address
	 */
	public function getAddress() {
		return $this->address;
	}

/**
	 * @param field_type $fromDate
	 */
	public function setFromDate($fromDate) {
		$this->fromDate = $fromDate;
	}

/**
	 * @param field_type $toDate
	 */
	public function setToDate($toDate) {
		$this->toDate = $toDate;
	}

/**
	 * @param field_type $address
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * @return the $gender
	 */
	public function getGender() {
		return $this->gender;
	}

/**
	 * @param field_type $gender
	 */
	public function setGender($gender) {
		$this->gender = $gender;
	}

	/**
	 * @return the $mobile
	 */
	public function getMobile() {
		return $this->mobile;
	}

/**
	 * @param field_type $mobile
	 */
	public function setMobile($mobile) {
		$this->mobile = $mobile;
	}

	/**
	 * @return the $postDate
	 */
	public function getPostDate() {
		return $this->postDate;
	}

/**
	 * @return the $qualificationType
	 */
	public function getQualificationType() {
		return $this->qualificationType;
	}

/**
	 * @return the $fullName
	 */
	public function getFullName() {
		return $this->fullName;
	}

/**
	 * @return the $emailAddress
	 */
	public function getEmailAddress() {
		return $this->emailAddress;
	}

/**
	 * @return the $employeeId
	 */
	public function getEmployeeId() {
		return $this->employeeId;
	}

/**
	 * @return the $location
	 */
	public function getLocation() {
		return $this->location;
	}

/**
	 * @return the $qualificattionId
	 */
	public function getQualificattionId() {
		return $this->qualificattionId;
	}

/**
	 * @param field_type $postDate
	 */
	public function setPostDate($postDate) {
		$this->postDate = $postDate;
	}

/**
	 * @param field_type $qualificationType
	 */
	public function setQualificationType($qualificationType) {
		$this->qualificationType = $qualificationType;
	}

/**
	 * @param field_type $fullName
	 */
	public function setFullName($fullName) {
		$this->fullName = $fullName;
	}

/**
	 * @param field_type $emailAddress
	 */
	public function setEmailAddress($emailAddress) {
		$this->emailAddress = $emailAddress;
	}

/**
	 * @param field_type $employeeId
	 */
	public function setEmployeeId($employeeId) {
		$this->employeeId = $employeeId;
	}

/**
	 * @param field_type $location
	 */
	public function setLocation($location) {
		$this->location = $location;
	}

/**
	 * @param field_type $qualificattionId
	 */
	public function setQualificattionId($qualificattionId) {
		$this->qualificattionId = $qualificattionId;
	}
public function findResumeByEmployeeId()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        $sql = "SELECT * FROM `tbl_qualification` where EmployeeID=".$this->getEmployeeId();
        $result = $DB->fetchAll($sql);
     
       return  $this->puplateResumeList($result);
        
       
    }
  public function puplateResumeList ($result)
    {   
        
        $entries = array();
        foreach ($result as $row) {
            $entry = new Application_Model_SearchResume();
            //$entry->setQualificationType($row->QualificationType);
            $entry->setQualificattionId($row->QualificationID);
            $entry->setFromDate($row->FromDate);
             $entry->setToDate($row->ToDate);
             $entry->setLocation($row->OrganizationAddress);
             $entry->setOrganization($row->Organization);
              $entries[] = $entry;
        }
       
        return $entries;
    }
public function findAllEmployee()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
         //$where[] = "JobRequirementID =".$this->getJobRequirementID();
         $sql = "SELECT * FROM `tbl_employee` ";//where QualificationType='".$this->getQualificationType()."'";
         $result = $DB->fetchAll($sql);
     
       return  $this->puplateAllEmployee($result);
        
       
    }
  public function puplateAllEmployee ($result)
    {   
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        $entries = array();
        foreach ($result as $row) {
            $entry = new Application_Model_SearchResume();
            $entry->setEmployeeId($row->UserID);
            $entry->setFullName($row->Name);
            $entry->setEmailAddress($row->Email);
            $entry->setAddress($row->CurrentAddress);
            $entry->setGender($row->Gender);
            $entry->setMobile($row->Mobile);
            $entries[] = $entry;
        }
        
        return $entries;
    }

 public function insertEmployeeEmail ()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        //$DB->insert('tbl_Email', $this->puplateToArray());
        $this->sendEmailToEmployee();
    }
public function puplateToArray ()
    {
        $data = array('UserID' => $this->getUserId(), 
        'CompanyName' => $this->getCompanyname(), 
        );
        return $data;
    }
public function sendEmailToEmployee ()
    {
 	$mail = new Zend_Mail ();
    $mail->setFrom ($this->getEmailFrom(), 'Chomp! Alerts');
    $mail->addTo ($this->getEmailTo(), 'Server');
    $mail->setSubject ($this->getSubjject());
    $mail->setBodyText ($this->getBody());
    $mail->send ();

    }
}

