<?php
	require_once "config_class.php";

	class CheckValid {
		private $config;

		public function __construct() {
			$this->config = new Config();
		}

		// Проверка id на валидность
		public function validID($id) {
			$id = $this->isIntNumb($id);
			return ($id <= 0) ? false : true;
		}

		// Проверка id на целое число
		private function isIntNumb($number) {
			if (!is_int($number) && (!is_string($number))) {
				return false;
			} else if (!preg_match('/^-?(([1-9][0-9]*|0))$)/', $number)) {
				return false;
			} else {
				return true;
			}
		}

		public function isEmptyData($data, $notEmptyFields) {
			for ($i = 0; $i < count($notEmptyFields); $i++) {
				$field = $notEmptyFields[$i]; 
				if ($data[$field] === '') {
					return true;
				}
			}
			return false;
		}
	}
?>