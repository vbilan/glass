<?php


/*
 * Created on 2 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once 'base_list.php';
require_once 'utils/goods_groupes_list.php';

class goods_groupes extends base_list {

	function get_columns() {
		return array (
			'1' => array (
				'name' => 'name',
				'title' => 'Назва групи товару',
				'field' => 'name'
			),

			'2' => array (
				'name' => 'actual',
				'title' => 'Дійсний',
				'field' => 'actual'
			),
			
			'3' => array (
				'name' => 'unit_of_measurement',
				'title' => 'Одиниці виміру',
				'field' => 'unit_of_measurement'
			),
			
		);
	}

	function get_content() {
		return $this->get_table_data('goods_groupes', 'goods_groupes_list', 'name', 'goods_groupes_list.tpl');
	}
}
?>