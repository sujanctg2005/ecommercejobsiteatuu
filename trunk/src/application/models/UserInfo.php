<?php

class Application_Model_UserInfo
{
   private $_username;
    private $_password;
    private $_usertype;
    private $_createdon;
    private $_lastupdatedon;
    private $_userId;
	/**
	 * @return the $_userId
	 */
	public function getUserId() {
		return $this->_userId;
	}

	/**
	 * @param field_type $_userId
	 */
	public function setUserId($_userId) {
		$this->_userId = $_userId;
	}

	/**
	 * @return the $_username
	 */
	public function getUsername() {
		return $this->_username;
	}

	/**
	 * @return the $_password
	 */
	public function getPassword() {
		return $this->_password;
	}

	/**
	 * @return the $_usertype
	 */
	public function getUsertype() {
		return $this->_usertype;
	}

	/**
	 * @return the $_createdon
	 */
	public function getCreatedon() {
		return $this->_createdon;
	}

	/**
	 * @return the $_lastupdatedon
	 */
	public function getLastupdatedon() {
		return $this->_lastupdatedon;
	}

	/**
	 * @param field_type $_username
	 */
	public function setUsername($_username) {
		$this->_username = $_username;
	}

	/**
	 * @param field_type $_password
	 */
	public function setPassword($_password) {
		$this->_password = $_password;
	}

	/**
	 * @param field_type $_usertype
	 */
	public function setUsertype($_usertype) {
		$this->_usertype = $_usertype;
	}

	/**
	 * @param field_type $_createdon
	 */
	public function setCreatedon($_createdon) {
		$this->_createdon = $_createdon;
	}

	/**
	 * @param field_type $_lastupdatedon
	 */
	public function setLastupdatedon($_lastupdatedon) {
		$this->_lastupdatedon = $_lastupdatedon;
	}
 public function findUserInfo ()
    {
        $registry = Zend_Registry::getInstance();
        $DB = $registry['DB'];
         $sql = "SELECT * FROM `tbl_user_info` where Username='".$this->getUsername()."'";
         $result = $DB->fetchRow($sql);
     
        $this->puplateObject($result);
        
       
    }
public function puplateObject ($result)
    {
    	$row = $result;
        $this->setUserId($row->UserID);
        $this->setUsername($row->Username);
        $this->setUsertype($row->UserType);
                
    }

}

