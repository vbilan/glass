<?php
/*
 * Created on 28 ���� 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
include_once 'base_list.php';
require_once 'utils/goods_types_list.php';

 class goods_types extends base_list {

	function get_columns() {
		return array (
			'1' => array (
				'name' => 'name',
				'title' => '����� ������',
				'field' => 'name'
			),
			'2' => array (
				'name' => 'gr_name',
				'title' => '����� ������',
				'field' => 'gr_name'
			),
				
			'3' => array (
				'name' => 'actual',
				'title' => 'ĳ�����',
				'field' => 'actual'
			),
			'4' => array (
				'name' => 'smash_percent',
				'title' => '% ���',
				'field' => 'smash_percent'
			),
			'5' => array (
				'name' => 'price',
				'title' => 'ֳ�� �������',
				'field' => 'price'
			),			
		);
	}

	function get_content() {
		return $this->get_table_data('goods_type','goods_types_list','name', 'goods_types_list.tpl');
 	}
 }
?>
