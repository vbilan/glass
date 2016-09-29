<?php

/*
 * Created on 29 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class base_object {
	function redirect($to) {
		$host = strlen(dirname($_SERVER['HTTP_REFERER'])) ? dirname($_SERVER['HTTP_REFERER']) : $_SERVER['SERVER_NAME'];
		if (headers_sent())
			return false;
		else {
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: $host$to");
			exit ();
		}
	}
	
	function prepare_data($array){
		$result = array();
		foreach ($array as $key=> $value){
			if (is_array($value)) continue;
			$result[$key]=str_replace(array('"', "'"), '',$value);
		}
		return $result;
	}
	function smarty_get($array, $tpl) {
		$smarty = new Smarty();
		$smarty->template_dir = 'templates';
		$smarty->compile_dir = 'templates_c';
		$smarty->cache_dir = 'cache';
		$smarty->config_dir = 'configs';

		foreach ($array as $key => $value) {
			$smarty->assign($key, $value);
		}

		$smarty->assign('admin', $_SESSION['logged_user']['admin']);
		
		return $smarty->fetch($tpl);
	}
}
?>
