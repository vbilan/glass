<?php

/*
 * Created on 28 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once 'base_list.php';
require_once 'utils/user_list.php';
class users extends base_list {

	function get_columns() {
		return array (
			'1' => array (
				'name' => 'login',
				'title' => 'Логін',
				'field' => 'login'
			),
			'2' => array (
				'name' => 'admin',
				'title' => 'Адміністратор',
				'field' => 'admin'
			),
			
			'3' => array (
				'name' => 'actual',
				'title' => 'Дійсний',
				'field' => 'actual'
			),
			
		);
	}

	function get_content() {
		return $this->get_table_data('users','user_list','login', 'user_list.tpl');
	}
}
?>
