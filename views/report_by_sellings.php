<?php
/*
 * Created on 19 ���� 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 
include_once 'base_list.php';
require_once 'utils/sellings_balance.php';
require_once 'utils/settings_object.php';
 class report_by_sellings extends base_list {
	function get_columns() {
		return array (
				'1' => array (
				'name' => 'name',
				'title' => '�����',
				'field' => 'name'
			),
			'2' => array (
				'name' => 'square',
				'title' => '�����',
				'field' => 'square'
			),
			'3' => array (
				'name' => 'price',
				'title' => '����',
				'field' => 'price'
			),
			'4' => array (
				'name' => 'num',
				'title' => '� ����������',
				'field' => 'num'
			),
			'5' => array (
				'name' => 'date',
				'title' => '����',
				'field' => 'date'
			),
			
		);
	}

	function get_content() {
		settings_object::save_dates();
		return $this->get_table_data('','sellings_balance','', 'report_by_sellings.tpl', 10000, settings_object::get_dates());
 	}
 }
 
?>