<?php
/*
 * Created on 19 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 
include_once 'base_list.php';
require_once 'utils/goods_balanse.php';
require_once 'utils/settings_object.php';
 class report_by_goods extends base_list {
	function get_columns() {
		return array (
				'1' => array (
				'name' => 'name',
				'title' => 'Товар',
				'field' => 'name'
			),
			'2' => array (
				'name' => 'square',
				'title' => 'Площа',
				'field' => 'square'
			),
			'3' => array (
				'name' => 'price',
				'title' => 'Сума',
				'field' => 'price'
			),
			'4' => array (
				'name' => 'date',
				'title' => 'Дата',
				'field' => 'date'
			),
			
		);
	}

	function get_content() {
		settings_object::save_dates();
		return $this->get_table_data('','goods_balanse','', 'report_by_goods.tpl', 10000, settings_object::get_dates());
 	}
 }
 
?>