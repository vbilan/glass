<?php
/*
 * Created on 19 ���� 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 
include_once 'base_list.php';
require_once 'utils/debtor_balanse.php';
 class report_by_debtor extends base_list {
	function get_columns() {
		return array (
				'1' => array (
				'name' => 'name',
				'title' => '�볺��',
				'field' => 'name'
			),
			'2' => array (
				'name' => 'date',
				'title' => '����',
				'field' => 'date'
			),
			'3' => array (
				'name' => 'num',
				'title' => '� ����������',
				'field' => 'num'
			),
			'4' => array (
				'name' => 'amount',
				'title' => '����',
				'field' => 'amount'
			), 
			'5' => array (
				'name' => 'price',
				'title' => '����',
				'field' => 'price'
			),
			'6' => array (
				'name' => 'advance',
				'title' => '�������',
				'field' => 'advance'
			),
			
		);
	}

	function get_content() {
		return $this->get_table_data('','debtor_balanse','', 'report_debtor_balanse.tpl', 10000);
 	}
 }
 
?>
