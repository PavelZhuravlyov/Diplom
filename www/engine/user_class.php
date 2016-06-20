<?php 
	require_once "global_class.php";

	class User extends GlobalClass {

		public function __construct($db) {
			parent::__construct('users', $db);
		}

		public function addUser($arrayData) {
			return $this->add($arrayData);
		}

		public function editUser($arrayData) {
			return $this->edit($arrayData);
		}

		public function deleteUser($login) {
			return $this->delete(array("login" => $login));
		}

		public function getFieldFromBD($value, $field) {
			$field = $this->getField($field, $field, $value);

			if (!$field) {
				return false;
			}
			return $field;
		}
	}
?>