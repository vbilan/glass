<?php
/*
 * Created on 28 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include_once 'base_list.php';
require_once 'utils/spending_list.php';
class spendings extends base_list {

	function get_columns() {
		return array (
			'1' => array (
				'name' => 'name',
				'title' => 'Тип витрати',
				'field' => 'name'
			),
			'2' => array (
				'name' => 'amount',
				'title' => 'Сума',
				'field' => 'amount'
			),
			
			'3' => array (
				'name' => 'date',
				'title' => 'Дата',
				'field' => 'date'
			),
			
		);
	}

	function get_content() {
		return $this->get_table_data('spendings','spending_list','name', 'spending_list.tpl');
	}
}
?>
