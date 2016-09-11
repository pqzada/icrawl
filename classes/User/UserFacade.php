<?php

class UserFacade {

	public function save(User $user)
	{
		$valid = $this->validate($user);
		if($valid === true) {
			$user->setUrl("https://www.instagram.com/" . $user->getCuenta() . "/");
			$user->setMediaComentarios(0);
			$user->setMediaLikes(0);
			unset($user->publicaciones);

			$userMapper = new UserMapper();
			$userMapper->save($user);
			return true;
		} else {
			return $valid;
		}
	}

	public function validate(User $user) 
	{
		$errors = array();

		if($user->getId() != "") {
			if(!is_numeric($user->getId())) {
				$errors[] = "ID Instagram inválido (no es numérico)";
			} else {
				$userMapper = new UserMapper();
				$userTmp = $userMapper->findById($user->getId());
				if(!is_null($userTmp)) {
					$errors[] = "ID Instagram ya se encuentra registrado";
				}
				
				$publicacionCrawler = new PublicacionCrawler();
				if(!$publicacionCrawler->testId($user->getId())) {
					$errors[] = "ID Instagram inválido (no existe)";
				}
			}
		} else {
			$errors[] = "Debes ingresar un ID Instragram";
		}

		if($user->getCuenta() == "") $errors[] = "Debes ingresar una Cuenta";
		if($user->getNombre() == "") $errors[] = "Debes ingresar un Nombre";

		if(count($errors) == 0) return true;
		else return $errors;
	}

	public function update(User $user) 
	{
		$userMapper = new UserMapper();
		$userMapper->update($user, $user->getId());
	}

	public function getUsers() 
	{
		$userMapper = new UserMapper();
		return $userMapper->findAll();
	}

	public function getUserPosts($userId) 
	{
		$pc = new PublicacionCrawler();
		return $pc->getPosts($userId);
	}

	public function getForUltimas() 
	{
		$usuarios = $this->getUsers();
		$usuariosTmp = array();

		foreach($usuarios as $usuario) {
			$usuariosTmp[$usuario->getId()]['nombre'] = $usuario->getNombre();
			$usuariosTmp[$usuario->getId()]['cuenta'] = $usuario->getCuenta();
		}

		return $usuariosTmp;
	}

}

?>