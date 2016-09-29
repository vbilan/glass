<?php


/*
 * Created on 5 ñ³÷ 2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once 'utils/settings.php';
$settings = new settings('configs/conf.config');


$client_bill = array();
$client_bill['title'] = '';
$client_bill['script'] = 'views/client_bill.php';
$client_bill['action'] = 'client_bill';
$client_bill['admin'] = '0';
$client_bill['hide'] = true;

$general_bill = array();
$general_bill['title'] = '';
$general_bill['script'] = 'views/general_bill.php';
$general_bill['action'] = 'general_bill';
$general_bill['admin'] = '0';
$general_bill['hide'] = true;

$general_bill2 = array();
$general_bill2['title'] = '';
$general_bill2['script'] = 'views/general_bill2.php';
$general_bill2['action'] = 'general_bill2';
$general_bill2['admin'] = '0';
$general_bill2['hide'] = true;

$cutting_bill = array();
$cutting_bill['title'] = '';
$cutting_bill['script'] = 'views/cutting_bill.php';
$cutting_bill['action'] = 'cutting_bill';
$cutting_bill['admin'] = '0';
$cutting_bill['hide'] = true;

$matting_bill = array();
$matting_bill['title'] = '';
$matting_bill['script'] = 'views/matting_bill.php';
$matting_bill['action'] = 'matting_bill';
$matting_bill['admin'] = '0';
$matting_bill['hide'] = true;

$report_by_spending = array();
$report_by_spending['title'] = '';
$report_by_spending['script'] = 'views/report_by_spending.php';
$report_by_spending['action'] = 'report_by_spending';
$report_by_spending['admin'] = '1';
$report_by_spending['hide'] = true;

$report_by_good_balance = array();
$report_by_good_balance['title'] = '';
$report_by_good_balance['script'] = 'views/report_by_good_balance.php';
$report_by_good_balance['action'] = 'report_by_good_balance';
$report_by_good_balance['admin'] = '1';
$report_by_good_balance['hide'] = true;

$report_by_balance = array();
$report_by_balance['title'] = '';
$report_by_balance['script'] = 'views/report_by_balance.php';
$report_by_balance['action'] = 'report_by_balance';
$report_by_balance['admin'] = '1';
$report_by_balance['hide'] = true;

$report_by_goods = array();
$report_by_goods['title'] = '';
$report_by_goods['script'] = 'views/report_by_goods.php';
$report_by_goods['action'] = 'report_by_goods';
$report_by_goods['admin'] = '1';
$report_by_goods['hide'] = true;

$report_by_sellings = array();
$report_by_sellings['title'] = '';
$report_by_sellings['script'] = 'views/report_by_sellings.php';
$report_by_sellings['action'] = 'report_by_sellings';
$report_by_sellings['admin'] = '1';
$report_by_sellings['hide'] = true;



$report_by_debtor = array ();
$report_by_debtor['title'] = $settings->get_property('report_by_debtor');
$report_by_debtor['script'] = 'views/report_by_debtor.php';
$report_by_debtor['action'] = 'report_by_debtor';
$report_by_debtor['admin'] = '0';
$report_by_debtor['hide'] = false;

$report_by_services = array ();
$report_by_services['title'] = '';
$report_by_services['script'] = 'views/report_by_services.php';
$report_by_services['action'] = 'report_by_services';
$report_by_services['admin'] = '1';
$report_by_services['hide'] = true;


$report_by_day = array ();
$report_by_day['title'] = $settings->get_property('paiment');
$report_by_day['script'] = 'views/report_by_day.php';
$report_by_day['action'] = 'report_by_day';
$report_by_day['admin'] = '0';
$report_by_day['hide'] = false;


$report_by_client = array ();
$report_by_client['title'] = $settings->get_property('client_report');;
$report_by_client['script'] = 'views/report_by_client.php';
$report_by_client['action'] = 'report_by_client';
$report_by_client['admin'] = '0';
$report_by_client['hide'] = true;

$clients = array ();
$clients['title'] = $settings->get_property('clients');
$clients['script'] = 'views/clients.php';
$clients['action'] = 'clients';
$clients['admin'] = '0';
$clients['selected'] = false;

$edit_client = array ();
$edit_client['title'] = '';
$edit_client['script'] = 'views/edit_client.php';
$edit_client['action'] = 'edit_client';
$edit_client['admin'] = '0';
$edit_client['hide'] = true;

$users = array ();
$users['title'] = $settings->get_property('users');
$users['script'] = 'views/users.php';
$users['action'] = 'users';
$users['admin'] = '1';
$users['selected'] = false;

$edit_user = array ();
$edit_user['title'] = '';
$edit_user['script'] = 'views/edit_user.php';
$edit_user['action'] = 'edit_user';
$edit_user['admin'] = '1';
$edit_user['hide'] = true;


$goods_groupes = array ();
$goods_groupes['title'] = $settings->get_property('goods_groupes');
$goods_groupes['script'] = 'views/goods_groupes.php';
$goods_groupes['action'] = 'goods_groupes';
$goods_groupes['admin'] = '1';
$goods_groupes['selected'] = false;

$edit_goods_groupe = array ();
$edit_goods_groupe['title'] = '';
$edit_goods_groupe['script'] = 'views/edit_goods_groupe.php';
$edit_goods_groupe['action'] = 'edit_goods_groupe';
$edit_goods_groupe['admin'] = '1';
$edit_goods_groupe['hide'] = true;


$units_of_measurement = array ();
$units_of_measurement['title'] = $settings->get_property('units_of_measurement');
$units_of_measurement['script'] = 'views/units_of_measurement.php';
$units_of_measurement['action'] = 'units_of_measurement';
$units_of_measurement['admin'] = '1';
$units_of_measurement['selected'] = false;

$edit_units_of_measurement = array ();
$edit_units_of_measurement['title'] = '';
$edit_units_of_measurement['script'] = 'views/edit_units_of_measurement.php';
$edit_units_of_measurement['action'] = 'edit_units_of_measurement';
$edit_units_of_measurement['admin'] = '1';
$edit_units_of_measurement['hide'] = true;

$goods_types = array ();
$goods_types['title'] = $settings->get_property('goods_types');
$goods_types['script'] = 'views/goods_types.php';
$goods_types['action'] = 'goods_types';
$goods_types['admin'] = '1';
$goods_types['selected'] = false;

$edit_goods_type = array ();
$edit_goods_type['title'] = '';
$edit_goods_type['script'] = 'views/edit_goods_type.php';
$edit_goods_type['action'] = 'edit_goods_type';
$edit_goods_type['admin'] = '1';
$edit_goods_type['hide'] = true;

$goods = array ();
$goods['title'] = $settings->get_property('goods');
$goods['script'] = 'views/goods.php';
$goods['action'] = 'goods';
$goods['admin'] = '0';
$goods['selected'] = false;

$edit_good = array ();
$edit_good['title'] = '';
$edit_good['script'] = 'views/edit_good.php';
$edit_good['action'] = 'edit_good';
$edit_good['admin'] = '0';
$edit_good['hide'] = true;

$orders = array ();
$orders['title'] = $settings->get_property('orders');
$orders['script'] = 'views/orders.php';
$orders['action'] = 'orders';
$orders['admin'] = '0';
$orders['selected'] = false;

$today_orders = array ();
$today_orders['title'] = $settings->get_property('today_orders');
$today_orders['script'] = 'views/today_orders.php';
$today_orders['action'] = 'today_orders';
$today_orders['admin'] = '0';
$today_orders['selected'] = false;



$edit_order = array ();
$edit_order['title'] = '';
$edit_order['script'] = 'views/edit_order.php';
$edit_order['action'] = 'edit_order';
$edit_order['admin'] = '0';
$edit_order['hide'] = true;

$spendings = array ();
$spendings['title'] = $settings->get_property('spendings');
$spendings['script'] = 'views/spendings.php';
$spendings['action'] = 'spendings';
$spendings['admin'] = '0';
$spendings['selected'] = false;

$edit_spending = array ();
$edit_spending['title'] = '';
$edit_spending['script'] = 'views/edit_spending.php';
$edit_spending['action'] = 'edit_spending';
$edit_spending['admin'] = '0';
$edit_spending['hide'] = true;

$reports = array ();
$reports['title'] = $settings->get_property('reports');
$reports['script'] = 'views/reports.php';
$reports['action'] = 'reports';
$reports['admin'] = '1';
$reports['selected'] = false;

$revisions = array ();
$revisions['title'] = $settings->get_property('revisions');
$revisions['script'] = 'views/revisions.php';
$revisions['action'] = 'revisions';
$revisions['admin'] = '1';
$revisions['selected'] = false;

$reset_good = array ();
$reset_good['title'] = '';
$reset_good['script'] = 'views/reset_good.php';
$reset_good['action'] = 'reset_good';
$reset_good['admin'] = '1';
$reset_good['hide'] = true;

$edit_settings = array ();
$edit_settings['title'] = $settings->get_property('settings');
$edit_settings['script'] = 'views/edit_settings.php';
$edit_settings['action'] = 'edit_settings';
$edit_settings['admin'] = '1';
$edit_settings['hide'] = false;

$write_offs = array ();
$write_offs['title'] = '';
$write_offs['script'] = 'views/write_offs.php';
$write_offs['action'] = 'write_offs';
$write_offs['admin'] = '1';
$write_offs['hide'] = true;

//$main['children']= array($news, $actions, $history);
if (!@$_SESSION['logged_user']['admin']){
	$report_by_client['hide']=false;
}
$global_site_structure = array (
	$orders,
	$today_orders,
	$goods,
	$goods_groupes,
	$goods_types,
	$units_of_measurement,
	$clients,
	$users,
	$spendings,
	$revisions,
	$reports,
	$edit_units_of_measurement,
	$edit_user,
	$edit_client,
	$edit_goods_type,
	$edit_good,
	$edit_spending,
	$edit_order,
	$edit_goods_groupe, 
	$reset_good,
	$edit_settings,
	$write_offs,
	$report_by_client,
	$report_by_services,
	$report_by_debtor,
	$report_by_goods,
	$report_by_sellings,
	$report_by_spending,
	$report_by_balance,
	$report_by_good_balance,
	$client_bill,
	$matting_bill,
	$cutting_bill,
	$general_bill,
	$general_bill2,
	$report_by_day,
	//$login
); 

//print_r($global_site_structure);
?>
