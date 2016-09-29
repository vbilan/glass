<?php


/*
 * Created on 29 лист 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once 'base_object.php';
class edit_user extends base_object {
	function get_content() {
		$user = array ();
		$errors = array ();
		if (isset ($_POST["submit"])) {
			$user['id'] = (int)@$_POST['id'];
			$user['login'] = htmlspecialchars1($_POST['login']);
			$user['pass'] = @ $_POST['pass'];
			$user['password2'] = @ $_POST['password2'];
			$user['admin'] = isset ($_POST['admin']) ? 1 : 0;
			$user['actual'] = isset ($_POST['actual']) ? 1 : 0;
			$errors = dao_manager :: validate_user($user);
			if (!count($errors)) {
				unset ($user['password2']);
				if (dao_manager :: save_user($user)) {
					$this->redirect("/index.php?action=users");
					exit;
				} else
					echo "query errors";
			} else {
				
			}
		}
		if (isset($_GET['delete'])&& isset ($_GET['id'])){
			if ((int)$_SESSION['logged_user']['id']!=(int)$_GET['id'] 
			&& (dao_manager ::  get_table_count('users', ' where admin=1 ')>0)){
				dao_manager :: delete_item('users',(int)$_GET['id']);
			}
			$this->redirect("/index.php?action=users");
			exit;
		}
		if (isset ($_GET['id'])) {
			$user = dao_manager :: get_item('users', (int) $_GET['id']);
		}
		return $this->smarty_get(array (
			'user' => $this->prepare_data($user),
			'errors' => $errors
		), 'edit_user.tpl');
	}
}
?>
