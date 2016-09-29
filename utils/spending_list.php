<?php

/*
 * Created on 1 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once 'genericList.php';
class spending_list extends generic_list {
	function prepareCountSQL($filter) {
		$additional_data='';
		if  (!$_SESSION['logged_user']['admin']){
			$additional_data =' AND service_name.type<>\'salary\' ';
		}
		$query = "select count(*) from ".$this->sqlTable.', service_name  where '.$this->sqlTable.'.service_type=service_name.type '.$additional_data;
		if ($filter != '') {
			$query .= ' and '.$this->filterField.' like "%'.$filter.'%" ';
		}
		return $query;
	}
	
	function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
		$additional_data='';
		if  (!$_SESSION['logged_user']['admin']){
			$additional_data =' AND service_name.type<>\'salary\' ';
		}
		$query = 'select '.$this->sqlTable.'.* , service_name.name as name from '.$this->sqlTable.', service_name  where '.$this->sqlTable.'.service_type=service_name.type '.$additional_data;

		if ($filter != '') {
			$query .= ' and '.$this->filterField.' like "%'.$filter.'%"';
		}
		$query .= ' order by '.$order.' '.$orderDesc;
		$query .= ' limit '.$offset.', '.$limit;
		return $query;
	}
}
?>
