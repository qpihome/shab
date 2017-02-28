<?php
/**
 * 
 * class sensorDataObject
 * sensor.dataobj.php
 * 
 * Data-Object for the table sensor
 * 
 * @author nick
 *
 */
class sensorDataObject {
	
	/**
	 * The unique ID of a Sensor
	 * @var unknown
	 */
	public $sid;
	public $var;
	public $updated;
	
	/**
	 * 
	 * Creates an new DataObject for the table sensor
	 * 
	 * @param unknown $sid
	 * @param unknown $var
	 * @param unknown $updated
	 */
	public function __construct($sid, $var, $updated){
		
		$this->sid = $sid;
		$this->var = $var;
		$this->updated = $updated;
		
	}
	
}