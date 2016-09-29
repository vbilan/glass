<?php
/*
 * Created on 13 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once 'base_object.php';

class reset_good extends base_object {
	function get_content() {

		$good = array ();

		$good['type'] =(int) @ $_GET['type']; 
		$good['total'] = (int) @ $_GET['total']/100;
		$errors = array ();

		if (isset ($_POST["submit"])) {
			$good['type'] = (int) @ $_POST['type'];
			$good['square'] = (float) @ $_POST['square'];
			$good['total'] = (float) @ $_POST['total'];
			$good['amount'] = (float) @ $_POST['amount'];
			$good['comment'] = @ $_POST['comment'];
			$errors = dao_manager :: validate_revision($good);
			if (!count($errors)) {
				if (dao_manager :: save_revision($good)) {
					$this->redirect("/index.php?action=revisions");
				} else
					echo "query errors";
			} else {
				$good['comment'] = htmlspecialchars1($good['comment']);
			}
		}

		$goods_type =  dao_manager :: get_item('goods_type', $good['type']); 
		$good['name'] = $goods_type['name'];
		
		return $this->smarty_get(array (
			'good' => $this->prepare_data($good
		), 'errors' => $errors), 'reset_good.tpl');
	}
}
?>