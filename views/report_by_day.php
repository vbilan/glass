<?php
/*
 * Created on 17 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once 'base_list.php';
require_once 'utils/day_balanse.php';
require_once 'utils/settings_object.php';
 class report_by_day extends base_list {
 	
	function get_columns() {
		return array (
				'1' => array (
				'name' => 'amount',
				'title' => 'Сума',
				'field' => 'amount'
				),
				'2' => array (
					'name' => 'date',
					'title' => 'Дата',
					'field' => 'date'
				),
				'3' => array (
					'name' => 'num',
					'title' => '№ замовлення',
					'field' => 'num'
				),
			
		);
		
		
	}

	function get_content() {
		settings_object :: save_dates();
		$params = settings_object::get_dates();

		$params['balanse']=(int)dao_manager::get_day_balance();
		return $this->get_table_data('','day_balanse','', 'report_day_balanse.tpl', 10000, $params);
 	}
 }
?>
