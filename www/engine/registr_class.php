<?php 
	require_once "user_class.php";

	class Registration {
		protected $valid;

		public function __construct($data) {
			$this->data = $data;
			$this->db = new DataBase();
			$this->user = new User($this->db);
			$this->valid = new CheckValid();
			$this->config = new Config();
			$this->response = array("title" => '', "success" => '', "message" => '');
		}

		private function checkFields($data) {
			if (!$this->valid->isEmptyData($data, ['login', 'password', 'name', 'secondname', 'phone_numb', 'e-mail'])) {
				return true;
			}
			return false;
		}

		private function findUserInDB($data) {
			if (!$this->checkFields($data)) {
				return false;
			}
			if ($this->user->getFieldFromBD($data['login'])) {
				return true;
			}
			return false;
		}

		public function registration($data) {
			$data['password'] = sha1($data['password'].$this->config->secret);
			list($uses, $sec) = explode(" ", microtime());
			$data['date_reg'] = $sec;

			if ($this->findUserInDB($data)) {
				$this->response['title'] = "Ошибка регистрации";
				$this->response['success'] = false;
				$this->response['message'] = "Такой логин уже существует";

				return json_encode($this->response);
			} else {
				$this->response['title'] = "Успех";
				$this->response['success'] = true;
				$this->response['message'] = "Регистрация прошла успешно";

				$this->user->addUser($data);
				
				return json_encode($this->response); 
			}  
		}
	}
?>