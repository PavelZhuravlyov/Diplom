<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
	<? if (isset($_SESSION['admin'])) {?>
		<? require_once "content.php" ?>
	<?} else {?>
		<? require_once "autoriz.php" ?>
	<?}?>
</body>
</html>