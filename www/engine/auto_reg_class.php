<?php 
	require_once 'config_class.php';
	require_once 'database_class.php';

	class AutoReg {
		public $data;
		public $requireFields;

		public function __construct($data, $requireFields) {
			$this->data = $data;
			$this->reqFields = $requireFields;
			$this->config = new Config();
			$this->dbClass = new DataBase();
		}

		public function sendRes() {
			$result = $this->checkFields($this->data, $this->reqFields);
			
			if ($result) {
				return true;
			}

			return $this->dbClass->select('users', ['login', '123']);
		}

		private function checkFields($data, $reqFields) {
			foreach ($reqFields as $key => $value) {
				$field = trim(strip_tags($data[$value]));
				if ($field == '') {
					return false;
				}
			}
			return true;
		}
	}
?>