<?php

/*
 * Created on 1 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once 'genericList.php';

class revision_list extends generic_list {
	function prepareCountSQL($filter) {
		$query = "select sum(b.amount) as total, b.name, b.groupe , b.type from
(
select goods.type, sum(goods.square) as amount, goods_type.name,
goods_groupes.name as groupe
from goods,goods_type, goods_groupes
where goods.type=goods_type.id and goods_type.price>0
and goods_groupes.id = goods_type.groupe group by goods.type

union

select goods_type.id,
 - sum(sellings.count*sellings.height*sellings.width/1000000) as amount,
 goods_type.name, goods_groupes.name as groupe
from sellings,goods_type, goods_groupes
where sellings.good_type=goods_type.id and goods_type.price>0
and goods_groupes.id = goods_type.groupe 
 group by goods_type.id) b
group by b.type
";
		if ($filter != '') {
			$query .= ' and '.$this->filterField.' like "%'.$filter.'%" ';
		}
		return $query;
	}
	
	function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
		$query = '		select round( sum(b.amount),2) as total, b.name, b.groupe, b.type from
(
select goods.type, sum(goods.square) as amount, goods_type.name,
goods_groupes.name as groupe
from goods,goods_type, goods_groupes
where goods.type=goods_type.id and goods_type.price>0
and goods_groupes.id = goods_type.groupe group by goods.type

union

select goods_type.id,
 - sum((1+goods_type.smash_percent/100)*sellings.count*sellings.height*sellings.width/1000000) as amount,
 goods_type.name, goods_groupes.name as groupe
from sellings,goods_type, goods_groupes
where sellings.order_id>0
and sellings.good_type=goods_type.id and goods_type.price>0
and goods_groupes.id = goods_type.groupe 
 group by goods_type.id
union
select goods_type.id,
 - sum(sellings.count*sellings.height*sellings.width/1000000) as amount,
 goods_type.name, goods_groupes.name as groupe
from sellings,goods_type, goods_groupes
where sellings.order_id=0
and sellings.good_type=goods_type.id and goods_type.price>0
and goods_groupes.id = goods_type.groupe 
 group by goods_type.id

 ) b
group by b.type

';

		if ($filter != '') {
			$query .= ' and '.$this->filterField.' like "%'.$filter.'%"';
		}
		$query .= ' order by '.$order.' '.$orderDesc;
		$query .= ' limit '.$offset.', '.$limit;
		return $query;
	}
}
?>
