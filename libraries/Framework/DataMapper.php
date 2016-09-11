<?php 

class DataMapper {

	public $_dbTable;
	public $_db;

	public function __construct($dbTable) 
	{
		global $config;

		$this->_db = $config['db'];
		$this->_dbTable = $dbTable;
	}

	public function save($object) 
	{
		$sql = "INSERT INTO " . $this->_dbTable . " (" . $this->getInsertFields($object, '') . ") VALUES (" . $this->getInsertFields($object, ':') . ")";
		$stmt = $this->_db->prepare($sql);

		$vars = get_object_vars($object);
		foreach($vars as $field => $value) {
			$stmt->bindValue(":$field", $value);
		}

		$res = $stmt->execute();

		if($res) {
			return $this->_db->lastInsertId();
		} else {
			// TODO: Create Logger Class
			Debug::pre($stmt->errorInfo());
			return false;
		}
	}

	public function delete($id) 
	{
		$sql = "DELETE FROM " . $this->_dbTable . " WHERE id = :id";
		$stmt = $this->_db->prepare($sql);
		$stmt->bindValue(":id", $id);
		$stmt->execute();
	}

	public function findById($id) 
	{
		$sql = "SELECT * FROM " . $this->_dbTable . " WHERE id = :id";
		$stmt = $this->_db->prepare($sql);
		$stmt->bindValue(":id", $id);
		$stmt->execute();
		$tmp = $this->getSingleResult($stmt);
		return $tmp;
	}

	public function findByNombre($nombre) 
	{
		$sql = "SELECT * FROM " . $this->_dbTable . " WHERE nombre = :nombre";
		$stmt = $this->_db->prepare($sql);
		$stmt->bindValue(":nombre", $nombre);
		$stmt->execute();
		$tmp = $this->getSingleResult($stmt);
		return $tmp;
	}

	public function findAll() 
	{
		$sql = "SELECT * FROM " . $this->_dbTable . " ORDER BY id DESC";
		$stmt = $this->_db->query($sql);
		return $this->getResults($stmt);
	}

	public function getResults($stmt) 
	{
		if($stmt !== false) {

			$results = array();
			$class = $this->getEntityClass();

			$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach($items as $item) {
				$results[] = new $class($item);
			}

		} else {
			// TODO: Create Logger Class
			$results = null;
		}
		return $results;
	}

	public function getSingleResult($stmt) 
	{
		if($stmt !== false) {

			$class = $this->getEntityClass();
			$item = $stmt->fetch(PDO::FETCH_ASSOC);

			if($item == false) return null;

			return new $class($item);
			
		} else {
			// TODO: Create Logger Class
			$results = null;
		}
	}

	public function getInsertFields($object, $prefix) 
	{
		$vars = get_object_vars($object);
		$fields = array();

		foreach($vars as $field => $value) {
			$fields[] = $prefix . $field;
		}

		return implode(', ', $fields);
	}

	public function getEntityClass() 
	{
		return str_replace('Mapper', '', get_class($this));
	}

}

?>