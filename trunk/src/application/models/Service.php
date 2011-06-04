<?php

class Application_Model_Service
{
private $serviceId;
private $serviceType;
private $serviceDescription;
private $serviceFee;
private $userId;
private $serviceStatusId;
/**
	 * @return the $serviceStatusId
	 */
	public function getServiceStatusId() {
		return $this->serviceStatusId;
	}

/**
	 * @param field_type $serviceStatusId
	 */
	public function setServiceStatusId($serviceStatusId) {
		$this->serviceStatusId = $serviceStatusId;
	}

	/**
	 * @return the $userId
	 */
	public function getUserId() {
		return $this->userId;
	}

/**
	 * @param field_type $userId
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

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
public function insertPayment ($result)
    {
    	
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
        $DB->insert('tbl_employerpaymentstatus', $this->puplateToArray());
        
    	
        
    }
 public function puplateToArray ()
    {   
        
    	$data = array('EmployerId' =>$this->getUserId(),
         'ServiceId' => $this->getServiceId());
        return $data;
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
public function findServiceChargeStatus(){
  	    $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
         $sql = "SELECT * FROM `tbl_service_charge`".$this->getUserId();
         $result = $DB->fetchAll($sql);
         return  $this->puplateSerciceCharge($result);
  }
public function puplateSerciceChargeStatus ($result)
    {
       $registry = Zend_Registry::getInstance();
       $DB = $registry['DB'];
       $entries = array();
        foreach ($result as $row) {
        $entry = new Application_Model_Service();
        $entry->setServiceId($row->ServiceId);
        $entry->set($row->EmployerId);
        $entry->setServiceStatusId($row->ServicePaymentID);
        $entry->setServiceFee($row->ServicePaymentID);
        
        $sql = "SELECT * FROM `tbl_service_charge`".$entry->getServiceStatusId();
        $result = $DB->fetchRow($sql);
        $entry->setServiceId($row->ServiceId);
        $entry->setServiceType($row->ServiceType);
        $entry->setServiceDescription($row->ServiceFee);
        $entry->setServiceFee($row->Description);
        $entries[] = $entry;
        
        }
        return $entries;
    	
        
    }

}