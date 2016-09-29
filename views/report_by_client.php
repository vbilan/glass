<?php
/*
 * Created on 17 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once 'base_list.php';
require_once 'utils/client_balanse.php';
require_once 'utils/settings_object.php';
 class report_by_client extends base_list {
	function get_columns() {
		$result = array (
				'1' => array (
				'name' => 'name',
				'title' => 'Клієнт',
				'field' => 'name'
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
			'4' => array (
				'name' => 'amount',
				'title' => 'Сума',
				'field' => 'amount'
			),
		);
		if (!$_SESSION['logged_user']['admin']){
			unset($result[4]);
		}
		return $result;
	}

	function get_content() {
		settings_object :: save_dates();
		return $this->get_table_data('','client_balanse','', 'report_client_balanse.tpl', 10000, settings_object::get_dates());
 	}
 }
?>
