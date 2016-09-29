<?php

/*
 * Created on 30 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once 'genericList.php';
class units_of_measurement_list extends generic_list {
	function prepareCountSQL($filter) {
		$query = "select * from ".$this->sqlTable.' where 1=1 ';
		if ($filter != '') {
			$query .= ' and '.$this->sqlTable.'.'.$this->filterField.' like "%'.$filter.'%" ';
		}
		return $query;
	}
	
	function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
		$query = 'select '.$this->sqlTable.'.*  from '.$this->sqlTable.'  where 1=1 ';

		if ($filter != '') {
			$query .= ' and '.$this->sqlTable.'.'.$this->filterField.' like "%'.$filter.'%"';
		}
		$query .= ' order by '.$order.' '.$orderDesc;
		$query .= ' limit '.$offset.', '.$limit;
		return $query;
	}
}
?>
