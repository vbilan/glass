<?php
/*
 * Created on 21 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include_once 'base_list.php';
require_once 'utils/good_balance.php';
require_once 'utils/settings_object.php';

   
 class report_by_good_balance extends base_list {
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
				'name' => 'balance',
				'title' => 'Склад',
				'field' => 'balance'
			),
			
			
		);
	}

	function get_content() {
		settings_object::save_dates();
		return $this->get_table_data('','good_balance','', 'report_by_good_balance.tpl', 10000, settings_object::get_dates());
 	}
 }
 
?>
