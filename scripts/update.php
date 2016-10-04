<?php
date_default_timezone_set("America/Santiago");

require_once dirname(__FILE__) . '/../config.php';
require_once dirname(__FILE__) . '/../includes/functions.php';
require_once dirname(__FILE__) . '/../bootstrap.php';

$userFacade = new UserFacade();
$publicacionFacade = new PublicacionFacade();

$users = $userFacade->getUsers();

$idx = 0;
foreach($users as $user) {

	$script = dirname(__FILE__) . '/update_user.php ' . $user->getId();
	$log = dirname(__FILE__) . '/update_user.log';

	shell_exec("php $script >> $log &");
	if($idx++ == 5) {
		sleep(1);
		$idx=0;
	}

}

// foreach($users as $user) {

// 	$user->setPublicaciones($userFacade->geUserPosts($user->getId()));
// 	$user->setMediaComentarios($publicacionFacade->getMediaComentarios($user->getId()));
// 	$user->setMediaLikes($publicacionFacade->getMediaLikes($user->getId()));
// 	$userFacade->update($user);

// 	foreach($user->getPublicaciones() as $publicacion) {

// 		$destacado = 0;
// 		if($publicacion->getComentarios() > $user->getMediaComentarios()) $destacado++;
// 		if($publicacion->getLikes() > $user->getMediaLikes()) $destacado++;
// 		$publicacion->setDestacada($destacado);

// 		$publicacionFacade->save($publicacion);
// 	}

// 	$actualizacionFacade = new ActualizacionFacade();
// 	$actualizacionFacade->update();

// }

?>