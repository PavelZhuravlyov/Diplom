<?php 
	session_start();
	require_once "database_class.php";

	$db = new DataBase();

	if (isset($_POST['value'])) {
		if ($_SESSION['login']) {
			$db->update('users', array("test_result" => $_POST['value']), "login='".$_SESSION['login']."'");
		}
	}
?>