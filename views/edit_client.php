<?php


/*
 * Created on 29 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once 'base_object.php';

class edit_client extends base_object {
	function get_content() {
		$client = array ();
		$errors = array ();
		
		if (isset ($_GET['delete']) && isset ($_GET['id'])) {
			dao_manager :: delete_client((int) $_GET['id']);
			$this->redirect("/index.php?action=clients");
			exit;
		}
		
		if (isset ($_POST["submit"])) {
			$client['id'] = (int) @ $_POST['id'];
			$client['name'] = @ $_POST['name'];
			$client['phone'] = @ $_POST['phone'];
			$client['comment'] = @ $_POST['comment'];
			$client['actual'] = isset ($_POST['actual']) ? 1 : 0;
			$errors = dao_manager :: validate_client($client);
			if (!count($errors)) {
				if (dao_manager :: save_client($client)) {
					$this->redirect("/index.php?action=clients");
				} else
					echo "query errors";
			} else {
				$client['name'] = htmlspecialchars1($client['name']);
				$client['phone'] = htmlspecialchars1($client['phone']);
				$client['comment'] = htmlspecialchars1($client['comment']);
			}
		}

		if (isset ($_GET['id'])) {
			$client = dao_manager :: get_item('clients', (int) $_GET['id']);
		}
		return $this->smarty_get(array (
			'client' => $this->prepare_data($client),
			'errors' => $errors
		), 'edit_client.tpl');
	}
}
?>
