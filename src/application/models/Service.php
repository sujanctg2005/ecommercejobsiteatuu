<?php

class Application_Model_Service
{
private $serviceId;
private $serviceType;
private $serviceDescription;
private $serviceFee;
/**
	 * @return the $serviceId
	 */
	public function getServiceId() {
		return $this->serviceId;
	}

/**
	 * @return the $serviceType
	 */
	public function getServiceType() {
		return $this->serviceType;
	}

/**
	 * @return the $serviceDescription
	 */
	public function getServiceDescription() {
		return $this->serviceDescription;
	}

/**
	 * @return the $serviceFee
	 */
	public function getServiceFee() {
		return $this->serviceFee;
	}

/**
	 * @param field_type $serviceId
	 */
	public function setServiceId($serviceId) {
		$this->serviceId = $serviceId;
	}

/**
	 * @param field_type $serviceType
	 */
	public function setServiceType($serviceType) {
		$this->serviceType = $serviceType;
	}

/**
	 * @param field_type $serviceDescription
	 */
	public function setServiceDescription($serviceDescription) {
		$this->serviceDescription = $serviceDescription;
	}



/**
	 * @param field_type $serviceFee
	 */
	public function setServiceFee($serviceFee) {
		$this->serviceFee = $serviceFee;
	}


 public function puplateSerciceCharge ($result)
    {
    	
       $entries = array();
        foreach ($result as $row) {
        $entry = new Application_Model_Service();
        $entry->setServiceId($row->ServiceId);
        $entry->setServiceType($row->ServiceType);
        $entry->setServiceDescription($row->ServiceFee);
        $entry->setServiceFee($row->Description);
        $entries[] = $entry;
        }
        return $entries;
    	
        
    }
  public function findServiceCharge(){
  	$registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
         $sql = "SELECT * FROM `tbl_service_charge`";
         $result = $DB->fetchAll($sql);
         return  $this->puplateSerciceCharge($result);
  }

}