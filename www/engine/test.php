<?php 
	require_once 'auto_reg_class.php';

	if (isset($_POST['Auto'])) {
		$auto = new AutoReg($_POST['Auto'], ['login', 'pass']);
		echo $auto->sendRes();
	}
?>