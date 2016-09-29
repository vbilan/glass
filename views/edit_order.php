<?php


/*
 * Created on 30 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

include_once 'base_object.php';
include_once 'utils/settings.php';

class edit_order extends base_object {

	function roung($data) {
		return $data;
	}

	function get_fazet_drilling_data($data) {
		$result = array (
			'keys' => array (),
			'full' => array ()
		);
		$tmp = explode(";", $data);
		for ($i = 0; $i < count($tmp); $i = $i +2) {
			$result['keys'][] = $tmp[$i];
			$result['full'][$tmp[$i]] = $tmp[$i +1];
		}
		return $result;
	}

	function get_service_data($data) {
		$captions = array (
			'polish' => 'Поліровка',
			'facet' => 'Фацет',
			'grinding' => 'Шліфування'
		);
		$tmp = explode("++", $data['service_data']);
		$result = " \n\r ";
		$size = 0;
		$caption = @ $captions[$data['service_type']];
		$price_var = $data['service_type'].'_price';
		switch ($data['service_type']) {
			case 'photo' :
				$result .= "\n addphotoprint2({$tmp[0]}, {$tmp[1]}, i, '{$tmp[2]}', {$data['price']});";
				break;

			case 'facet' :
				$size = $tmp[1];
				$price_var = "facet_prices[$size]";

			case 'polish' :
			case 'grinding' :

				$result .= " var checkboxes_data = new Array(); \n\r";
				if ($tmp[0] > 7) {
					$result .= "checkboxes_data[3]=true;\n\r ";
					$tmp[0] -= 8;
				}
				if ($tmp[0] > 3) {
					$result .= "checkboxes_data[2]=true;\n\r ";
					$tmp[0] -= 4;
				}
				if ($tmp[0] > 1) {
					$result .= "checkboxes_data[1]=true;\n\r ";
					$tmp[0] -= 2;
				}
				if ($tmp[0]) {
					$result .= "checkboxes_data[0]=true;\n\r ";
				}
				$result .= "\n addservice2('{$data['service_type']}', '$caption', checkboxes_data, i, $price_var, {$data['price']}, $size, {$data['length']}); \n\r	";
				break;
			case 'drilling' :
				for ($l = 0; $l < count($tmp); $l += 3) {
					$result .= "\n adddrilling2({$tmp[$l]}, {$tmp[$l+2]}, {$tmp[$l+1]}, i)";
				}
				break;
			case 'matting' :
				$tmp[5] = (bool) $tmp[5];
				$tmp[6] = (bool) $tmp[6];
				$result .= "\n addmatting2(i, {$tmp[1]}, {$tmp[0]}, '{$tmp[2]}', '{$tmp[5]}', '{$tmp[6]}',	{$tmp[4]}, '{$tmp[7]}', '{$tmp[3]}', {$data['price']});";
				break;
			case 'skin' :
				$result .= "\n add_skin2(i, {$tmp[0]}, {$tmp[1]}, '{$tmp[2]}');";
				break;
			case 'kadran' :
				$result .= "\n add_kadran2({$tmp[0]}, '{$tmp[1]}',{$data['price']},i);";
				break;	
			case 'additional' :
				$tmp[0] = str_replace("\r\n"," ",$tmp[0]);
				$result .= "\n add_additional2({$tmp[1]}, '{$tmp[0]}',i);";
				break;		
			default :
				break;
		}
		return $result;
	}

	function get_content() {
		$order = array ();

		$errors = array ();

		if (isset ($_POST["submit"])) {
				//	echo "<pre>";
				//print_r($_POST);
				//exit;
			$order['id'] = (int) @ $_POST['id'];
			$order['client'] = (int) @ $_POST['client']['id'];
			$order['advance'] = (float) @ $_POST['advance'];
			$order['done'] = @ $_POST['done'] ? 1 : 0;
			$order['closed'] = @ $_POST['closed'] ? 1 : 0;
			$order['urgent'] = @ $_POST['urgent'] ? 1 : 0;

			if (isset($_POST['till_date']))
			{
				$tmp = explode('-',$_POST['till_date']);
				if (count($tmp) == 3)
				{
					 $order['till_date'] = mktime(0, 0, 0, intval($tmp[1]), intval($tmp[0]), intval($tmp[2]));
				}
			}
			
			$order['advance_fixed'] = (float) @ $_POST['advance_fixed'];
			if (!$order['advance']){
				$order['advance'] = $order['advance_fixed'];
			}
			
			$order['date'] = (int) @ $_POST['date'];
			if (!$order['date']) {
				$order['date'] = mktime();
			}
			$order['price'] = (float) @ $_POST['price'];
			$order['comment'] = @ $_POST['comment'];
			$order['delivery_date'] = @ $_POST['delivery_date'];

			$sellings = $_POST['sellings'];


			$errors = dao_manager :: validate_order($order);

			if (!count($errors)) {
				if (trim($_POST['client']['name'])) {
					$client['name'] = trim($_POST['client']['name']);
					$client['phone'] = trim($_POST['client']['phone']);
					$client['comment'] = trim($_POST['client']['comment']);
					dao_manager :: save_client($client);
					$order['client'] = dao_manager :: get_last_id('clients');
				}
                if (!@$order['id']){
                    $order['user'] = @$_SESSION['logged_user']['id'];
                    
                }
				if (dao_manager :: save_order($order)) {
					if (!$order['id']) {
						$order['id'] = dao_manager :: get_last_id('orders');
						dao_manager :: update_new_order($order['id']);
					} else {
						dao_manager :: delete_order_sellings($order['id']);
					}
					if ((int) @ $_POST['advance_old'] != $order['advance']) {
						dao_manager :: save_item('paiments', array (
						'date' => mktime(), 'order_id' => $order['id'], 'amount' => $order['advance'] - (int) @ $_POST['advance_old']));
					}
					foreach ($sellings as $selling) {
						$selling['order_id'] = $order['id'];
						$selling['price'] = $this->roung($selling['count'] * $selling['price'] * $selling['width'] * $selling['height'] / 1000000);

						dao_manager :: save_selling($selling);

						$selling['id'] = dao_manager :: get_last_id('sellings');
						
						foreach ($selling as $key => $value) {
							if (!is_array($value))
								continue;
							dao_manager :: save_service($key, $value, $selling['id']);
						}

					}
					$this->redirect("/index.php?action=orders");
				} else
					echo "query errors";
			} else {
				$order['comment'] = htmlspecialchars1($order['comment']);
			}
		}

		if (isset ($_GET['delete']) && isset ($_GET['id'])) {
			dao_manager :: delete_order((int) $_GET['id']);
			$this->redirect("/index.php?action=orders");
			exit;
		}

		$sellings = array ();
		if (isset ($_GET['id'])) {
			$order = dao_manager :: get_item('orders', (int) $_GET['id']);
			$sellings = dao_manager :: get_data('sellings, goods_type', ' where sellings.good_type=goods_type.id and order_id='. ((int) $_GET['id']).' ORDER BY id', ' sellings.*, goods_type.name ');
			foreach ($sellings as & $selling) {
				$selling['services'] = '';
				$services = dao_manager :: get_data('services', ' where services.selling='.$selling['id']);
				foreach ($services as $service) {
					$selling['services'] .= $this->get_service_data($service);
				}
			}

		}

		$clients = dao_manager :: get_table_data('clients', 0, 1000, ' where actual=1 ORDER BY name');

		$clients_ids = array ();
		$clients_values = array ();
		foreach ($clients as $values) {
			$clients_ids[] = $values['id'];
			$clients_values[] = $values['name'];
		}

		$good_groupes = dao_manager :: get_table_data('goods_groupes', 0, 1000, ' where actual=1  ORDER BY name');

		$good_groupe_ids = array ();
		$good_groupe_values = array ();

		foreach ($good_groupes as $values) {
			$good_groupe_ids[] = $values['id'];
			$good_groupe_values[] = $values['name'];
		}

		$good_types = dao_manager :: get_table_data('goods_type', 0, 10000, ' where actual=1 and groupe='.current($good_groupe_ids).'  ORDER BY name');
		$all_good_types = dao_manager :: get_table_data('goods_type', 0, 10000, ' where actual=1');

		$good_type_ids = array ();
		$good_type_values = array ();

		foreach ($good_types as $values) {
			$good_type_ids[] = $values['id'];
			$good_type_values[] = $values['name'];
		}

		$settings = new settings('configs/prices.config');

		$facet = $this->get_fazet_drilling_data($settings->get_property('facet_price'));
		$drilling = $this->get_fazet_drilling_data($settings->get_property('drilling_price'));

		if ($order['till_date'])
		{
			$order['till_date'] = date("d-m-Y",intval($order['till_date']));			
		}
		
        if (@$order['user']){
            $user = dao_manager :: get_item('users',$order['user']);
            $order['username'] = $user['login'];
           
        }
        if (@$order['client']){
             $client = dao_manager :: get_item('clients',$order['client']);            
             $order['phone'] = $client['phone'];
        }

            
		return $this->smarty_get(array (
			'sellings' => $sellings,
				
			'units_of_measurement'=> $units_of_measurement,	
				
			'good_groupe_ids' => $good_groupe_ids,
			'good_groupe_values' => $good_groupe_values,

			'clients_ids' => $clients_ids,
			'clients_values' => $clients_values,

			'good_type_ids' => $good_type_ids,
			'good_type_values' => $good_type_values,
			'good_types' => $all_good_types,

			'discounts' => explode(";",
			$settings->get_property('discounts'
		)), 'grinding_price' => $settings->get_property('grinding_price'),
		'kadran_price' => $settings->get_property('kadran_price'),
		 'skin_price' => $settings->get_property('skin_price'), 'polish_price' => $settings->get_property('polish_price'), 'photo_price' => $settings->get_property('photo_price'), 'matting_price' => $settings->get_property('matting_price'), 'facet_price' => $facet['full'], 'facet_size' => $facet['keys'], 'drilling_size' => $drilling['keys'], 'drilling_price' => $drilling['full'], 'photos' => file('photo.txt'), 'order' => $this->prepare_data($order), 'errors' => $errors), 'edit_order.tpl');
	}
}
?>