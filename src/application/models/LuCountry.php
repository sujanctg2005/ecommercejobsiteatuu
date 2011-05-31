<?php

class Application_Model_LuCountry
{
	private $countryName;
	private $countryId;
	private $cityName;
	private $cityId;
	private $businessId;
	private $businessType;
	private $categoryId;
	private $categoryType;
	
	
 /**
	 * @return the $businessId
	 */
	public function getBusinessId() {
		return $this->businessId;
	}

	/**
	 * @return the $businessType
	 */
	public function getBusinessType() {
		return $this->businessType;
	}

	/**
	 * @return the $categoryId
	 */
	public function getCategoryId() {
		return $this->categoryId;
	}

	/**
	 * @return the $categoryType
	 */
	public function getCategoryType() {
		return $this->categoryType;
	}

	/**
	 * @param field_type $businessId
	 */
	public function setBusinessId($businessId) {
		$this->businessId = $businessId;
	}

	/**
	 * @param field_type $businessType
	 */
	public function setBusinessType($businessType) {
		$this->businessType = $businessType;
	}

	/**
	 * @param field_type $categoryId
	 */
	public function setCategoryId($categoryId) {
		$this->categoryId = $categoryId;
	}

	/**
	 * @param field_type $categoryType
	 */
	public function setCategoryType($categoryType) {
		$this->categoryType = $categoryType;
	}

	/**
	 * @return the $cityName
	 */
	public function getCityName() {
		return $this->cityName;
	}

	/**
	 * @return the $cityId
	 */
	public function getCityId() {
		return $this->cityId;
	}

	/**
	 * @param field_type $cityName
	 */
	public function setCityName($cityName) {
		$this->cityName = $cityName;
	}

	/**
	 * @param field_type $cityId
	 */
	public function setCityId($cityId) {
		$this->cityId = $cityId;
	}

	/**
	 * @return the $countryName
	 */
	public function getCountryName() {
		return $this->countryName;
	}

	/**
	 * @return the $countryId
	 */
	public function getCountryId() {
		return $this->countryId;
	}

	/**
	 * @param field_type $countryName
	 */
	public function setCountryName($countryName) {
		$this->countryName = $countryName;
	}

	/**
	 * @param field_type $countryId
	 */
	public function setCountryId($countryId) {
		$this->countryId = $countryId;
	}

public function findAllCountry()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        $sql = "SELECT * FROM tbl_country";
        $result = $DB->fetchAll($sql);
        return $this->puplateObjectList($result);
    }
  public function puplateObjectList ($result)
    {   
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        $entries = array();
        foreach ($result as $row) {
            $entry = new Application_Model_LuCountry();
            $entry->setCountryId($row->CountryID);
            $entry->setCountryName($row->CountryName);
            $entries[] = $entry;
        }
        return $entries;
    }
public function findCityByCountryId ()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
         $sql = "SELECT * FROM `tbl_city` where CountryID=1";
         $result = $DB->fetchAll($sql);
     
       return  $this->puplateCityList($result);
        
       
    }
  public function puplateCityList ($result)
    {   
        $entries = array();
        foreach ($result as $row) {
            $entry = new Application_Model_LuCountry();
            $entry->setCityId($row->CityID);
            $entry->setCityName($row->CityName);
            $entry->setCountryId($row->CountryID);
            $entries[] = $entry;
        }
        return $entries;
    }
public function findAllBusinessType ()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        $sql = "SELECT * FROM tbl_business_type";
         $result = $DB->fetchAll($sql);
     
       return  $this->puplateBusinessList($result);
        
       
    }
  public function puplateBusinessList($result)
    {   
        $entries = array();
        foreach ($result as $row) {
            $entry = new Application_Model_LuCountry();
            $entry->setBusinessId($row->BusinessTypeID);
            $entry->setBusinessType($row->BusinessType);
            $entries[] = $entry;
        }
        return $entries;
    }
public function findAllCategoryType ()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        $sql = "SELECT * FROM tbl_job_category";
         $result = $DB->fetchAll($sql);
     
       return $this->puplateCategoryList($result);
        
       
    }
  public function puplateCategoryList($result)
    {   
        $entries = array();
        foreach ($result as $row) {
            $entry = new Application_Model_LuCountry();
            $entry->setCategoryId($row->JobCategoryID);
            $entry->setCategoryType($row->JobCategory);
            $entries[] = $entry;
        }
        return $entries;
    }
}

