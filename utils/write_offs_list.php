<?php
/*
 * Created on 17 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 require_once 'genericList.php';

class write_offs_list extends generic_list {  
	function prepareCountSQL($filter) {
		$query = 'select * from sellings  where sellings.order_id=0 ';
		if ($filter != '') {
			$query .= ' and '.$this->filterField.' like "%'.$filter.'%" ';
		}
		return $query;
	}
	
	function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
		$query = 'SELECT sellings.date, sellings.id, sellings.width*sellings.height/1000000 as square, goods_groupes.name as groupe, goods_type.name  ' .
				'FROM sellings, goods_groupes,goods_type WHERE ' .
				'goods_groupes.id=goods_type.groupe AND goods_type.id=sellings.good_type AND sellings.order_id=0 ';

		if ($filter != '') {
			$query .= ' AND '.$this->filterField.' LIKE "%'.$filter.'%"';
		}
		$query .= ' ORDER BY '.$order.' '.$orderDesc;
		$query .= ' LIMIT '.$offset.', '.$limit;
echo $query;
		return $query;
	}
}
?>
