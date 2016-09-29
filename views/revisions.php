<?php
/*
 * Created on 28 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include_once 'base_list.php';
require_once 'utils/revision_list.php';
 
 class revisions  extends base_list{
 	function get_columns() {
		return array (
			'1' => array (
				'name' => 'name',
				'title' => 'Назва товару',
				'field' => 'name'
			),
				
			'2' => array (
				'name' => 'total',
				'title' => 'Площа',
				'field' => 'total'
			),
			'3' => array (
				'name' => 'groupe',
				'title' => 'Група',
				'field' => 'groupe'
			),
			
				
			
			
		);
 	}
 	
 	function get_content(){
 		return $this->get_table_data('goods','revision_list','name', 'revision_list.tpl');
 	}
 }
?>
