<?php


class submit extends Controller{
	
	
	/*
	 * Routing goes on here
	 */
	public function __construct(){
		
		$sid = $_GET['sid'];
		$var = $_GET['var'];
		
		if (isset($sid) && $sid != NULL){
			if(isset($var) && $var != NULL){
				
				//Create a DataObject for the sensorModel
				$updated = time();
				$dataObj = new sensorDataObject($sid,$var,$updated);
				
				var_dump($dataObj);
				
				$model = new sensorModel();
				
				$model->submit($dataObj);
				
				
			} else {
				print 'submit.controller: var (SensorData) not set!';
			}
			
			
		} else {
			print 'submit.controller: sid (sensorID) not set!';
		}
		
	}
	
	
}
