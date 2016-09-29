<?php
/*
 * Created on 28 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once 'base_list.php';
require_once 'utils/today_orders_list.php';

class today_orders extends base_list {

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
				'name' => 'matting',
				'title' => 'Мат.',
				'field' => 'id'
			),
			'3' => array (
				'name' => 'polish',
				'title' => 'Пол.',
				'field' => 'id'
			),
			'4' => array (
				'name' => 'facet',
				'title' => 'Фац.',
				'field' => 'id'
			),
			'5' => array (
				'name' => 'drilling',
				'title' => 'Свер.',
				'field' => 'id'
			),
			'6' => array (
				'name' => 'photo',
				'title' => 'Фото.',
				'field' => 'id'
			),
			'7'=>array (
				'name'=>'grinding',
				'title'=>'Шліф.',
				'field'=>'id',
			),
			
			'8'=>array (
				'name'=>'kadran',
				'title'=>'Кад.',
				'field'=>'id',
			),
			
			'9'=>array (
				'name'=>'done',
				'title'=>'Виконано',
				'field'=>'done',
			),
			'10'=>array (
				'name'=>'closed',
				'title'=>'Забрано',
				'field'=>'closed',
			),
			
		);
	}

	protected function get_date1(){
		if ( $_GET['date']){
			$_SESSION['today_orders_date'] = $_GET['date'];
		} elseif(!$_SESSION['today_orders_date']) {
			$_SESSION['today_orders_date'] = date("d-m-Y"); 
		}
		return $_SESSION['today_orders_date'];
	} 
	
	protected function get_date2(){
		//return explode('-', $_GET['date2'] ? $_GET['date2'] : date("d-m-Y"));
		if ( $_GET['date2']){
			$_SESSION['today_orders_date2'] =  $_GET['date2'];
		} elseif(!$_SESSION['today_orders_date2']) {
			$_SESSION['today_orders_date2'] = date("d-m-Y"); 
		}
		return $_SESSION['today_orders_date2'];
	} 
	
	function get_content() {
		return $this->get_table_data('orders','today_orders_list','num', 'today_orders_list.tpl',10, 
			array(
				'date'=>$this-> get_date1(),
				'date2'=>$this-> get_date2() 
			)
		);
	}
}
?>