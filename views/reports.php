<?php
/*
 * Created on 28 ���� 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include_once 'base_object.php';
require_once 'utils/service_balanse.php';
 class reports extends base_object {

	function get_content() {
		$reports = array(		
			array('action'=>'report_by_balance','name'=>'��������� ������'),
			array('action'=>'report_by_good_balance','name'=>'��� �� �������'),
			array('action'=>'report_by_goods','name'=>'��� �� �������� ������'),
			array('action'=>'report_by_sellings','name'=>'��� �� �������� ������'),
			array('action'=>'report_by_services','name'=>'��� �� ��������'),
			array('action'=>'report_by_client','name'=>'��� �� �볺����'),
			array('action'=>'report_by_debtor','name'=>'��� �� ���������'),
			array('action'=>'report_by_spending','name'=>'��� �� ��������'),
		
			
			
		);
		return $this-> smarty_get(array('reports'=>$reports), 'reports.tpl');
 	}
 }
?>
