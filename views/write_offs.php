<?php
/*
 * Created on 17 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include_once 'base_list.php';
require_once 'utils/write_offs_list.php';
class write_offs extends base_list {

	function get_columns() {
		return array (
			'1' => array (
				'name' => 'groupe',
				'title' => 'Група',
				'field' => 'groupe'
			),
			'2' => array (
				'name' => 'name',
				'title' => 'Товар',
				'field' => 'name'
			),
			'3' => array (
				'name' => 'square',
				'title' => 'Полща',
				'field' => 'square'
			),
			'4' => array (
				'name' => 'date',
				'title' => 'Дата',
				'field' => 'date'
			),
			
		);
	}

	function get_content() {
		return $this->get_table_data('sellings','write_offs_list','name', 'write_offs.tpl');
	}
}
?>
