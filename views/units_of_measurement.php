<?php
/*
 * Created on 28 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
include_once 'base_list.php'; 
require_once 'utils/units_of_measurement_list.php';

 class units_of_measurement extends base_list {

	function get_columns() {
		return array (
			'1' => array (
				'name' => 'name',
				'title' => 'ќдиниц≥ вим≥ру',
				'field' => 'name'
			),
				
		);
	}

	function get_content() {
		return $this->get_table_data('units_of_measurement','units_of_measurement_list','name', 'units_of_measurement_list.tpl');
 	}
 }
?>
