<?php 
	require_once "config_class.php";
	require_once "check_valid.php";
	require_once "database_class.php";

	class GlobalClass {
		private $db;
		private $tableName;
		protected $config;
		protected $valid;

		protected function __construct($tableName, $db) {
			$this->db = $db;
			$this->tableName = $tableName;
			$this->config = new Config();
			$this->valid = new CheckValid();
		}

		protected function add($newValues) {
			return $this->db->insert($this->tableName, $newValues);
		}

		protected function edit($updFields, $where = "") {
			return $this->db->update($this->tableName, $updFields, $where);
		}

		protected function delete($where) {
			return $this->db->delete($this->tableName, $where);
		}

		protected function deleteOnID($id) {
			return $this->db->deleteOnID($this->tableName, $id);
		}

		protected function deleteAll() {
			return $this->db->deleteAll($this->tableName);
		}

		protected function getField($fieldOut, $fieldIn, $valueIn) {
			return $this->db->getField($this->tableName, $fieldOut, $fieldIn, $valueIn);
		}

		protected function getFieldOnID($id, $field) {
			return $this->db->getFieldOnID($this->tableName, $id, $field);
		}

		protected function setFieldOnID($id, $field, $value) {
			return $this->db->setFieldOnID($this->tableName, $id, $field, $value);
		}

		public function get($id) {
			return $this->db->getElementOnID($this->tableName, $id);
		}

		public function getAll($order = "", $up = true) {
			return $this->db->getAll($this->tableName, $order, $up);
		}

		protected function getAllOnField($field, $value, $order = "", $up = true) {
			return $this->db->getAllOnField($this->tableName, $field, $value, $order, $up);
		}

		public function getRandomElement($count) {
			return $this->db->getRandomElements($this->tableName, $count);
		}

		public function getLastID() {
			return $this->db->getLastID($this->tableName);
		}

		public function getCount() {
			return $this->db->getCount($this->tableName);
		}

		protected function isExists($field, $value) {
			return $this->db->isExists($this->tableName, $field, $value);
		}
	}
?>