<?php 
	session_start();
	if (isset($_POST)) {
		$login = $_POST['login'];
		$password = $_POST['login'];

		if (($login == 'admin') && ($password == 'admin')) {
			$_SESSION['admin'] = true;
			header("Location: index.php");
		}
	}
?>