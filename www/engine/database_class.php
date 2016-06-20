<?php 
	require_once "config_class.php";
	require_once "check_valid.php";

	class DataBase {
		private $config;
		private $mysqli;
		private $valid;

		public function __construct() {
			$this->config = new Config();
			$this->valid = new CheckValid();
			$this->mysqli = new mysqli($this->config->host, $this->config->user, $this->config->password, $this->config->db);
			$this->mysqli->query("SET NAME 'utf8'");
		}

		// Отправка запроса к БД
		private function query($query) {
			return $this->mysqli->query($query);
		}

		// выборка из БД ($fields - массив полей для выборки)
		private function select($tableName, $fields, $where = '', $order = '', $up = true, $limit = '') {
			for ($i = 0; $i < count($fields); $i++) {
				if ((strpos($fields[$i], '(') === false) && ($fields[$i] != '*')) {
					$fields[$i] = "`".$fields[$i]."`";
				}
			}

			$fields = implode(",", $fields);
			$tableName = $this->config->dbPrefix.$tableName;


			if (!$order) {
				$order = "ORDER BY `id`";
			} elseif ($order != 'RAND()') {
				$order = "ORDER BY `$order`";
				if (!$up) {
					$order += " DESC";
				}
			} else {
				$order = " ORDER BY $order ";
			}

			if ($limit) {
				$limit = " LIMIT $limit ";
			}

			if ($where) {
				$query = "SELECT $fields FROM `$tableName` WHERE $where $order $limit";
			} else {
				$query = "SELECT $fields FROM `$tableName` $order $limit";
			}

			$resultSet = $this->query($query);

			if (!$resultSet) {
				return false;
			}

			$i = 0;
			while ($row = $resultSet->fetch_assoc()) {
				$data[$i] = $row;
				$i++;
			}

			$resultSet->close();

			return $data;
		}

		// записа в БД ($newValues - ассоциативный массив)
		public function insert($tableName, $newValues) {
			$tableName = $this->config->dbPrefix.$tableName;
			$query = "INSERT INTO $tableName (";

			foreach ($newValues as $field => $value) {
				$query .= "`".$field."`,";
			}

			$query = substr($query, 0, -1);
			$query .= ") VALUES (";

			foreach ($newValues as $value) {
				$query .= "'".addslashes($value)."',";	
			}
			$query = substr($query, 0, -1);
			$query .= ")";

			return $this->query($query);
		}

		// Обновление записей в БД ($updFields - ассоциативный массив полей для обновления)
		public function update($tableName, $updFields, $where) {
			$tableName = $this->config->dbPrefix.$tableName;
			$query = "UPDATE $tableName SET ";

			foreach ($updFields as $field => $value) {
				$query .= "`$field`='".addslashes($value)."',";
			}
			$query = substr($query, 0, -1);

			if ($where) {
				$query .= " WHERE $where";
				echo $query;
				return $this->query($query);
			} else {
				return false;
			}
		}

		// Удаление записи из БД
		public function delete($tableName, $where) {
			$tableName = $this->config->dbPrefix + $tableName;
			if ($where) {
				$query = "DELETE FROM $tableName WHERE $where";
				return $this->query($query);
			} else {
				return false;
			}
		}

		// Удалить все записи
		public function deleteAll($tableName) {
			$tableName = $this->config->dbPrefix + $tableName;
			$query = "TRUNCATE TABLE `$tableName`";

			return $this->query($query); 
		}

		// Получить значение поля
		public function getField($tableName, $fieldOut, $fieldIn, $valueIn) {
			$data = $this->select($tableName, array($fieldOut), "`$fieldIn`='".addslashes($valueIn)."'");
			if (count($data) != 1) {
				return false;
			}
			return $data[0][$fieldOut];
		}

		// Получить значение поля по id
		public function getFieldOnID($tableName, $id, $fieldOut) {
			if (!$this->existsID($tableName, $id)) {
				return false;
			}
			return $this->getField($tableName, $fieldOut, "id", $id);
		}

		// Получить все поля
		public function getAll($tableName, $order, $up) {
			return $this->select($tableName, array("*"), "", $order, $up);
		}

		// Получить все поля по конкретному полю
		public function getAllOnField($tableName, $field, $value, $order, $up) {
			return $this->select($tableName, array("*"), "`$field`='".addslashes($value)."'", $order, $up);
		}

		// Получить последнюю запись в таблице
		public function getLastID($tableName) {
			$data = $this->select($tableName, array("MAX(`id`)"));
			return $data[0]["MAX(`id`)"];
		}

		// Удалить запись по id
		public function deleteOnID($tableName, $id) {
			if (!$this->existsID($tableName, $id)) {
				return false;
			}
			return $this->delete($tableName, "`id` = '$id'");
		}

		// Обновить запись по id
		public function updateOnID($tableName, $id, $updFields) {
			$tableName = $this->config->dbPrefix + $tableName;
			$query = "UPDATE $tableName SET ";

			if (!$this->existsID($tableName, $id)) {
				return false;
			}

			foreach ($updFields as $field => $value) {
				$query .= "`$field` = `".addslashes($value)."`,";
			}

			$query = substr($query, 0, -1);

			$query .= " WHERE $where";
			return $this->query($query);
		}

		// Обновить значение полей
		public function setField($tableName, $field, $value, $fieldIn, $valueIn) {
			return $this->update($tableName, array($field => $value), "`$fieldIn` = '".addslashes($valueIn)."'");
		}

		// Обновить значение поля по id
		public function setFieldOnID($tableName, $id, $field, $value) {
			if (!$this->existsID($tableName, $id)) {
				return false;
			}

			return $this->setField($tableName, $field, $value, "id", $id);
		}

		// Получить выборку по id
		public function getElementOnID($tableNamem, $id) {
			if (!$this->existsID($tableName, $id)) {
				return false;
			}

			$arr = $this->select($tableName, array("*"), "`id` = '$id'");

			return $arr[0];
		}

		// Рандомное получение элементов
		public function getRandomElements($tableName, $count) {
			return $this->select($tableName, array("*"), "", "RAND()", true, $count);
		}

		// 
		public function getCount($tableName) {
			$data = $this->select($tableName, array("COUNT(`id`)"));
			return $data[0]["COUNT(`id`)"];
		}

		// Проверка на существование результата
		public function isExists($tableName, $field, $value) {
			$data = $this->select($tableName, array("id"), "`$field` = '".addslashes($value)."'");

			if (count($data) === 0) {
				return false;
			}

			return true;
		}

		// Проверка на существование записи с таким id в БД
		private function existsID($tableName, $id) {
			if (!$this->valid->validID($id)) {
				return false;
			}

			$data = $this->select($tableName, array("id"), "`id` = '".addslashes($id)."'");

			return (count($data) === 0) ? false : true;
		}

		public function getFieldsValue($tableName, $fields, $where = "") {
			return $this->select($tableName, $fields, $where);
		}

		public function __destruct() {
			if ($this->mysqli) {
				$this->mysqli->close();
			}
		}
	}
?>