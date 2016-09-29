<?php

/*
 * Created on 27 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once "base_object.php";
class client_bill extends base_object {
	
	function get_service_data($data, $selling) {
		$result = array('name'=>$data['name'], 'count'=>$selling['count'], 'price'=>floor($data['price']), 'square'=>0);
		$tmp = explode("++", $data['service_data']);
		
		switch ($data['service_type']) {
			case 'photo' :
				$result['width']=$tmp[0];
				$result['height']=$tmp[1];
				$result['image']=$tmp[2];
				$result['square'] = $selling['count']*$tmp[0]*$tmp[1]/1000000;
				break;

			case 'facet' :
				$result['name'] .=" ({$tmp[1]} mm)";
				$result['square']=0; 
			case 'polish' :
			case 'grinding' :

//				if ($tmp[0] > 7) {
//					$result['square'] += $selling['width'];
//					$tmp[0] -= 8;
//				}
//				if ($tmp[0] > 3) {
//					$result['square'] += $selling['height'];
//					$tmp[0] -= 4;
//				}
//				if ($tmp[0] > 1) {
//					$result['square'] += $selling['width'];
//					$tmp[0] -= 2;
//				}
//				if ($tmp[0]) {
//					$result['square'] += $selling['height'];
//				}

				$result['square'] =  $data['length'] * $selling['count']/1000;
				break;
			case 'drilling' :
				$result['data'] = array();
				for ($l = 0; $l < count($tmp); $l += 3) {
					$result['data'][$tmp[$l]] = array('name'=>$data['name']." ({$tmp[$l]} mm) ", 'count'=>$selling['count']*$tmp[$l+2], 'price'=>$tmp[$l+1], 'square'=>0);
				}
				break;
			case 'matting' :
				$result['paint_price'] =$tmp[4]*$selling['count'];
				$result['paint_color'] =explode(";",$tmp[7]);
				$result['price'] -=$result['paint_price'];
			case 'skin' :
				$result['square'] = $selling['width']*$selling['height']*$selling['count']/1000000;
				break;
			case 'kadran' :
				$result['square'] = $tmp[0]*$selling['count'];
				break;	
			case 'additional' :
				$result['comment'] = $tmp[0];
				$result['count']='&nbsp;';
				break;	
			default :
				break;
		}
		return $result;
	}
	
	function get_content() {
		
		$order = dao_manager :: get_item('orders', (int) $_GET['id']);
		$client = dao_manager :: get_item('clients', $order['client']);
		$all_services = array(); 
		
		$sellings = dao_manager :: get_data('sellings, goods_type', ' where sellings.good_type=goods_type.id and order_id='. ((int) $_GET['id']).' ORDER BY id', ' sellings.*, goods_type.name ');
					foreach ($sellings as & $selling) {
						$selling['price']= floor($selling['price']);
						$selling['services'] = '';
						$services = dao_manager :: get_data('services, service_name', ' where  services.service_type=service_name.type and services.selling='.$selling['id']);
						foreach ($services as $service) {
							$service_data = $this->get_service_data($service, $selling);
							if (isset($all_services[$service_data['name']])){
								$all_services[$service_data['name']]['price'] += $service_data['price'];
								$all_services[$service_data['name']]['square'] += $service_data['square'];
								$all_services[$service_data['name']]['count'] += $service_data['count'];
								if ($service['type']=='drilling'){
									foreach ($service_data['data'] as $key => $value){
										@$all_services[$service_data['name']]['data'][$key]['count']+=$value['count'];
										@$all_services[$service_data['name']]['data'][$key]['name']=$value['name'];
										@$all_services[$service_data['name']]['data'][$key]['price']+=$value['price'];
									}
								}
								
								  
							} else {
								$all_services[$service_data['name']]=$service_data;
							}
							
							
							
							if ($service['type']=='matting' && $service_data['paint_price']) {
								if (isset($all_services['paint'])) {
									$all_services['paint']['count']+=$service_data['count'];
									$all_services['paint']['square'] += $service_data['square'];
									$all_services['paint']['price'] += $service_data['paint_price'];
									foreach($service_data['paint_color'] as $color){
										$all_services['paint']['colors'][$color] = $color;
									}
								} else {
									$all_services['paint']['count']=$service_data['count'];
									$all_services['paint']['name']='Фарбування';
									$all_services['paint']['square'] = $service_data['square'];
									$all_services['paint']['price'] = $service_data['paint_price'];
									$all_services['paint']['colors']=array();
									foreach($service_data['paint_color'] as $color){
										$all_services['paint']['colors'][$color] = $color;
									}
								}	
								$all_services['paint']['avarange_price'] = ceil($all_services['paint']['price']/$all_services['paint']['square']);	
							};
							
							if ($all_services[$service_data['name']]['square'] * $all_services[$service_data['name']]['count'])
							$all_services[$service_data['name']]['avarange_price'] = ceil($all_services[$service_data['name']]['price']/$all_services[$service_data['name']]['square']);
						}
						$selling['avarange_price'] = ceil($selling['price']/($selling['height']*$selling['width']/1000/1000) / $selling['count']);
					}
					if (isset($all_services['paint']['colors'])){
						 $all_services['paint']['colors'] = implode(", ",$all_services['paint']['colors']);
					}
				
				
				
				if (isset($all_services['Сверління'])){
					foreach($all_services['Сверління']['data'] as $key => $value){
						$all_services[$key]=array('count'=>$value['count'], 'name'=>$value['name'],'price'=>$value['price'],'avarange_price'=>ceil($value['price']/$value['count']) );
					}
					unset($all_services['Сверління']);
				}
				
				ksort($all_services);	
				
				
		echo $this->smarty_get(array (
			'services_count'=>count($all_services),
			'sellings' => $sellings,
			'order' => $order,
			'num' => $order['id'] % 1000,
			'client'=>$client['name'],
			'phone'=>$client['phone'],
			'services'=>$all_services,
		), 'client_bill.tpl');

		exit;
	}
}
?>

