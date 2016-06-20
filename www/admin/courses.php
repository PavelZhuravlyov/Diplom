<?php 
	require_once "../engine/database_class.php";

	$db = new DataBase();
	$dataFromDB = $db->getFieldsValue('courses', array("id", "name", "company_course", "price", "duration", "time", "town"));
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
          <th>Компания курса</th>
          <th>Цена</th>
          <th>Длительность</th>
          <th>Период</th>
          <th>Город</th>
        </tr>
      </thead>
      <tbody>
        <? for ($i = 0; $i < count($dataFromDB); $i++) {?>
      		<tr>
      			<td><?= $dataFromDB[$i]['id'] ?></td>
      			<td><?= $dataFromDB[$i]['name'] ?></td>
      			<td><?= $dataFromDB[$i]['company_course'] ?></td>
      			<td><?= $dataFromDB[$i]['price'] ?></td>
            <td><?= $dataFromDB[$i]['duration'] ?></td>
      			<td><?= $dataFromDB[$i]['time'] ?></td>
            <td><?= $dataFromDB[$i]['town'] ?></td>
      		</tr>
        <?}?>
      </tbody>
    </table>
  </div>
</body>
</html>