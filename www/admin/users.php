<?php 
	require_once "../engine/database_class.php";

	$db = new DataBase();
	$dataFromDB = $db->getFieldsValue('users', array("id", "login", "name", "secondname", "test_result", "date_reg", "town", "e-mail"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Users</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body>
	<div class="col-md-12">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#id</th>
          <th>Имя</th>
          <th>Фамилия</th>
          <th>Логин</th>
          <th>Дата регистрации</th>
          <th>Результат теста</th>
          <th>Город</th>
          <th>E-mail</th>
        </tr>
      </thead>
      <tbody>
        <? for ($i = 0; $i < count($dataFromDB); $i++) {?>
      		<tr>
      			<td><?= $dataFromDB[$i]['id'] ?></td>
      			<td><?= $dataFromDB[$i]['name'] ?></td>
      			<td><?= $dataFromDB[$i]['secondname'] ?></td>
      			<td><?= $dataFromDB[$i]['login'] ?></td>
      			<td><?= $dataFromDB[$i]['date_reg'] ?></td>
      			<td><?= $dataFromDB[$i]['test_result'] ?></td>
      			<td><?= $dataFromDB[$i]['town'] ?></td>
      			<td><?= $dataFromDB[$i]['e-mail'] ?></td>
      		</tr>
        <?}?>
      </tbody>
    </table>
  </div>
</body>
</html>