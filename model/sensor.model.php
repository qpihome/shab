<?php

/**
 * 
 * class sensorModel
 * 
 * Model of the table 'sensor'
 * 
 * @author nick
 *
 */
class sensorModel {
	
	/**
	 * public function __construct(){
	 * 
	 * Creating the table if it does not exist
	 * 
	 */
	public function __construct(){
		$db = new database();
		$db->query("CREATE TABLE IF NOT EXISTS `sensor` (
				`sid` varchar(255) COLLATE utf8_unicode_ci NOT NULL UNIQUE, 
				`var` varchar(255) COLLATE utf8_unicode_ci NOT NULL, 
				`updated` int(255) NOT NULL,
				PRIMARY KEY (sid)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");
		$db->execute();
		
	}
	
	/**
	 * public function submit(sensorDataObject $sensorDataObj)
	 * 
	 * Sending the Data to the table sensor
	 * If entry exists, the entry get updated otherwise a new entry will be created
	 * 
	 * @param sensorDataObject $sensorDataObj
	 */
	public function submit(sensorDataObject $sensorDataObj){
		/*
		 * Update existing entry or add new entry
		 */
		$db = new database();
		$db->query("INSERT INTO sensor (sid,var,updated) VALUES (:sid,:var,:updated)
  ON DUPLICATE KEY UPDATE var=:var, updated=:updated");
		$db->bind(':sid', $sensorDataObj->sid);
		$db->bind(':var', $sensorDataObj->var);
		$db->bind(':updated', $sensorDataObj->updated);
		$db->execute();
	}
	
	public function get($sid){
		
		$db = new database(); //Create new Instance of Database
		$db->query('SELECT * FROM sensor WHERE sid="'.$sid.'"'); //Query
		$rows = $db->resultset(); //Fetch Results
		if (isset($rows[0]['sid']) && $rows[0]['sid'] != NULL){ //Check if there is a UserID
			$dataObj = new sensorDataObject($rows[0]['sid'], $rows[0]['var'], $rows[0]['updated']);
			return $dataObj; // Return Array
		} else {
			return NULL;
		}
		
	}
	
	
	
}