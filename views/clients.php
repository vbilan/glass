<?php
/*
 * Created on 28 ���� 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once 'base_list.php';
require_once 'utils/client_list.php';
class clients extends base_list {

	function get_columns() {
		return array (
			'1' => array (
				'name' => 'name',
				'title' => '��\'�',
				'field' => 'name'
			),
			'2' => array (
				'name' => 'phone',
				'title' => '�������',
				'field' => 'phone'
			),
			
			'3' => array (
				'name' => 'actual',
				'title' => 'ĳ�����',
				'field' => 'actual'
			),
			
		);
	}

	function get_content() {
		return $this->get_table_data('clients','client_list','name', 'client_list.tpl');
	}
}
?>
