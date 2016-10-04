<?php
date_default_timezone_set("America/Santiago");

require_once dirname(__FILE__) . '/../config.php';
require_once dirname(__FILE__) . '/../includes/functions.php';
require_once dirname(__FILE__) . '/../bootstrap.php';

$date = new DateTime();
$userFacade = new UserFacade();
$publicacionFacade = new PublicacionFacade();

echo $date->format('Y-m-d H:i:s') . "\t" . $argv[1] . "\n";

$user = $userFacade->getUserById($argv[1]);
$user->setPublicaciones($userFacade->getUserPosts($user->getId()));
$user->setMediaComentarios($publicacionFacade->getMediaComentarios($user->getId()));
$user->setMediaLikes($publicacionFacade->getMediaLikes($user->getId()));
$userFacade->update($user);

foreach($user->getPublicaciones() as $publicacion) {

	$destacado = 0;
	if($publicacion->getComentarios() > $user->getMediaComentarios()) $destacado++;
	if($publicacion->getLikes() > $user->getMediaLikes()) $destacado++;
	$publicacion->setDestacada($destacado);

	$publicacionFacade->save($publicacion);
}

$actualizacionFacade = new ActualizacionFacade();
$actualizacionFacade->update();

?>