<?php

/*
 * Created on 16 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once 'genericList.php';

class service_balanse extends generic_list {

	function prepareCountSQL($filter) {
		$query = "
				select id, amount, service_name.name , date from
      			(
					select null as id, sum(price) as amount, service_type, null as date from services group by service_type
          			union
					select services.id, services.price as amount, service_type, orders.date from services,sellings,orders where  services.selling= sellings.id and sellings.order_id=orders.id
     
    			 ) b, service_name
				where b.service_type = service_name.type and b.service_type<>'general'
				
				union
				
				select null as id, sum(price) as amount, null as service_type, null as date from services
						
						
				order by name desc, date";
		return $query;
	}

	function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
		$query = "
				select  order_id , order_id %1000 as num, b.id, amount, b.name , date, client, clients.name as client_name from    (select order_id , id, amount, service_name.name , date, client from
      			(
					select null as order_id, null as id, sum(services.price) as amount, service_type, null as date,  null as client  
					from services, sellings, orders where  services.selling= sellings.id and sellings.order_id=orders.id and orders.date > ".settings_object::get_report_begin_date()
						." AND orders.date <".settings_object::get_report_end_date()."  group by service_type
          			union
					select  sellings.order_id, services.id, services.price as amount, service_type, orders.date, orders.client
           from services, sellings, orders where  services.selling= sellings.id and sellings.order_id=orders.id and orders.date > ".settings_object::get_report_begin_date()
						." AND orders.date <".settings_object::get_report_end_date()."  
     
    			 ) b, service_name
        
				where b.service_type = service_name.type and b.service_type<>'general'
				
				union
				
				select null as order_id,   null as id, sum(services.price) as amount, null as service_type, null as date,  null as client 
				from services , sellings, orders where  services.selling= sellings.id and sellings.order_id=orders.id and orders.date > ".settings_object::get_report_begin_date()
						." AND orders.date <".settings_object::get_report_end_date()."  
				) b left join clients on b.client=clients.id
						
				order by name desc, date
						";

		return $query;
	}

}
?>
