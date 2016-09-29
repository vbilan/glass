<?php
/*
 * Created on 19 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once 'genericList.php';

class  goods_balanse extends generic_list {

	function prepareCountSQL($filter) {
		$query = "
					
			select a.square, a.price,  a.date, goods_type.name from(
						select sum(square) as square, sum(square*buying_price) as price,  type, null as date from goods group by type
    
        				union
        
        				select square, square*buying_price as price,  type, date from goods
				) a, goods_type where a.type = goods_type.id
        union
        	select null as square, sum(square*buying_price) as price,  null as name, null as date from goods
    
		order by name desc, date


";
		return $query;
	}

	function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
	$query = "
					
			select a.square, a.price,  a.date, goods_type.name from(
						select sum(square) as square, sum(square*buying_price) as price,  type, null as date from goods 
						where  goods.date > ".settings_object::get_report_begin_date()." AND goods.date < ".settings_object::get_report_end_date()." group by type
    
        				union
        
        				select square, square*buying_price as price,  type, date from goods 
        				where  goods.date > ".settings_object::get_report_begin_date()." AND goods.date < ".settings_object::get_report_end_date()." 
				) a, goods_type where a.type = goods_type.id 
        union
        	select null as square, sum(square*buying_price) as price,  null as name, null as date from goods 
     		where  goods.date > ".settings_object::get_report_begin_date()." AND goods.date < ".settings_object::get_report_end_date()." 
		order by name asc, date

";
		return $query;
	}

}
?>