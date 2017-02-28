<?php


class get extends Controller{


	/*
	 * Routing goes on here
	 */
	public function __construct(){

		$sid = $_GET['sid'];

		if (isset($sid) && $sid != NULL){

				$model = new sensorModel();
				$dataObj = $model->get($sid);
				
				print '<sid>'.$dataObj->sid.'</sid>';
				print '<var>'.$dataObj->var.'</var>';
				print '<updated>'.$dataObj->updated.'</updated>';
	
		} else {
			print 'get.controller: sid (sensorID) not set!';
		}

	}


}