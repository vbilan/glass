<?php


/*
 * Created on 30 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

include_once 'base_object.php';
include_once 'utils/settings.php';
class general_bill2 extends base_object {
	function get_content() {
		$orders = dao_manager::get_data('orders ', ' where order_groupe='.(int)$_GET['id'], $fields = 'id');
		exit;
	}
}
?>