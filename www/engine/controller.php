<?php 
	require_once "autor_class.php";
	require_once "registr_class.php";

	if (isset($_POST["Auto"])) {
		$data = json_encode($_POST["Auto"]);
		$auto = new Auto($data);
		echo $auto->autorization($_POST["Auto"]);
	}

	if (isset($_POST["Reg"])) {
		$data = json_encode($_POST["Reg"]);
		$auto = new Registration($data);
		echo $auto->registration($_POST["Reg"]);
	}
?>