<?php

if(isset($_GET['user'])) {

	$instaFacade = new InstaFacade();
	$instaCuenta = $instaFacade->getCuenta($_GET['user'], $_GET['id']);

}

?>