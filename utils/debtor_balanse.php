<?php

/*
 * Created on 16 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once 'genericList.php';

class debtor_balanse extends generic_list {

	function prepareCountSQL($filter) {
		$query = "
						select o.id, price, advance, amount, date, name,num, phone from
						    (select null as id, sum(price) as price, sum(advance) as advance,  sum(price-advance) as amount, client, null as num, null as date from orders where  advance < price group by client
						    union
						    select id, price, advance, price-advance as amount, client,id%1000 as num, date from orders where  advance < price) o, clients
						where o.client=clients.id
					union					
						select null as id, sum(price) as price, sum(advance) as advance,  sum(price-advance) as amount, null as client, null as num, null as date , null as phone from orders  where  advance < price
					order by name desc, date";
		return $query;
	}

	function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
		$query = "
						select o.id, price, advance, amount, date, name,num, phone, clients.id as client from
						    (select null as id, sum(price) as price, sum(advance) as advance,  sum(price-advance) as amount, client, null as num, null as date from orders where  advance < price group by client
						    union
						    select id, price, advance, price-advance as amount, client,id%1000 as num, date from orders where  advance < price) o, clients
						where o.client=clients.id
					union					
						select null as id, sum(price) as price, sum(advance) as advance,  sum(price-advance) as amount, null as name, null as num, null as date , null as phone, null as client from orders  where  advance < price
					order by name asc, date";

		return $query;
	}
}
?>
