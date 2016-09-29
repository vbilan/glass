<?php

/*
 * Created on 16 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once 'genericList.php';

class balance extends generic_list {

	function prepareCountSQL($filter) {
		$query = "
			
	select sum(spending) as spending, sum(income) as income, sum(income-spending) as profit,service_name.name, null as store
   from
            (select sum(amount) as spending, 0 as income, service_type from spendings group by service_type

				  	union

				  	select  0 as spending, sum(price) as income, service_type from services group by service_type)
            b,service_name where  b.service_type=service_name.type group by b.service_type
            
 union

select spending, income,  income-spending+store as profit, 'Товар' as name,store

from (

select sum(income) as income, sum(spending) as spending, sum(store) as  store  from (
select sum(price) as income, 0 as spending, null  as store from sellings
union
select 0 as income, sum(buying_price*square) as spending, null  as store from goods

union



select null as income, null as spending, sum( total* price) as store from(
select type, sum(total) as total, sum(price) as price from
(
select  b.type, sum(b.amount) as total, null as price from
(
select goods.type, sum(goods.square) as amount, goods_type.name
from goods,goods_type
where goods.type=goods_type.id and goods_type.price>0
group by goods.type

union

select goods_type.id,
 - sum((1+goods_type.smash_percent/100)*sellings.count*sellings.height*sellings.width/1000000) as amount,
 goods_type.name
from sellings,goods_type
where sellings.order_id>0
and sellings.good_type=goods_type.id and goods_type.price>0
 group by goods_type.id
union
select goods_type.id,
 - sum(sellings.count*sellings.height*sellings.width/1000000) as amount,
 goods_type.name
from sellings,goods_type
where sellings.order_id=0
and sellings.good_type=goods_type.id and goods_type.price>0

 group by goods_type.id

 ) b
group by b.type
union
select type, null as total, price/square as price  from
 (select sum(square) as square, sum(square*buying_price) as price, type from goods group by type) b where square >0
) b
group by type
)b

     ) b
     )b
union

select null as spending, null as income, sum(profit), 'Загальний баланс' as name, null as store from
(


	select sum(spending) as spending, sum(income) as income, sum(income-spending) as profit,service_name.name, null as store
   from
            (select sum(amount) as spending, 0 as income, service_type from spendings group by service_type

				  	union

				  	select  0 as spending, sum(price) as income, service_type from services group by service_type)
            b,service_name where  b.service_type=service_name.type group by b.service_type
            
 union

select spending, income,  income-spending+store as profit, 'Товар' as name,store

from (

select sum(income) as income, sum(spending) as spending, sum(store) as  store  from (
select sum(price) as income, 0 as spending, null  as store from sellings
union
select 0 as income, sum(buying_price*square) as spending, null  as store from goods

union



select null as income, null as spending, sum( total* price) as store from(
select type, sum(total) as total, sum(price) as price from
(
select  b.type,  sum(b.amount) as total, null as price from
(
select goods.type, sum(goods.square) as amount, goods_type.name
from goods,goods_type
where goods.type=goods_type.id and goods_type.price>0
group by goods.type

union

select goods_type.id,
 - sum((1+goods_type.smash_percent/100)*sellings.count*sellings.height*sellings.width/1000000) as amount,
 goods_type.name
from sellings,goods_type
where sellings.order_id>0
and sellings.good_type=goods_type.id and goods_type.price>0
 group by goods_type.id
union
select goods_type.id,
 - sum(sellings.count*sellings.height*sellings.width/1000000) as amount,
 goods_type.name
from sellings,goods_type
where sellings.order_id=0
and sellings.good_type=goods_type.id and goods_type.price>0

 group by goods_type.id

 ) b
group by b.type
union
select type, null as total, price/square as price  from
 (select sum(square) as square, sum(square*buying_price) as price, type from goods group by type) b where square >0
) b
group by type
)b

     ) b
     )b



)b

";
		return $query;
	}

	function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
	
		$query = "
			
	select round(sum(spending)) as spending, round(sum(income)) as income, round(sum(income-spending)) as profit,service_name.name, null as store
   	from
    (
    		select sum(amount) as spending, 0 as income, service_type from spendings 
    		where date > ".settings_object::get_report_begin_date()
						." AND date <".settings_object::get_report_end_date()." 
    		group by service_type
	
			union

			select  0 as spending, sum(services.price) as income, services.service_type from services,  sellings, orders 
			where  services.selling= sellings.id and sellings.order_id=orders.id and orders.date > ".settings_object::get_report_begin_date()
						." AND orders.date <".settings_object::get_report_end_date()."   group by service_type
	)
            b,service_name where  b.service_type=service_name.type group by b.service_type
            
";

		return $query;
	}
}

//function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
//		$query = "
//			
//	select round(sum(spending),2) as spending, round(sum(income),2) as income, round(sum(income-spending),2) as profit,service_name.name, null as store
//   	from
//    (
//    		select sum(amount) as spending, 0 as income, service_type from spendings 
//    		where date > ".settings_object::get_report_begin_date()
//						." AND date <".settings_object::get_report_end_date()." 
//    		group by service_type
//	
//			union
//
//			select  0 as spending, sum(services.price) as income, services.service_type from services,  sellings, orders 
//			where  services.selling= sellings.id and sellings.order_id=orders.id and orders.date > ".settings_object::get_report_begin_date()
//						." AND orders.date <".settings_object::get_report_end_date()."   group by service_type
//	)
//            b,service_name where  b.service_type=service_name.type group by b.service_type
//            
// union
//
//select spending, income,  round(income-spending+store,2) as profit, 'Товар' as name, round(store,2)
//
//from (
//
//select sum(income) as income, sum(spending) as spending, sum(store) as  store  from (
//select sum(price) as income, 0 as spending, null  as store from sellings
//union
//select 0 as income, sum(buying_price*square) as spending, null  as store from goods
//
//union
//
//
//
//select null as income, null as spending, sum( total* price) as store from(
//	select type, sum(total) as total, sum(price) as price from
//	(
//		select  b.type,  sum(b.amount) as total, null as price from
//		(
//			select goods.type, sum(goods.square) as amount, goods_type.name
//			from goods,goods_type
//			where goods.type=goods_type.id and goods_type.price>0
//			group by goods.type
//
//			union
//
//			select goods_type.id,
//			 - sum((1+goods_type.smash_percent/100)*sellings.count*sellings.height*sellings.width/1000000) as amount,
//			 goods_type.name
//			from sellings,goods_type
//			where sellings.order_id>0
//			and sellings.good_type=goods_type.id and goods_type.price>0
//			 group by goods_type.id
//			 		
//			union
//					
//			select goods_type.id,
//			 - sum(sellings.count*sellings.height*sellings.width/1000000) as amount,
//			 goods_type.name
//			from sellings,goods_type
//			where sellings.order_id=0
//			and sellings.good_type=goods_type.id and goods_type.price>0
//			
//			 group by goods_type.id
//
// 		) b
//		group by b.type
//				
//		union
//	select type, null as total, price/square as price  from
// 	(select sum(square) as square, sum(square*buying_price) as price, type from goods group by type) b where square >0
//	) b
//	group by type
//	)b
//
//     ) b
//     )b
//union
//
//select null as spending, null as income, round(sum(profit),2), 'Загальний баланс' as name, null as store from
//(
//
//
//	select sum(spending) as spending, sum(income) as income, sum(income-spending) as profit,service_name.name, null as store
//   from
//            (select sum(amount) as spending, 0 as income, service_type from spendings group by service_type
//
//				  	union
//
//				  	select  0 as spending, sum(price) as income, service_type from services group by service_type)
//            b,service_name where  b.service_type=service_name.type group by b.service_type
//            
// union
//
//select spending, income,  income-spending+store as profit, 'Товар' as name,store
//
//from (
//
//select sum(income) as income, sum(spending) as spending, sum(store) as  store  from (
//select sum(price) as income, 0 as spending, null  as store from sellings
//union
//select 0 as income, sum(buying_price*square) as spending, null  as store from goods
//
//union
//
//
//
//select null as income, null as spending, sum( total* price) as store from(
//select type, sum(total) as total, sum(price) as price from
//(
//select  b.type,  sum(b.amount) as total, null as price from
//(
//select goods.type, sum(goods.square) as amount, goods_type.name
//from goods,goods_type
//where goods.type=goods_type.id and goods_type.price>0
//group by goods.type
//
//union
//
//select goods_type.id,
// - sum((1+goods_type.smash_percent/100)*sellings.count*sellings.height*sellings.width/1000000) as amount,
// goods_type.name
//from sellings,goods_type
//where sellings.order_id>0
//and sellings.good_type=goods_type.id and goods_type.price>0
// group by goods_type.id
//union
//select goods_type.id,
// - sum(sellings.count*sellings.height*sellings.width/1000000) as amount,
// goods_type.name
//from sellings,goods_type
//where sellings.order_id=0
//and sellings.good_type=goods_type.id and goods_type.price>0
//
// group by goods_type.id
//
// ) b
//group by b.type
//union
//select type, null as total, price/square as price  from
// (select sum(square) as square, sum(square*buying_price) as price, type from goods group by type) b where square >0
//) b
//group by type
//)b
//
//     ) b
//     )b
//
//
//
//)b
//
//";
//
//		return $query;
//	}
//}
?>