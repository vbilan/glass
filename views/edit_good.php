<?php


/*
 * Created on 30 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

include_once 'base_object.php';

class edit_good extends base_object {
	function get_content() {

		$good = array ();

		$errors = array ();

		if (isset ($_POST["submit"])) {
			$good['id'] = (int) @ $_POST['id'];
			$good['type'] = (int) @ $_POST['type'];
			$good['square'] = (float) @ $_POST['square'];
			$good['date'] = (int) @ $_POST['date']? (int) @ $_POST['date']: mktime();
			$good['buying_price'] = (float) @ $_POST['buying_price'];
			$good['comment'] = @ $_POST['comment'];
			$errors = dao_manager :: validate_good($good);
			if (!count($errors)) {
				if (dao_manager :: save_good($good)) {
					$this->redirect("/index.php?action=goods");
				} else
					echo "query errors";
			} else {
				$good['comment'] = htmlspecialchars1($good['comment']);
			}
		}

		if (isset($_GET['delete'])&& isset ($_GET['id'])){
			dao_manager :: delete_item('goods',(int)$_GET['id']);
			$this->redirect("/index.php?action=goods");
			exit;
		}


		if (isset ($_GET['id'])) {
			$good = dao_manager :: get_item('goods', (int) $_GET['id']);
		}

		$good_groupes = dao_manager :: get_table_data('goods_groupes', 0, 1000, ' where actual=1 ');

		$good_groupe_ids = array ();
		$good_groupe_values = array ();

		foreach ($good_groupes as $values) {
			$good_groupe_ids[] = $values['id'];
			$good_groupe_values[] = $values['name'];
		}

		$groupe = isset ($good['type']) ? dao_manager :: get_item('goods_type', $good['type']) : current($good_groupe_ids);

		$good_types = dao_manager :: get_table_data('goods_type', 0, 10000, ' where actual=1 and groupe='.$groupe['groupe']);

		$good_type_ids = array ();
		$good_type_values = array ();
		foreach ($good_types as $values) {
			$good_type_ids[] = $values['id'];
			$good_type_values[] = $values['name'];
		}

		$unit_of_measurements = dao_manager :: get_select_result("select u.* from units_of_measurement u inner join goods_groupes g on g.unit_of_measurement_id = u.id AND g.id={$groupe['groupe']} ") ;
		$unit_of_measurement = '';
		if ($unit_of_measurements){
			$unit_of_measurement = $unit_of_measurements['name'];
		}
		
		return $this->smarty_get(array (
			'good_groupe_ids' => $good_groupe_ids,
			'good_groupe_values' => $good_groupe_values,
			'good_type_ids' => $good_type_ids,
			'good_type_values' => $good_type_values,
			'groupe' => $groupe['groupe'],
			'unit_of_measurement'=>	$unit_of_measurement,
			'good' => $this->prepare_data($good
		), 'errors' => $errors), 'edit_good.tpl');
	}
}
?>
