<?php

/*
 * Created on 9 ñ³÷ 2011
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

include_once 'base_object.php';
class cutting_bill extends base_object {
	
	function get_data($data,$char){
				$result = array(0=>'',1=>'',2=>'',3=>''); 
				if ($data > 7) {
					$result[3]=$char;
					$data -= 8;
				}
				if ($data > 3) {
					$result[2]=$char;
					$data -= 4;
				}
				if ($data > 1) {
					$result[1]=$char;
					$data -= 2;
				}
				if ($data) {
					$result[0]=$char;
				}
				return $result;
				
	}
	
	function get_content() {
		$groupe = (int) $_GET['id'];
		$cuttings = dao_manager :: get_groupe_cutting_data($groupe);
		$num = 0;
		$result = array ();
		foreach ($cuttings as $value) {
			$id = $value['id'];
			if (isset ($result[$id])) {
				if ($value['service_type'] == 'grinding' || $value['service_type'] == 'polish' || $value['service_type'] == 'skin') {
					$result[$id][$value['service_type']] = 1;
					if ($value['service_type']  != 'skin'){
						$result[$id][$value['service_type']] = $this->get_data($value['service_data'], substr($value['short'],0,1));
					}
				} else {
					$result[$id]['services'] .= ' '.$value['short'];
				}
			} else {
				$value['services'] ='';
				if ($value['service_type'] == 'grinding' || $value['service_type'] == 'polish' || $value['service_type'] == 'skin') {
					$value[$value['service_type']] = 1;
					if ($value['service_type']  != 'skin'){
						$value[$value['service_type']] = $this->get_data($value['service_data'], substr(trim($value['short']),0,1));
					}
				} else {
					$value['services'] = $value['short'];
				}
				$result[$id] = $value;
			}
		}
		echo $this->smarty_get(array (
			'cuttings' => $result,
			'id' => $groupe,
			'date' => date("d/m/Y",
		mktime())), 'cutting_bill.tpl');
		exit;
	}
}
?>
