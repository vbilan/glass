<?php
/*
 * Created on 28 ���� 2010
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
				'title' => '��� �������',
				'field' => 'name'
			),
			'2' => array (
				'name' => 'amount',
				'title' => '����',
				'field' => 'amount'
			),
			
			'3' => array (
				'name' => 'date',
				'title' => '����',
				'field' => 'date'
			),
			
		);
	}

	function get_content() {
		return $this->get_table_data('spendings','spending_list','name', 'spending_list.tpl');
	}
}
?>
