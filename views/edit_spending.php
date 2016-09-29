<?php


/*
 * Created on 1 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once 'base_object.php';

class edit_spending extends base_object {
	function get_content() {
		$spending = array ();
		$errors = array ();
		if (isset ($_POST["submit"])) {
			$spending['id'] = (int) @ $_POST['id'];
			$spending['service_type'] = @ $_POST['service_type'];
			$spending['amount'] = @ $_POST['amount'];
			$spending['comment'] = @ $_POST['comment'];
			$spending['date'] = @ $_POST['date']? @ $_POST['date']: mktime();
			$errors = dao_manager :: validate_spending($spending);
			if (!count($errors)) {
				if (dao_manager :: save_spending($spending)) {
					$this->redirect("/index.php?action=spendings");
				} else
					echo "query errors";
			} else {
				$spending['service_type'] = htmlspecialchars1(@ $_POST['service_type']);
				$spending['amount'] = htmlspecialchars1(@ $_POST['amount']);
				$spending['comment'] = htmlspecialchars1(@ $_POST['comment']);
			}
		}

		if (isset($_GET['delete'])&& isset ($_GET['id'])){
			dao_manager :: delete_item('spendings',(int)$_GET['id']);
			$this->redirect("/index.php?action=spendings");
			exit;
		}
		
		if (isset ($_GET['id'])) {
			$spending = dao_manager :: get_item('spendings', (int) $_GET['id']);
		}
		$spending_types = array (
				'general',
				'matting',
				'grinding',
				'polish',
				'facet',
				'drilling',
				'photo',
				'kadran',
				'spend1',
                'skin',
				'additional'
			);
		$spending_names = array (
				'загальні',
				'матування',
				'шліфування',
				'поліровка',
				'фацет',
				'сверління',
				'фотодрук',
				'кадран',
				'витрата 1',
                'плівка',
				'додаткова послуга'
			);
		if ($_SESSION['logged_user']['admin']) {
			$spending_types[]='salary';
			$spending_names[]='зарплата';
		} 
			
		return $this->smarty_get(array (
			'spending_types' => $spending_types,
			'spending_names' => $spending_names,
			'spending' => $this->prepare_data($spending),
			'errors' => $errors
		), 'edit_spending.tpl');
	}
}
?>
