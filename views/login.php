<?php
function set_cookie($user, $password, $time) {
	setcookie("logged_user", $user, $time);
	setcookie("password", $password, $time);
}

function clear_cookie() {
	set_cookie('', '', time() - 10 * 365 * 24 * 60 * 60); // ~ 10 років тому ;) 
}

if (isset($_GET['action']) && $_GET['action']=='logout'){
	//session_start();
	clear_cookie();
	unset($_SESSION);
	session_destroy();
	Header('Location: index.php?action=login');
	exit;
}

$url = isset ($_GET['url']) ? $_GET['url'] : '';

if (isset ($_POST['submit'])) {
	
	$user = dao_manager :: get_user($_POST['user_name']);
	if (isset ($user) && $user['pass'] == $_POST['password']) {
		//session_start();
		$_SESSION['logged_user'] = $user;
		//print_r($_SESSION);
		if (isset ($_POST['autologin'])) {
			set_cookie($_POST['user_name'], $_POST['password'], time() + 10 * 365 * 24 * 60 * 60); // ~ 10 років
		} else {
			clear_cookie();
		}
		if (trim($url)) {
			echo $url;
			Header('Location: '.urldecode($url));
		} else {
			Header('Location: index.php');
		}
		exit;
	} else {
		clear_cookie();
	}
}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>
<body bgcolor="#feefaf"><center>

 <? if (isset($_POST['submit'])) {?>
 	<h1> Не коректний користувач або пароль </h1>
 	<?}?>		
  <form action="index.php" method="post" >
  <input type="hidden" name="action" value="login" >
  <input type="hidden" name="url" value="<?echo $url?>"/>  
  
  <table>
    <tr>
      <td>Користувач</td><td><input type="text" name="user_name"  size="40" maxlength="40"/></td><td></td>
    </tr>
    <tr>
      <td>Пароль</td><td><input type="password" name="password" size="40" maxlength="40"/></td><td></td>
    </tr>
    <tr>
      	<td>
  			<label for="autologin">Автологін</label>
    	</td>
  		<td>
  			<input type="checkbox" name="autologin" id="autologin" <? if (isset($_POST['autologin'])) echo 'checked' ?>/>
  			(Кукіс мають бути дозволені)
    	</td>
    	<td>
    	</td>
    </tr>
    <tr>
      <td>
  		<input type="submit" name="submit" value="Залогінитись"/>
  
  		</td>
  		<td>
  			<input type="reset" value="Відмінити"/>
    	</td>
    	<td>
    	</td>
    </tr>    
  </table>
  </form></center>
  </body>
</html>
