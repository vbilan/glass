<?php
/*
 * Created on 8 ñ³÷ 2011
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include_once 'base_object.php';
 class matting_bill extends base_object {
	function get_content() {
		$id = (int)$_GET['id'];
		$mattings =  dao_manager :: get_groupe_matting_data($id);
		$num=0; 
		foreach ($mattings as &$value){
			$data = explode('++',$value['service_data']);
			$value['img'] = $data[2];
			$img_data = explode('/',$value['img']);
			$img_file = $img_data[count($img_data)-1];
			$img_file_data=explode('.',$img_file);
			$value['img_name']=$img_file_data[0];
			
//			if ($num==$value['num']){
//				unset($value['num']);
//			} else $num=$value['num'];
			$value['matting']= $data[3];
			$value['paint_price']= $data[4];
			$value['mirror']= $data[5];
			$value['back']= $data[6];
			$value['paint_color']= $data[7];
			
		}
		
		echo $this->smarty_get(array (
			'mattings' => $mattings, 'id'=>$id, 'date'=>date("d/m/Y",mktime())), 'matting_bill.tpl');
		exit;
	}
}
?>
