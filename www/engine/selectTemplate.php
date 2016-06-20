<?php 
	if ($_POST['temp']) {
		$template = $_POST['temp'].".json";
		$buffer = file_get_contents("../dataForm/$template");

		echo $buffer;
	}
?>