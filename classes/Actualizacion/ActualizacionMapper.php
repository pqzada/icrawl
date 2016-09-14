<?php

class ActualizacionMapper extends DataMapper {

	public function __construct() 
	{
		parent::__construct('insta_actualizacion');
	}

	public function update() 
	{
		$sql = "UPDATE " . $this->_dbTable . " SET fecha = now() WHERE id = 1";
		$stmt = $this->_db->prepare($sql);
		$stmt->execute();
	}

}

?>