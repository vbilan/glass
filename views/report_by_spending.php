<?php
/*
 * Created on 19 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 
include_once 'base_list.php';
require_once 'utils/spending_balanse.php';
require_once 'utils/settings_object.php';
 class report_by_spending extends base_list {
	function get_columns() {
		return array (
			'1' => array (
				'name' => 'name',
				'title' => 'Тип витрати',
				'field' => 'name'
			),
			'2' => array (
				'name' => 'date',
				'title' => 'Дата',
				'field' => 'date'
			),
			'3' => array (
				'name' => 'amount',
				'title' => 'Сума',
				'field' => 'amount'
			),
			'4' => array (
				'name' => 'comment',
				'title' => 'Коментар',
				'field' => 'comment'
			),
			
			
		);
	}

	function get_content() {
		settings_object::save_dates();
		return $this->get_table_data('','spending_balanse','', 'report_by_spending.tpl', 10000, settings_object::get_dates());
 	}
 }
 
?>