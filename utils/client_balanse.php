<?php

/*
 * Created on 16 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once 'genericList.php';

class client_balanse extends generic_list {

	function prepareCountSQL($filter) {
		$query = "
					select o.id, amount, date, name,num, phone, clients.id as client from
					    (select null as id, sum(price) as amount, client, null as num, null as date from orders group by client
					    union
					    select id, price as amount, client,id%1000 as num, date from orders) o, clients
					where o.client=clients.id
  				union
   					 select null as id, sum(price) as amount, null as name, null as client, null as num, null as date , null as phone from orders
     
     
				order by name desc, date";
		return $query;
	}

	function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
		$query = "
					select o.id, amount, date, name,num, phone, clients.id as client from
					    (select null as id, sum(price) as amount, client, null as num, null as date from orders where orders.date > ".settings_object::get_report_begin_date()
						." AND orders.date <".settings_object::get_report_end_date()."
     					 group by client
					    union
					    select id, price as amount, client, id%1000 as num, date from orders 
					    		where orders.date > ".settings_object::get_report_begin_date()
						." AND orders.date <".settings_object::get_report_end_date()."
     					) o, clients
					where o.client=clients.id 
  				union
   					 select null as id, sum(price) as amount, null as name, null as client, null as num, null as date , null as phone from orders
     					where date > ".settings_object::get_report_begin_date()
						." AND date <".settings_object::get_report_end_date()."
     
				order by name asc";
        if ($order) {
            $query .= ', '.$order;
        }
		return $query;
	}
}
?>
