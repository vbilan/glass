<?php
/*
 * Created on 29 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include_once "base_object.php";
class base_list extends base_object {
		function get_table_data($table, $class_list, $filter_field, $tmpl_file, $item_count=10, $additional=null){
		$db_manager = new db_manager();

		$db_manager->connect();

		$db_manager->select_db();

		$action = isset($_GET['action']) ? $_GET['action']:'';

		$generic_list = new  $class_list($db_manager, $table, $item_count, 11, $filter_field);

		$generic_list->link = 'index.php?action='.$action;

		$generic_list->colums = $this->get_columns();

		$generic_list->prepare();

		$variables = array(); 
		$variables['action']= $action;
		$variables['scroller']= $generic_list->renderScroller();
		$variables['data']= $generic_list->getListData();
		$variables['url']= $generic_list->getUrl();
		$variables['filter_value']= $generic_list->sqlFilter;
		$variables['class']= get_class($generic_list);
		$variables['colums']= $generic_list->colums;
		
		if ($additional) {
			foreach ($additional as $key => $value){
				$variables[$key] = $value; 
			}
		}
		
		if ($_GET['action'] == 'today_orders')
		{
			$data = array();
			
			
			foreach ($variables['data'] as $value)
			{
				$row =  $db_manager->fetch_assoc($db_manager->query("
					SELECT group_concat(DISTINCT c.service_type separator '+-+-+-+') as service
					FROM `orders` o
					LEFT JOIN sellings s ON o.id = s.order_id
					LEFT JOIN services c ON s.id = c.selling
					WHERE o.`id` ={$value['id']}"));
				$services =explode('+-+-+-+',$row['service']);
				foreach ($services as $service)
				{
					$value[$service] = $service;
				}
				
				$data[] = $value;
			}
			
			$variables['data'] = $data;
		}
		$db_manager->disconnect();
		return $this->smarty_get($variables, $tmpl_file);
	}
}
?>
