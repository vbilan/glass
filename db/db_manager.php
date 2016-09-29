<?php


/*
 * Created on 12 квіт 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include_once('db_config.php');
 
class db_manager {

	var $host = DB_HOST;
	var $user = DB_USER;
	var $password = DB_PASSWORD;
	var $db = DB_DB;
	
	var $connection = null;


	function connect() {
		$this->connection = mysql_connect($this->host, $this->user, $this->password) or die("connection failed");
	}

	function disconnect() {
		mysql_close($this->connection);
	}

	function select_db() {
		mysql_select_db($this->db) or die('cannot select data base');
		$query = "SELECT VERSION()";
		$ver = mysql_query($query);
		if (!$ver)
			exit ("Error with MySQL version detection");
		$version = mysql_result($ver, 0);
		list ($major, $minor) = explode(".", $version);
		$ver = $major.".".$minor;
		if ((float) $ver >= 4.1) {
			mysql_query("SET NAMES 'cp1251'");
		}
		mysql_query('SET SQL_BIG_SELECTS=1');
	}

	function query($query) {
		return mysql_query($query, $this->connection);
	}

	function fetch_assoc($res) {
		return mysql_fetch_assoc($res);
	}
	
	function fetch_array($res) {
		return mysql_fetch_array($res);
	}

	function num_rows($res) {
		return mysql_num_rows($res);
	}
	function insert_id(){
		return mysql_insert_id($this->connection);
	}
}
?>
