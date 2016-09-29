<?php
/*
 * Created on 2 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once 'genericList.php';
class goods_groupes_list extends generic_list {
	
	function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
		$query = "select {$this->sqlTable}.* , units_of_measurement.name as unit_of_measurement from ".$this->sqlTable .' left join units_of_measurement 
		on '.$this->sqlTable.'.unit_of_measurement_id = units_of_measurement.id		where 1=1  ';
	
		if ($filter != '') {
			$query .= ' where '.$this->filterField.' like "%'.$filter.'%"';
		}
		$query .= ' order by '.$order.' '.$orderDesc;
		$query .= ' limit '.$offset.', '.$limit;
	
		return $query;
	}
}
?>
