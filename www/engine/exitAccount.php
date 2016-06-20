<?php 
	session_start();

	if (isset($_GET['delete'])) {
		session_destroy();
	}
?>