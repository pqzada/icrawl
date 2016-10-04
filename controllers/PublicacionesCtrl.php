<?php

class PublicacionesCtrl extends Controller {

	public function __construct() 
	{
		parent::__construct();
	}

	public function ultimasAction() 
	{
		$usuarioFacade = new UserFacade();
		$publicacionFacade = new PublicacionFacade();

		$this->_view->publicaciones = $publicacionFacade->getUltimas();
		$this->_view->usuarios = $usuarioFacade->getForUltimas();
	}

	public function destacadasAction() 
	{
		$usuarioFacade = new UserFacade();
		$publicacionFacade = new PublicacionFacade();

		$this->_view->publicaciones = $publicacionFacade->getDestacadas();
		$this->_view->usuarios = $usuarioFacade->getForUltimas();
	}

	public function eliminarAction() 
	{
		$result = 0;
		if(isset($_POST['id'])) {
			$publicacionFacade = new PublicacionFacade();
			$result = $publicacionFacade->eliminar($_POST['id']);
		}
		echo $result;
		die;
	}

	public function actualizarAction()
	{
		$userFacade = new UserFacade();
		$publicacionFacade = new PublicacionFacade();

		$users = $userFacade->getUsers();

		foreach($users as $user) {

			$script = dirname(__FILE__) . '/../scripts/update_user.php ' . $user->getId();
			$log = dirname(__FILE__) . '/../scripts/update_user.log';

			shell_exec("php $script >> $log &");
			if($idx++ == 2) {
				sleep(1);
				$idx=0;
			}

			// $user->setPublicaciones($userFacade->getUserPosts($user->getId()));
			// $user->setMediaComentarios($publicacionFacade->getMediaComentarios($user->getId()));
			// $user->setMediaLikes($publicacionFacade->getMediaLikes($user->getId()));
			// $userFacade->update($user);

			// foreach($user->getPublicaciones() as $publicacion) {

			// 	$destacado = 0;
			// 	if($publicacion->getComentarios() > $user->getMediaComentarios()) $destacado++;
			// 	if($publicacion->getLikes() > $user->getMediaLikes()) $destacado++;
			// 	$publicacion->setDestacada($destacado);

			// 	$publicacionFacade->save($publicacion);
			// }

		}

		$actualizacionFacade = new ActualizacionFacade();
		$actualizacionFacade->update();

		header("Location: " . $_SERVER['HTTP_REFERER']);
	}

}

?>