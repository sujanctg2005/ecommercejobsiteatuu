<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

require_once 'Zend/Controller/Front.php';
require_once 'Zend/Registry.php';
require_once 'Zend/Db/Adapter/Pdo/Mysql.php';
	 
	$params = array('host' =>'localhost',
	                    'username'  =>'root',
	                    'password'  =>'',
	                    'dbname'    =>'db_jobs'
	                   );
	$DB = new Zend_Db_Adapter_Pdo_Mysql($params);
	     
	$DB->setFetchMode(Zend_Db::FETCH_OBJ);
	Zend_Registry::set('DB',$DB);	
$application->bootstrap()
            ->run();
