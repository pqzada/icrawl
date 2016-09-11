<?php

class PublicacionMapper extends DataMapper {

	public function __construct() 
	{
		parent::__construct('insta_publicacion');
	}

	public function findUltimas($limit) 
	{
		$sql = "SELECT * FROM " . $this->_dbTable . " WHERE estado = 1 ORDER BY fecha_publicacion DESC LIMIT " . $limit;
		$stmt = $this->_db->query($sql);
		return $this->getResults($stmt);
	}

	public function findDestacadas($limit) 
	{
		$sql = "SELECT * FROM " . $this->_dbTable . " WHERE destacada > 0 AND estado = 1 ORDER BY date(fecha_publicacion) DESC, destacada DESC LIMIT " . $limit;
		$stmt = $this->_db->query($sql);
		return $this->getResults($stmt);
	}

	public function update(Publicacion $publicacion, $publicacionId) 
	{
		$sql = "UPDATE " . $this->_dbTable . " SET comentarios = :comentarios, likes = :likes, destacada = :destacada, fecha_actualizacion = :fecha_actualizacion WHERE id = :id";
		$stmt = $this->_db->prepare($sql);
		$stmt->bindValue(":comentarios", $publicacion->getComentarios());
		$stmt->bindValue(":likes", $publicacion->getLikes());
		$stmt->bindValue(":destacada", $publicacion->getDestacada());
		$stmt->bindValue(":fecha_actualizacion", date('Y-m-d H:i:s'));
		$stmt->bindValue(":id", $publicacionId);
		$stmt->execute();
	}

	public function delete($publicacionId) 
	{
		$sql = "UPDATE " . $this->_dbTable . " SET estado = 0 WHERE id = :id";
		$stmt = $this->_db->prepare($sql);
		$stmt->bindValue(":id", $publicacionId);
		$stmt->execute();
		return $stmt->rowCount();
	}

	public function avgComentarios($userId) 
	{
		$sql = "SELECT AVG(comentarios) as cantidad FROM " . $this->_dbTable . " WHERE id_usuario = :id_usuario";
		$stmt = $this->_db->prepare($sql);
		$stmt->bindValue(":id_usuario", $userId);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row['cantidad'];
	}

	public function avgLikes($userId) 
	{
		$sql = "SELECT AVG(likes) as cantidad FROM " . $this->_dbTable . " WHERE id_usuario = :id_usuario";
		$stmt = $this->_db->prepare($sql);
		$stmt->bindValue(":id_usuario", $userId);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row['cantidad'];
	}

}

?>