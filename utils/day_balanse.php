<?php

/*
 * Created on 16 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once 'genericList.php';

class day_balanse extends generic_list {

	function prepareCountSQL($filter) {
		$query = "	SELECT count(*) FROM `paiments` WHERE date > ".settings_object::get_report_begin_date()
		." AND date <".settings_object::get_report_end_date()."
					order by date";
		return $query;
	}

	function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
		$query = "	SELECT `order_id` ,	`date` ,	`amount`, order_id%1000 as num FROM `paiments` WHERE date > ".settings_object::get_report_begin_date()
		." AND date <".settings_object::get_report_end_date()."
					 ";
		if ($order) {
			$query .= ' order by '.$order;
		}
		return $query;
	}
}
?>
