<?php
/*
 * Created on 28 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once 'base_list.php';
require_once 'utils/orders_list.php';

class orders extends base_list {

	function get_columns() {
		return array (
			'0' => array (
				'name' => 'num',
				'title' => '№ замовлення',
				'field' => 'num'
			), 
			'1' => array (
				'name' => 'name',
				'title' => 'Клієнт',
				'field' => 'name'
			),
			'2' => array (
				'name' => 'price',
				'title' => 'Ціна',
				'field' => 'price'
			),
			'3' => array (
				'name' => 'advance',
				'title' => 'Завдаток',
				'field' => 'advance'
			),
			'4' => array (
				'name' => 'debt',
				'title' => 'Оплатити',
				'field' => 'debt'
			),
			'5' => array (
				'name' => 'date',
				'title' => 'Дата',
				'field' => 'date'
			),
			'6' => array (
				'name' => 'username',
				'title' => 'Користувач',
				'field' => 'username'
			),
			'7'=>array (
				'name'=>'till_date',
				'title'=>'Термін',
				'field'=>'till_date',
			),
			'8'=>array (
				'name'=>'done',
				'title'=>'Стан',
				'field'=>'done',
			),
			
		);
	}

	function get_content() {
		if (isset($_GET['form_groupe'])){
			dao_manager :: form_groupe((int)@$_GET['order_id']);
		}
		return $this->get_table_data('orders','orders_list','num', 'orders_list.tpl',10, array('balanse'=>(int)dao_manager::get_day_balance()));
	}
}
?>