<?php
/*
 * Created on 28 ���� 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once 'base_list.php';
require_once 'utils/goods_list.php';

 class goods extends base_list {

	function get_columns() {
		return array (
			'1' => array (
				'name' => 'groupe',
				'title' => '�����',
				'field' => 'groupe'
			),
			'2' => array (
				'name' => 'name',
				'title' => '����� ������',
				'field' => 'name'
			),
			'3' => array (
				'name' => 'square',
				'title' => '�����',
				'field' => 'square'
			),
			'4' => array (
				'name' => 'buying_price',
				'title' => '����������� ����',
				'field' => 'buying_price'
			),
			'5' => array (
				'name' => 'buying_amount',
				'title' => '�������',
				'field' => 'buying_amount'
			),
			'6' => array (
				'name' => 'price',
				'title' => 'ֳ�� �������',
				'field' => 'price'
			),
				
			'7' => array (
				'name' => 'date',
				'title' => '����',
				'field' => 'date'
			),
			
		);
	}

	function get_content() {
		return $this->get_table_data('goods','goods_list','name', 'goods_list.tpl');
 	}
 }
?>
