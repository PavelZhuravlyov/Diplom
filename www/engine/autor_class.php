<?php 
	require_once "user_class.php";

	class Auto {
		protected $valid;

		public function __construct($data) {
			session_start();
			$this->data = $data;
			$this->db = new DataBase();
			$this->user = new User($this->db);
			$this->valid = new CheckValid();
			$this->response = array("title" => '', "success" => '', "message" => '');
		}

		private function checkFields($data) {
			if (!$this->valid->isEmptyData($data, ['login', 'pass'])) {
				return true;
			}
			return false;
		}

		private function findUserInDB($data) {
			if (!$this->checkFields($data)) {
				return false;
			}
			if ($this->user->getFieldFromBD($data["login"], "login")) {
				return true;
			}
			return false;
		}

		private function checkUser($data) {
			if (!$this->findUserInDB($data)) {
				return false;
			}
			return true;
		}

		public function autorization($data) {
			$tableName = (isset($data['company'])) ? 'company' : 'users';

			if ($tableName == 'company') {
				$dataFromDB = $this->db->getFieldsValue($tableName, array("login", "name", "address", "phone_numb", "e-mail", "site"), "`login`='".$data['login']."'");
				
				if (count($dataFromDB)) {
					$_SESSION['is_company'] = true;
					$_SESSION['login'] = $data['login'];
					$_SESSION['name'] = $dataFromDB[0]['name'];

					$this->response['title'] = "Успех";
					$this->response['message'] = "Авторизация компании прошла успешно";
					$this->response['success'] = true;
					$this->response['is_company'] = true;
				} else {
					$this->response['title'] = "Ошибка";
					$this->response['message'] = "Такого логина не найдено";
					$this->response['success'] = false;
				}
			} else {
				if ($this->checkUser($data)) {
				  $dataFromDB = $this->db->getFieldsValue($tableName, array("login", "name", "secondname", "test_result"), "`login`='".$data['login']."'");
					
					$_SESSION['login'] = $data['login'];
					$_SESSION['name'] = $dataFromDB[0]['name'];
					$_SESSION['secondname'] = $dataFromDB[0]['secondname'];
					$_SESSION['test_result'] = $dataFromDB[0]['test_result'];

					$this->response['title'] = "Успех";
					$this->response['message'] = "Авторизация прошла успешно";
					$this->response['success'] = true;
				} else {
					$this->response['title'] = "Ошибка";
					$this->response['message'] = "Такого логина не найдено";
					$this->response['success'] = false;
				}
			}

			return json_encode($this->response);
		}
	}
?>