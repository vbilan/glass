<?php


/*
 * Created on 1 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once 'genericList.php';
class orders_list extends generic_list {
	function prepareCountSQL($filter) {
		$query = "select count(num) from(select {$this->sqlTable}.id%1000 as num from ".$this->sqlTable.', clients  where '.$this->sqlTable.'.client=clients.id  and '.$this->sqlTable.'.date>='.$this->get_start_date()
		.' AND '.$this->sqlTable.'.date<='.$this->get_end_date().') b ';
		if ($filter != '') {
			$query .= ' where '.$this->filterField.' like "%'.$filter.'%" ';
		}
		return $query;
	}

	function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
		$query = 'select * from( select '.$this->sqlTable.'.id%1000 as num, '.$this->sqlTable.
		'.price-'.$this->sqlTable.'.advance as debt, '.$this->sqlTable.'.* , clients.name, users.login as username from  clients,  ' 
		.$this->sqlTable.' left join users on '.$this->sqlTable.'.user=users.id where  '.$this->sqlTable.'.client=clients.id and '
		.$this->sqlTable.'.date>='.$this->get_start_date().' AND '.$this->sqlTable.'' .
				'.date<='.$this->get_end_date().') b ';

		if ($filter != '') {
			$query .= ' where '.$this->filterField.' like "%'.$filter.'%"';
		}
		$query .= ' order by '.$order.' '.$orderDesc;
		$query .= ' limit '.$offset.', '.$limit;

		return $query;
	}
}
?>