<?php

/*
 * Config.php
 * 
 * Enter your SQL-Data in there
 */
require_once 'config.php';

/*
 * Include Library
 */

require_once 'lib/database/database.class.php';
require_once 'lib/controller/controller.class.php';

/*
 * Include Models
 */
require_once 'model/sensor.model.php';

/*
 * Include Data-Objects
 */
require_once 'dataobj/sensor.dataobj.php';


/*
 * Routing
 */
$controller = $_GET['controller'];

//Check if controller-variable is set
if(isset($controller) && $controller != NULL){
	
	//Check if the Controller-File exists
	$ControllerFilePath = 'controller/'.$controller.'.controller.php';
	if(file_exists($ControllerFilePath)){
		require_once $ControllerFilePath;
		//Check if the class exists
		if(class_exists($controller)){
			
			new $controller;
			
		} else {
			
			print "Controller class not found: ". $controller;
			
		}
		
	} else {
		
		print 'Controller not found in: '.$ControllerFilePath;
		
	}
	
} else {
	print 'Controller not set!';
}



?>