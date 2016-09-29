<?php
/*
 * Created on 28 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 require_once "settings.php";
 
 class settings_object {
 	var $settings;
 	function get_start_date(){
 		$date_data = $this->get_date('begin');
 		if (count($date_data)==3){
 			$result = mktime(0,0,0,(int)$date_data[1],(int)$date_data[0],(int)$date_data[2]);
 		} else {
 			$result = mktime()-30*24*60*60;
 		}
 		return $result;
 		
 	}
 	function get_end_date(){
 		$date_data = $this->get_date('end');
 		if (count($date_data)==3){
 			$result = mktime(23,59,59,(int)$date_data[1],(int)$date_data[0],(int)$date_data[2]);
 		} else {
 			$result = mktime()+30*24*60*60;
 		}
 		return $result; 
 		
 	}
 	function get_report_begin_date(){
 		$date_data = $this->get_date('report_begin');
 		if (count($date_data)==3){
 			$result = mktime(0,0,0,(int)$date_data[1],(int)$date_data[0],(int)$date_data[2]);
 		} else {
 			$result = mktime()-30*24*60*60;
 		}
 		return $result;
 		
 	}
 	function get_report_end_date(){
 		$date_data = $this->get_date('report_end');
 		if (count($date_data)==3){
 			$result = mktime(23,59,59,(int)$date_data[1],(int)$date_data[0],(int)$date_data[2]);
 		} else {
 			$result = mktime()+30*24*60*60;
 		}
 		return $result; 
 		
 	}
 	function get_date($name){
 		if (!$this->settings)
 		$this->settings = new settings('configs/prices.config');
 		return explode('-',$this->settings->get_property($name));
 	}
 	function save_dates() {
		if (!isset ($_POST['change']))
			return;
		$settings = new settings('configs/prices.config');
		$settings->set_property('report_begin', $_POST['report_begin']);
		$settings->set_property('report_end', $_POST['report_end']);
		$settings->update_properties();
	}
	function get_dates() {
		$settings = new settings('configs/prices.config');
		return array (
			'report_begin' => $settings->get_property('report_begin'
		), 'report_end' => $settings->get_property('report_end'));
	}
	function &get_instance()
    {
        static $instance;
        if (!is_object($instance)) {
            $instance = new settings_object();
        }
        return $instance;
    }
 }
?>
