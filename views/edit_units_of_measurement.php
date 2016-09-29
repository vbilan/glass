<?php

/*
 * Created on 30 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once 'base_object.php';

class edit_units_of_measurement extends base_object {
	function get_content() {
		if (isset ($_GET['delete']) && isset ($_GET['id'])) {
			dao_manager :: delete_goods_type((int) $_GET['id']);
			$this->redirect("/index.php?action=units_of_measurement");
			exit;
		}
		
		$units_of_measurement = array ();
		
		$errors = array ();
		
		if (isset ($_POST["submit"])) {
			$units_of_measurement['id'] = (int) @ $_POST['id'];
			$units_of_measurement['name'] = @ $_POST['name'];			
			$errors = dao_manager :: validate_units_of_measurement($units_of_measurement);
			if (!count($errors)) {
				if (dao_manager :: save_units_of_measurement($units_of_measurement)) {
					$this->redirect("/index.php?action=units_of_measurement");
				} else
					echo "query errors";
			} 
		}

		if (isset ($_GET['id'])) {
			$units_of_measurement = dao_manager :: get_item('units_of_measurement', (int) $_GET['id']);
		}
		return $this->smarty_get(array (
			'units_of_measurement' => str_replace(array('"', "'"), '', $units_of_measurement),
			'errors' => $errors
		), 'edit_units_of_measurement.tpl');
	}
}
?>