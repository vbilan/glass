<?php
/*
 * Created on 17 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once 'base_list.php';
require_once 'utils/service_balanse.php';
require_once 'utils/settings_object.php';
 class report_by_services extends base_list {

	function get_columns() {
		return array (
				'1' => array (
				'name' => 'name',
				'title' => 'Тип послуги',
				'field' => 'name'
			),
			'2' => array (
				'name' => 'date',
				'title' => 'Дата',
				'field' => 'date'
			),
			'3' => array (
				'name' => 'num',
				'title' => '№',
				'field' => 'num'
			),
			'4' => array (
				'name' => 'client_name',
				'title' => 'Клієнт',
				'field' => 'client_name'
			),
			'5' => array (
				'name' => 'amount',
				'title' => 'Сума',
				'field' => 'amount'
			),
			
		);
	}

	function get_content() {
		settings_object::save_dates();
		return $this->get_table_data('goods','service_balanse','amount', 'report_service_balanse.tpl', 10000, settings_object::get_dates());
 	}
 }
?>
