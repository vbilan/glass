<?php

/*
 * Created on 16 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once 'genericList.php';

class spending_balanse extends generic_list {

	function prepareCountSQL($filter) {
		$query = "
						select amount, date, name, comment  from
						    (select sum(amount) as amount, service_type, null as date, null as comment from spendings group by service_type
						    union
						     select amount, service_type, date, comment from spendings) b, service_name
						where b.service_type=service_name.type
					
					union
						select sum(amount) as amount, null as service_type, null as date, null as comment from spendings 
						
					order by name desc, date";
		return $query;
	}

	function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
		$query = "
						select amount, date, name, comment  from
						    (select sum(amount) as amount, service_type, null as date, null as comment from spendings where spendings.date > ".settings_object::get_report_begin_date()
						." AND spendings.date <".settings_object::get_report_end_date()." group by service_type
						    union
						     select amount, service_type, date, comment from spendings where date > ".settings_object::get_report_begin_date()
						." AND date <".settings_object::get_report_end_date().") b, service_name
						where b.service_type=service_name.type 
					
					union
						select sum(amount) as amount, null as service_type, null as date, null as comment from spendings where spendings.date > ".settings_object::get_report_begin_date()
						." AND spendings.date <".settings_object::get_report_end_date()."
						
					order by name asc, date";

		return $query;
	}
}
?>