<?php

/*
 * Created on 30 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once 'genericList.php';
class goods_types_list extends generic_list {
	function prepareCountSQL($filter) {
		$query = "select * from ".$this->sqlTable.', goods_groupes  where '.$this->sqlTable.'.groupe=goods_groupes.id ';
		if ($filter != '') {
			$query .= ' and '.$this->sqlTable.'.'.$this->filterField.' like "%'.$filter.'%" ';
		}
		return $query;
	}
	
	function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
		$query = 'select '.$this->sqlTable.'.* , g.name as gr_name, u.name as uom from '.$this->sqlTable.', goods_groupes g
				 left join units_of_measurement u on g.unit_of_measurement_id = u.id
				where '.$this->sqlTable.'.groupe=g.id ';

		if ($filter != '') {
			$query .= ' and '.$this->sqlTable.'.'.$this->filterField.' like "%'.$filter.'%"';
		}
		$query .= ' order by '.$order.' '.$orderDesc;
		$query .= ' limit '.$offset.', '.$limit;
		return $query;
	}
}
?>