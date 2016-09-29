<?php


/*
 * Created on 1 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once 'genericList.php';
class today_orders_list extends generic_list {
	
	
	
	
	function getRedirectLink()
	{
		return parent::getRedirectLink().'&date='.($_GET['date'] ? $_GET['date'] : date("d-m-Y")).'&date2='.($_GET['date2'] ? $_GET['date2'] : date("d-m-Y"));
	}
	
	protected function get_date1(){
		if ( $_GET['date']){
			$_SESSION['today_orders_date'] =  $_GET['date'];
		} elseif(!$_SESSION['today_orders_date']) {
			$_SESSION['today_orders_date'] = date("d-m-Y"); 
		}
		return $_SESSION['today_orders_date'];
	} 
	
	protected function get_date2(){
		//return explode('-', $_GET['date2'] ? $_GET['date2'] : date("d-m-Y"));
		if ( $_GET['date2']){
			$_SESSION['today_orders_date2'] =  $_GET['date2'];
		} elseif(!$_SESSION['today_orders_date2']) {
			$_SESSION['today_orders_date2'] = date("d-m-Y"); 
		}
		return $_SESSION['today_orders_date2'];
	} 
	
	public function get_end_date()
	{
	   $date = explode('-',$this->get_date2());
		return  mktime (23, 59, 59, (int)$date[1], (int)$date[0], (int)$date[2]);
	}
	
	public function get_start_date()
	{
		$date = explode('-',$this->get_date1()); 
		return  mktime (0, 0, 0,  (int)$date[1], (int)$date[0], (int)$date[2]);
		
	}
	
	function prepareCountSQL($filter) {//echo $this->getRedirectLink();
		$query = "select count(num) from(select {$this->sqlTable}.id%1000 as num from ".$this->sqlTable.', clients  where '.$this->sqlTable.'.client=clients.id  and ('.$this->sqlTable.'.till_date>='.$this->get_start_date()
		.' AND '.$this->sqlTable.'.till_date<='.$this->get_end_date().' OR '.$this->sqlTable.'.till_date > 0 AND '.$this->sqlTable.'.done=0)) b ';
		if ($filter != '') {
			$query .= ' where '.$this->filterField.' like "%'.$filter.'%" ';
		}
		return $query;
	}

	function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
		$query = 'select * from( select '.$this->sqlTable.'.id%1000 as num, '.$this->sqlTable.
		'.price-'.$this->sqlTable.'.advance as debt, '.$this->sqlTable.'.* , clients.name, users.login as username from  clients,  ' 
		.$this->sqlTable.' left join users on '.$this->sqlTable.'.user=users.id where  '.$this->sqlTable.'.client=clients.id and ('
		.$this->sqlTable.'.till_date>='.$this->get_start_date().' AND '.$this->sqlTable.'' .
				'.till_date<='.$this->get_end_date().'  OR '.$this->sqlTable.'.till_date > 0 AND '.$this->sqlTable.'.done=0)) b ';

		if ($filter != '') {
			$query .= ' where '.$this->filterField.' like "%'.$filter.'%"';
		}
		$query .= ' order by '.$order.' '.$orderDesc;
		$query .= ' limit '.$offset.', '.$limit;

		return $query;
	}
}
?>