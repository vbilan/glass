<?php
/*
 * Created on 2 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once 'base_object.php';

class edit_goods_groupe extends base_object {
	function get_content() {

		if (isset ($_GET['delete']) && isset ($_GET['id'])) {
			dao_manager :: delete_goods_groupe((int) $_GET['id']);
			$this->redirect("/index.php?action=goods_groupes");
			exit;
		}

		$goods_groupe = array ();

		$errors = array ();

		if (isset ($_POST["submit"])) {
			$goods_groupe['id'] = (int) @ $_POST['id'];
			$goods_groupe['name'] = htmlspecialchars1(@ $_POST['name']);
			$goods_groupe['comment'] = @ $_POST['comment'];
			$goods_groupe['actual'] = isset ($_POST['actual']) ? 1 : 0;
			$goods_groupe['unit_of_measurement_id'] = intval(@$_POST['unit_of_measurement_id']);
			//print_r($goods_groupe); die();
			$errors = dao_manager :: validate_goods_groupe($goods_groupe);
			if (!count($errors)) {
				if (dao_manager :: save_goods_groupe($goods_groupe)) {
					$this->redirect("/index.php?action=goods_groupes");
				} else
					echo "query errors";
			} else {

			}
		}

		if (isset ($_GET['id'])) {
			$goods_groupe = dao_manager :: get_item('goods_groupes', (int) $_GET['id']);
		}


		$units_of_measurements = dao_manager :: get_table_data('units_of_measurement', 0, 10000);
		$units_of_measurement_ids = array ();
		$units_of_measurement_values = array ();
		foreach ($units_of_measurements as $values) {
			$units_of_measurement_ids[] = $values['id'];
			$units_of_measurement_values[] = $values['name'];
		}
		
		return $this->smarty_get(
				array (
			'units_of_measurement_ids' => $units_of_measurement_ids,
			'units_of_measurement_values' => $units_of_measurement_values,
			'goods_groupe' => $this->prepare_data($goods_groupe), 
			'errors' => $errors), 
				'edit_goods_groupe.tpl');
	}
}
?>