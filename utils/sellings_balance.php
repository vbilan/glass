<?php
/*
 * Created on 19 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once 'genericList.php';

class  sellings_balance extends generic_list {

	function prepareCountSQL($filter) {
		$query = "
					
				select a.square, a.price,  a.date, goods_type.name from(
 
				select sum(count*height*width/1000000) as square, sum(price) as price, good_type as type, null as date from sellings where price>0 or order_id=0 group by good_type

       			 union
						select count*height*width/1000000 as square, sellings.price, good_type as type, orders.date from sellings, orders where orders.id=sellings.order_id and sellings.price>0
						union
						select height*width/1000000 as square, price, good_type as type, date from sellings where order_id=0
	       		) a, goods_type where a.type = goods_type.id
				union
				select null as square, sum(price) as price, null as name, null as date from sellings where price>0 or order_id=0
	       		order by name desc, date


";
		return $query;
	}

	function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
		
		$query = "
					
				select a.square, a.price,  a.date, goods_type.name, num from(
 
				select sum(count*height*width/1000000) as square, sum(price) as price, good_type as type, null as date, null as num from (
						select sellings.* from sellings, orders where 
				orders.id=sellings.order_id and sellings.price>0 and orders.date > ".settings_object::get_report_begin_date()
						." AND orders.date <".settings_object::get_report_end_date()."
								
						union		
														
						select *  from sellings where 
				date > ".settings_object::get_report_begin_date()
						." AND date <".settings_object::get_report_end_date()." and order_id=0) A group by good_type

       			 union
						select sum(count*height*width/1000000) as square, sum(sellings.price) as price, good_type as type, orders.date, orders.id as num from sellings, orders 
						where orders.id=sellings.order_id and sellings.price>0 and orders.date > ".settings_object::get_report_begin_date()
						." AND orders.date <".settings_object::get_report_end_date()." group by num , type" .
								"
						union
								
						select height*width/1000000 as square, price, good_type as type, date, null as num from sellings where order_id=0 
							and date > ".settings_object::get_report_begin_date()
						." AND date <".settings_object::get_report_end_date()."
	       		) a, goods_type where a.type = goods_type.id 
				union
						
				select null as square, sum(price) as price, null as name, null as date , null as num from (select sum(sellings.price) as price from sellings, orders where 
				orders.id=sellings.order_id and sellings.price>0 and orders.date > ".settings_object::get_report_begin_date()
						." AND orders.date <".settings_object::get_report_end_date()."
								
						union		
														
						select sum(sellings.price) as price from sellings where 
				date > ".settings_object::get_report_begin_date()
						." AND date <".settings_object::get_report_end_date()." and order_id=0) A
	       		order by name desc, date

";
		return $query;
	}

}
?>