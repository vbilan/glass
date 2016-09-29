<?php


/*
 * Created on 30 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

include_once 'base_object.php';
include_once 'utils/settings.php';

class general_bill extends base_object {

	function roung($data) {
		return ceil($data * 100) / 100;
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
				$result .= "\n add_kadran2({$tmp[0]}, '{$tmp[1]}',i);";
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

		$clients = dao_manager :: get_table_data('clients', 0, 1000, ' where actual=1 ');

		$clients_ids = array ();
		$clients_values = array ();
		foreach ($clients as $values) {
			$clients_ids[] = $values['id'];
			$clients_values[] = $values['name'];
		}

		$good_groupes = dao_manager :: get_table_data('goods_groupes', 0, 1000, ' where actual=1 ');

		$good_groupe_ids = array ();
		$good_groupe_values = array ();

		foreach ($good_groupes as $values) {
			$good_groupe_ids[] = $values['id'];
			$good_groupe_values[] = $values['name'];
		}

		$good_types = dao_manager :: get_table_data('goods_type', 0, 10000, ' where actual=1 and groupe='.current($good_groupe_ids));
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

		$client = dao_manager :: get_item('clients',$order['client']);


		echo $this->smarty_get(array ('client'=>$client,
			'sellings' => $sellings,
			'good_groupe_ids' => $good_groupe_ids,
			'good_groupe_values' => $good_groupe_values,

			'clients_ids' => $clients_ids,
			'clients_values' => $clients_values,

			'good_type_ids' => $good_type_ids,
			'good_type_values' => $good_type_values,
			'good_types' => $all_good_types,

			'discounts' => explode(";",
			$settings->get_property('discounts'
		)),'kadran_price' => $settings->get_property('kadran_price'), 'grinding_price' => $settings->get_property('grinding_price'), 'skin_price' => $settings->get_property('skin_price'), 'polish_price' => $settings->get_property('polish_price'), 'photo_price' => $settings->get_property('photo_price'), 'matting_price' => $settings->get_property('matting_price'), 'facet_price' => $facet['full'], 'facet_size' => $facet['keys'], 'drilling_size' => $drilling['keys'], 'drilling_price' => $drilling['full'], 'photos' => file('photo.txt'), 'order' => $this->prepare_data($order)), 'general_bill.tpl');
		exit;
	}
}
?>