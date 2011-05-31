<?php
class Application_Model_Employer
{
    private $username;
    private $password;
    private $confirmpassword;
    private $companyname;
    private $contactperson;
    private $alternativeCompany;
    private $contactPersonDesignation;
    private $businessType;
    private $businessDescription;
    private $companyAddress;
    private $country;
    private $city;
    private $area;
    private $billingAddress;
    private $contactPhone;
    private $contactMail;
    private $websiteAddress;
    private $employerId;
    private $businessTypeId;
    private $companyLogo;
    private $userId;
    private $cityId;
    /**
     * @return the $cityId
     */
    public function getCityId ()
    {
        return $this->cityId;
    }
    /**
     * @param field_type $cityId
     */
    public function setCityId ($cityId)
    {
        $this->cityId = $cityId;
    }
    /**
     * @return the $companyLogo
     */
    public function getCompanyLogo ()
    {
        return $this->companyLogo;
    }
    /**
     * @return the $userId
     */
    public function getUserId ()
    {
        return $this->userId;
    }
    /**
     * @param field_type $companyLogo
     */
    public function setCompanyLogo ($companyLogo)
    {
        $this->companyLogo = $companyLogo;
    }
    /**
     * @param field_type $userId
     */
    public function setUserId ($userId)
    {
        $this->userId = $userId;
    }
    /**
     * @return the $username
     */
    public function getUsername ()
    {
        return $this->username;
    }
    /**
     * @return the $password
     */
    public function getPassword ()
    {
        return $this->password;
    }
    /**
     * @return the $confirmpassword
     */
    public function getConfirmpassword ()
    {
        return $this->confirmpassword;
    }
    /**
     * @return the $companyname
     */
    public function getCompanyname ()
    {
        return $this->companyname;
    }
    /**
     * @return the $contactperson
     */
    public function getContactperson ()
    {
        return $this->contactperson;
    }
    /**
     * @return the $alternativeCompany
     */
    public function getAlternativeCompany ()
    {
        return $this->alternativeCompany;
    }
    /**
     * @return the $contactPersonDesignation
     */
    public function getContactPersonDesignation ()
    {
        return $this->contactPersonDesignation;
    }
    /**
     * @return the $businessType
     */
    public function getBusinessType ()
    {
        return $this->businessType;
    }
    /**
     * @return the $businessDescription
     */
    public function getBusinessDescription ()
    {
        return $this->businessDescription;
    }
    /**
     * @return the $companyAddress
     */
    public function getCompanyAddress ()
    {
        return $this->companyAddress;
    }
    /**
     * @return the $country
     */
    public function getCountry ()
    {
        return $this->country;
    }
    /**
     * @return the $city
     */
    public function getCity ()
    {
        return $this->city;
    }
    /**
     * @return the $area
     */
    public function getArea ()
    {
        return $this->area;
    }
    /**
     * @return the $billingAddress
     */
    public function getBillingAddress ()
    {
        return $this->billingAddress;
    }
    /**
     * @return the $contactPhone
     */
    public function getContactPhone ()
    {
        return $this->contactPhone;
    }
    /**
     * @return the $contactMail
     */
    public function getContactMail ()
    {
        return $this->contactMail;
    }
    /**
     * @return the $websiteAddress
     */
    public function getWebsiteAddress ()
    {
        return $this->websiteAddress;
    }
    /**
     * @return the $employerId
     */
    public function getEmployerId ()
    {
        return $this->employerId;
    }
    /**
     * @return the $businessTypeId
     */
    public function getBusinessTypeId ()
    {
        return $this->businessTypeId;
    }
    /**
     * @param field_type $username
     */
    public function setUsername ($username)
    {
        $this->username = $username;
    }
    /**
     * @param field_type $password
     */
    public function setPassword ($password)
    {
        $this->password = $password;
    }
    /**
     * @param field_type $confirmpassword
     */
    public function setConfirmpassword ($confirmpassword)
    {
        $this->confirmpassword = $confirmpassword;
    }
    /**
     * @param field_type $companyname
     */
    public function setCompanyname ($companyname)
    {
        $this->companyname = $companyname;
    }
    /**
     * @param field_type $contactperson
     */
    public function setContactperson ($contactperson)
    {
        $this->contactperson = $contactperson;
    }
    /**
     * @param field_type $alternativeCompany
     */
    public function setAlternativeCompany ($alternativeCompany)
    {
        $this->alternativeCompany = $alternativeCompany;
    }
    /**
     * @param field_type $contactPersonDesignation
     */
    public function setContactPersonDesignation ($contactPersonDesignation)
    {
        $this->contactPersonDesignation = $contactPersonDesignation;
    }
    /**
     * @param field_type $businessType
     */
    public function setBusinessType ($businessType)
    {
        $this->businessType = $businessType;
    }
    /**
     * @param field_type $businessDescription
     */
    public function setBusinessDescription ($businessDescription)
    {
        $this->businessDescription = $businessDescription;
    }
    /**
     * @param field_type $companyAddress
     */
    public function setCompanyAddress ($companyAddress)
    {
        $this->companyAddress = $companyAddress;
    }
    /**
     * @param field_type $country
     */
    public function setCountry ($country)
    {
        $this->country = $country;
    }
    /**
     * @param field_type $city
     */
    public function setCity ($city)
    {
        $this->city = $city;
    }
    /**
     * @param field_type $area
     */
    public function setArea ($area)
    {
        $this->area = $area;
    }
    /**
     * @param field_type $billingAddress
     */
    public function setBillingAddress ($billingAddress)
    {
        $this->billingAddress = $billingAddress;
    }
    /**
     * @param field_type $contactPhone
     */
    public function setContactPhone ($contactPhone)
    {
        $this->contactPhone = $contactPhone;
    }
    /**
     * @param field_type $contactMail
     */
    public function setContactMail ($contactMail)
    {
        $this->contactMail = $contactMail;
    }
    /**
     * @param field_type $websiteAddress
     */
    public function setWebsiteAddress ($websiteAddress)
    {
        $this->websiteAddress = $websiteAddress;
    }
    /**
     * @param field_type $employerId
     */
    public function setEmployerId ($employerId)
    {
        $this->employerId = $employerId;
    }
    /**
     * @param field_type $businessTypeId
     */
    public function setBusinessTypeId ($businessTypeId)
    {}
    public function insertEmployer ()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        $DB->insert('tbl_employer', $this->puplateToArray());
    }
    public function editEmployer ()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        $where[] = "UserID =".$this->getUserId();
        
        $DB->update('tbl_employer', $this->puplateEditToArray(), $where);
    }
    public function deleteEmployer ()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        $DB->delete('tbl_employer', 'UserID = . $this->getUserId() .');
    }
    public function findEmployerId ()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
         $sql = "SELECT * FROM `tbl_employer` where UserID=".$this->getUserId();
         $result = $DB->fetchRow($sql);
     
        $this->puplateObject($result);
        
       
    }
 
    public function puplateToArray ()
    {
        $data = array('UserID' => $this->getUserId(), 
        'CompanyName' => $this->getCompanyname(), 
        'AlternativeCompanyName' => $this->getAlternativeCompany(), 
        'CompanyAddress' => $this->getCompanyAddress(), 
        'CompanyPhone' => $this->getContactPhone(), 
        'CompanyEmail' => $this->getContactMail(), 
        'CompanyURL' => $this->getWebsiteAddress(), 
        'CompanyLogo' => $this->getCompanyLogo(), 
        'ContactPerson' => $this->getContactperson(), 
        'ContactPersonDesignatation' => $this->getContactPersonDesignation(), 
        'CountryID' => $this->getCountry(), 
        'BusinessTypeID' => $this->getBusinessType(), 
        'BillingAddress' => $this->getBillingAddress(), 
        'CityID' => $this->getCityId());
        return $data;
    }
public function puplateEditToArray ()
    {
        $data = array('CompanyName' => $this->getCompanyname(), 
        'AlternativeCompanyName' => $this->getAlternativeCompany(), 
        'CompanyAddress' => $this->getCompanyAddress(), 
        'CompanyPhone' => $this->getContactPhone(), 
        'CompanyEmail' => $this->getContactMail(), 
        'CompanyURL' => $this->getWebsiteAddress(), 
        'CompanyLogo' => $this->getCompanyLogo(), 
        'ContactPerson' => $this->getContactperson(), 
        'ContactPersonDesignatation' => $this->getContactPersonDesignation(), 
        'CountryID' => $this->getCountry(), 
        'BusinessTypeID' => $this->getBusinessType(), 
        'BillingAddress' => $this->getBillingAddress(), 
        'CityID' => $this->getCityId());
        return $data;
    }
    public function puplateObject ($result)
    {
    	$row = $result;
        $this->setUserId($row->UserID);
        $this->setUsername($this->getUsername());
        $this->setCompanyname($row->CompanyName);
        $this->setAlternativeCompany($row->AlternativeCompanyName);
        $this->setCompanyAddress($row->CompanyAddress);
        $this->setContactPhone($row->CompanyPhone);
        $this->setContactMail("$row->CompanyEmail");
        $this->setWebsiteAddress($row->CompanyURL);
        $this->setCompanyLogo($row->CompanyLogo);
        $this->setContactperson($row->ContactPerson);
        $this->setContactPersonDesignation($row->ContactPersonDesignatation);
        $this->setCountry($row->CountryID);
        $this->setBusinessType($row->BusinessTypeID);
        $this->setBillingAddress($row->BillingAddress);
        $this->setCityId($row->CityID);
    	
        
    }
    public function puplateObjectList ($result)
    {
        $entries = array();
        foreach ($result as $row) {
            $entry = new Application_Model_Employer();
            $entry->setUserId($row->UserID);
            $entry->setCompanyname($row->CompanyName);
            $entry->setAlternativeCompany($row->AlternativeCompanyName);
            $entry->setCompanyAddress($row->CompanyAddress);
            $entry->setContactPhone($row->CompanyPhone);
            $entry->setContactMail($row->CompanyEmail);
            $entry->setWebsiteAddress($row->CompanyURL);
            $entry->setCompanyLogo($row->CompanyLogo);
            $entry->setContactperson($row->ContactPerson);
            $entry->setContactPersonDesignation(
            $row->ContactPersonDesignatation);
            $entry->setCountry($row->CountryID);
            $entry->setBusinessType($row->BusinessTypeID);
            $entry->setBillingAddress($row->BillingAddress);
            $entry->setCity($row->CityID);
            $entries[] = $entry;
        }
        return $entries;
    }
 
}

