<?php 
	require_once "../engine/database_class.php";

	$db = new DataBase();
	$dataFromDB = $db->getFieldsValue('company', array("id", "login", "name", "address", "activity", "phone_numb", "date_reg", "e-mail", "site"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Companyes</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body>
	<div class="col-md-12">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#id</th>
          <th>Имя</th>
          <th>Логин</th>
          <th>Дата регистрации</th>
          <th>Адрес</th>
          <th>E-mail</th>
          <th>Сайт</th>
        </tr>
      </thead>
      <tbody>
        <? for ($i = 0; $i < count($dataFromDB); $i++) {?>
      		<tr>
      			<td><?= $dataFromDB[$i]['id'] ?></td>
      			<td><?= $dataFromDB[$i]['name'] ?></td>
      			<td><?= $dataFromDB[$i]['login'] ?></td>
      			<td><?= $dataFromDB[$i]['date_reg'] ?></td>
            <td><?= $dataFromDB[$i]['address'] ?></td>
      			<td><?= $dataFromDB[$i]['e-mail'] ?></td>
            <td><?= $dataFromDB[$i]['site'] ?></td>
      		</tr>
        <?}?>
      </tbody>
    </table>
  </div>
</body>
</html>