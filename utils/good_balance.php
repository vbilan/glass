<?php

/*
 * Created on 16 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once 'genericList.php';

class good_balance extends generic_list {

	function prepareCountSQL($filter) {
		$query = "
			
	
select income, spending, income-spending as balance, name, groupe from
(
select round( sum(income),2) as income, round( sum(spending),2) as spending,  b.name, b.groupe, b.type from
(
select goods.type, sum(goods.square) as income, null as spending, goods_type.name,
goods_groupes.name as groupe
from goods,goods_type, goods_groupes
where goods.type=goods_type.id AND goods_type.price>0
AND goods_groupes.id = goods_type.groupe group by goods.type

union

select goods_type.id, null  as income,
 sum((1+goods_type.smash_percent/100)*sellings.count*sellings.height*sellings.width/1000000) as spending,
 goods_type.name, goods_groupes.name as groupe
from sellings,goods_type, goods_groupes
where sellings.order_id>0
AND sellings.good_type=goods_type.id AND goods_type.price>0
AND goods_groupes.id = goods_type.groupe 
 group by goods_type.id
union
select goods_type.id, null  as income,
 sum(sellings.count*sellings.height*sellings.width/1000000) as spending,
 goods_type.name, goods_groupes.name as groupe
from sellings,goods_type, goods_groupes
where sellings.order_id=0
AND sellings.good_type=goods_type.id AND goods_type.price>0
AND goods_groupes.id = goods_type.groupe 
 group by goods_type.id

 ) b
 
 
group by b.type
) b order by groupe";
		return $query;
	}

	function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
		$query = "
			
	select income, spending, income-spending*(1+goods_type.smash_percent/100) as balance, b.name, b.groupe from
		(
			select round( sum(income),2) as income, round( sum(spending),2) as spending,  b.name, b.groupe, b.type from
						(
							select goods.type, sum(goods.square) as income, 0 as spending, goods_type.name, goods_groupes.name as groupe
							from goods,goods_type, goods_groupes
							where goods.type=goods_type.id AND goods_type.price>0
							AND goods_groupes.id = goods_type.groupe
							AND date > ".settings_object::get_report_begin_date()."
							AND date < ".settings_object::get_report_end_date()."
							group by goods.type
										
							union
							
							select goods_type.id, 0  as income,
							 sum(sellings.count*sellings.height*sellings.width/1000000) as spending,
							 goods_type.name, goods_groupes.name as groupe
							from sellings,goods_type, goods_groupes, orders
							where sellings.order_id = orders.id
							AND sellings.good_type=goods_type.id AND goods_type.price>0
							AND goods_groupes.id = goods_type.groupe 
							AND orders.date > ".settings_object::get_report_begin_date()."
							AND orders.date < ".settings_object::get_report_end_date()."
							 group by goods_type.id
							 		
							 		
							union
									
									
							select goods_type.id, 0  as income,
							 sum(sellings.count*sellings.height*sellings.width/1000000) as spending,
							 goods_type.name, goods_groupes.name as groupe
							from sellings,goods_type, goods_groupes
							where sellings.order_id=0
							AND sellings.good_type=goods_type.id AND goods_type.price>0
							AND goods_groupes.id = goods_type.groupe 
							AND date > ".settings_object::get_report_begin_date()."
							AND date < ".settings_object::get_report_end_date()."
							 group by goods_type.id
						
						 ) b
		 
		 
			group by b.type
		) b, goods_type where type=goods_type.id order by groupe


			
			

";

		return $query;
	}
}
?>