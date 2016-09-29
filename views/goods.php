<?php
/*
 * Created on 28 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once 'base_list.php';
require_once 'utils/goods_list.php';

 class goods extends base_list {

	function get_columns() {
		return array (
			'1' => array (
				'name' => 'groupe',
				'title' => 'Група',
				'field' => 'groupe'
			),
			'2' => array (
				'name' => 'name',
				'title' => 'Назва товару',
				'field' => 'name'
			),
			'3' => array (
				'name' => 'square',
				'title' => 'Площа',
				'field' => 'square'
			),
			'4' => array (
				'name' => 'buying_price',
				'title' => 'Закупівельна ціна',
				'field' => 'buying_price'
			),
			'5' => array (
				'name' => 'buying_amount',
				'title' => 'Вартість',
				'field' => 'buying_amount'
			),
			'6' => array (
				'name' => 'price',
				'title' => 'Ціна продажу',
				'field' => 'price'
			),
				
			'7' => array (
				'name' => 'date',
				'title' => 'Дата',
				'field' => 'date'
			),
			
		);
	}

	function get_content() {
		return $this->get_table_data('goods','goods_list','name', 'goods_list.tpl');
 	}
 }
?>
