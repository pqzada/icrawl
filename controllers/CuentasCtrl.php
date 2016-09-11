<?php

class CuentasCtrl extends Controller {

	public function __construct() 
	{
		parent::__construct();
	}

	public function indexAction() 
	{
		$userFacade = new UserFacade();
		$this->_view->usuarios = $userFacade->getUsers();	
	}

	public function agregarAction() 
	{
		if(isset($_POST['agregar'])) {
			$user = new User($_POST);
			$userFacade = new UserFacade();
			$this->_view->result = $userFacade->save($user);
			$this->_view->user = $user;
		}
	}

	public function editarAction($data) 
	{
		// $userId = $data['id'];
		// $userFacade = new UserFacade();

		// $usuario = $userMapper->find($userId);

		// if(isset($_POST['editar'])) {
		// 	$newUser = new User($_POST);
		// 	$userFacade = new UserFacade();
		// 	$this->_view->result = $userFacade->update($newUser);
		// 	$this->_view->user = $newUser;
		// }

	}

	public function eliminarAction($data)
	{

	}

}

?>