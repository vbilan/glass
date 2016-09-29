<?php


/*
 * Created on 30 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once 'genericList.php';

class goods_list extends generic_list {
	
	function prepareCountSQL($filter) {
		$query = "select * from ".$this->sqlTable.', goods_type, goods_groupes  where '.$this->sqlTable.'.type=goods_type.id and goods_type.groupe=goods_groupes.id  and '.$this->sqlTable.'.date>='.$this->get_start_date().' AND '.$this->sqlTable.'.date<='.$this->get_end_date().' ';
		if ($filter != '') {
			$query .= ' and goods_type.'.$this->filterField.' like "%'.$filter.'%" ';
		}
		return $query;
	}
	
	function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
		$query = 'select '.$this->sqlTable.'.* , u.name as unit_of_measurement, goods_type.name, goods_type.price, goods.square*goods.buying_price as buying_amount, goods_groupes.name as groupe from 
				'.$this->sqlTable.', goods_type, goods_groupes  
				LEFT JOIN units_of_measurement u ON u.id = goods_groupes.unit_of_measurement_id		
						
						where '.$this->sqlTable.'.type=goods_type.id and goods_type.groupe=goods_groupes.id  and '.$this->sqlTable.'.date>='.$this->get_start_date().
		' AND '.$this->sqlTable.'.date<='.$this->get_end_date().' ';

		if ($filter != '') {
			$query .= ' and goods_type.'.$this->filterField.' like "%'.$filter.'%"';
		}
		$query .= ' order by '.$order.' '.$orderDesc;
		$query .= ' limit '.$offset.', '.$limit;

		return $query;
	}
}
?>
