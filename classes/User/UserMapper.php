<?php 

class UserMapper extends DataMapper {

	public function __construct() 
	{
		parent::__construct('insta_usuario');
	}

	public function update(User $user, $userId) 
	{
		$sql = "UPDATE " . $this->_dbTable . " SET media_comentarios = :media_comentarios, media_likes = :media_likes WHERE id = :id";
		$stmt = $this->_db->prepare($sql);
		$stmt->bindValue(":media_comentarios", $user->getMediaComentarios());
		$stmt->bindValue(":media_likes", $user->getMediaLikes());
		$stmt->bindValue(":id", $userId);
		$stmt->execute();
	}

}

?>