<?php

/*
 * Created on 30 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once 'base_object.php';

class edit_goods_type extends base_object {
	function get_content() {
		if (isset ($_GET['delete']) && isset ($_GET['id'])) {
			dao_manager :: delete_goods_type((int) $_GET['id']);
			$this->redirect("/index.php?action=goods_types");
			exit;
		}
		
		$goods_type = array ();
		
		$errors = array ();
		
		if (isset ($_POST["submit"])) {
			$goods_type['id'] = (int) @ $_POST['id'];
			$goods_type['name'] = @ $_POST['name'];
			$goods_type['smash_percent'] = (float) @ $_POST['smash_percent'];
			$goods_type['comment'] = @ $_POST['comment'];
			$goods_type['groupe'] = (int) @$_POST['groupe'];
			$goods_type['price'] = (float)@$_POST['price'];
			$goods_type['actual'] = isset ($_POST['actual']) ? 1 : 0;
			$errors = dao_manager :: validate_goods_type($goods_type);
			if (!count($errors)) {
				if (dao_manager :: save_goods_type($goods_type)) {
					$this->redirect("/index.php?action=goods_types");
				} else
					echo "query errors";
			} 
		}

		if (isset ($_GET['id'])) {
			$goods_type = dao_manager :: get_item('goods_type', (int) $_GET['id']);
		}
		
		$good_groupes = dao_manager :: get_table_data('goods_groupes', 0, 1000, ' where actual=1 ');

		$good_groupe_ids = array ();
		$good_groupe_values = array ();
		foreach ($good_groupes as $values) {
			$good_groupe_ids[] = $values['id'];
			$good_groupe_values[] = $values['name'];
		}
		
		return $this->smarty_get(array (
			'good_groupe_ids' => $good_groupe_ids,
			'good_groupe_values' => $good_groupe_values,
			'goods_type' => $this->prepare_data($goods_type),
			'errors' => $errors
		), 'edit_goods_type.tpl');
	}
}
?>