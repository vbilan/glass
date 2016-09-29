<?php
/*
 * Created on 28 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include_once 'base_object.php';
require_once 'utils/service_balanse.php';
 class reports extends base_object {

	function get_content() {
		$reports = array(		
			array('action'=>'report_by_balance','name'=>'Загальний баланс'),
			array('action'=>'report_by_good_balance','name'=>'Звіт по товарах'),
			array('action'=>'report_by_goods','name'=>'Звіт по приходах товару'),
			array('action'=>'report_by_sellings','name'=>'Звіт по продажах товару'),
			array('action'=>'report_by_services','name'=>'Звіт по послугах'),
			array('action'=>'report_by_client','name'=>'Звіт по клієнтах'),
			array('action'=>'report_by_debtor','name'=>'Звіт по боржниках'),
			array('action'=>'report_by_spending','name'=>'Звіт по витратах'),
		
			
			
		);
		return $this-> smarty_get(array('reports'=>$reports), 'reports.tpl');
 	}
 }
?>
