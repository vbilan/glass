<?php
/*
 * Created on 28 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

error_reporting( E_ERROR);
 
function htmlspecialchars1($str)
{
	return htmlspecialchars($str, NULL, '');
}
require_once 'Smarty/libs/Smarty.class.php';
require_once 'configs/configs.php';
include_once 'db/dao_manager.php';



setlocale(LC_NUMERIC, 'en_US');

session_start();

$action = '';
if (isset ($_GET['action'])) {
	$action = $_GET['action'];
} elseif (isset ($_POST['action'])) {
	$action = $_POST['action'];
} else $action = 'orders';


if (!isset ($_SESSION['logged_user']) && isset ($_COOKIE['logged_user']) && isset ($_COOKIE['password'])) {
	$user = dao_manager :: get_user($_COOKIE['logged_user']);
	if (isset ($user) && $user['pass'] == $_COOKIE['password']) {
		$_SESSION['logged_user'] = $user;
	}
}

if ($action=='logout' || !@$_SESSION['logged_user'] ) {
	$action = 'login'; 
}

if ($action =='login'){
	include_once('views/login.php');
	exit;
}
$act = @$$action;
if (!$_SESSION['logged_user']['admin']&& @$act['admin']){
	$action = 'orders';
}

$smarty = new Smarty();
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';
$smarty->cache_dir = 'cache';
$smarty->config_dir = 'configs';


$main_menu = array ();

$sub_menu = false;
$content = '';
$selected_item = null; 

function pdump($data){
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

function get_content($menu_item) {
	

	
	$result = '';
	if (isset ($menu_item['script']) &&  $menu_item['script']) {
		include_once ($menu_item['script']);
		$view = new $menu_item['action'] ();
		$result = $view->get_content();
		global $selected_item; 
		$selected_item = $menu_item;
	}
	return $result;
}
foreach ($global_site_structure as & $menu_item) {
	if ($menu_item['action'] == $action || !$action) {
		$menu_item['selected'] = true;
		if (isset ($menu_item['children'])) {
			$sub_menu = $menu_item['children'];
		}
		$content = get_content($menu_item);
		
		
		if (isset ($menu_item['children']))
			foreach ($menu_item['children'] as & $sub_menu_item) {
				$sub_menu_item['selected'] = true;
				if (!$content) {
					$content = get_content($sub_menu_item);
				}
				break;
			}
		$sub_menu = isset ($menu_item['children']) ? $menu_item['children'] : '';	
		break;
	}
	if (isset ($menu_item['children'])) {
		foreach ($menu_item['children'] as & $sub_menu_item) {
			if ($sub_menu_item['action'] == $action) {
				$sub_menu_item['selected'] = true;
				$menu_item['selected'] = true;
				$content = get_content($sub_menu_item);
				$sub_menu = $menu_item['children'];
			}
		}
	}
}

$smarty->assign('content', $content);
$smarty->assign('main_menu', $global_site_structure);
$smarty->assign('sub_menu', $sub_menu);
$smarty->assign('admin', $_SESSION['logged_user']['admin']);

$smarty->display('index.tpl');
?>
