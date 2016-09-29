<?php
/*
 * Created on 21 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include_once 'base_list.php';
require_once 'utils/balance.php';
require_once 'utils/settings_object.php';

   
 class report_by_balance extends base_list {
	function get_columns() {
		return array (
				'1' => array (
				'name' => 'name',
				'title' => 'Послуга/Витрата',
				'field' => 'name'
			),
			
			'2' => array (
				'name' => 'income',
				'title' => 'Прихід',
				'field' => 'income'
			),
			'3' => array (
				'name' => 'spending',
				'title' => 'Розхід',
				'field' => 'spending'
			),
				
			
			'4' => array (
				'name' => 'store',
				'title' => 'Склад',
				'field' => 'store'
			),
			'5' => array (
				'name' => 'profit',
				'title' => 'Прибуток',
				'field' => 'profit'
			),
			
			
		);
	}
	
	function get_buying_sum($begin, $end){
		$selling_square = dao_manager:: get_selling_square($begin, $end);
		$goods_data_tmp = dao_manager:: get_goods_data($begin - 3600*24*365*10);
		$goods_data = array();
		foreach ($goods_data_tmp as $value){
			$goods_data[$value['type']] = $value['price']/$value['square'];
		}
		$buying_sum = 0;
		foreach( $selling_square as $value){
			$buying_sum += $value['square'] * @$goods_data[$value['id']];
		}
		return $buying_sum;
	}
	
	function get_content() {
		settings_object :: save_dates();
		$settings = settings_object::get_instance();
		$begin = $settings->get_report_begin_date();
		$end = $settings->get_report_end_date();
		$selling_incomming = (int)dao_manager:: get_selling_incoming($begin, $end);
		
		$goods_price = (int)dao_manager::get_goods_price();
		
		
		$service_balance = (int)dao_manager::get_services_balance($begin, $end);
		
		$buying_sum = (int)$this->get_buying_sum($begin, $end);
		
		$buying_amount_all =(int)dao_manager::get_buying_amount($begin, $end);
		$additional = array(
			'goods_price'=>$goods_price,
			'buying_sum'=>$buying_sum,
			'selling_incomming'=>$selling_incomming,
			'total' => $service_balance + $selling_incomming - $buying_sum,
			'buying_amount_all'=>$buying_amount_all
		);
		
		return $this->get_table_data('','balance','', 'report_by_balance.tpl', 10000, array_merge($additional,$settings->get_dates()));
 	}
 }
 
?>
