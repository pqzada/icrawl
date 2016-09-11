<?php

$_params = $_GET;

if(!isset($_params['mod'])) $_params['mod'] = 'index';
if(!isset($_params['action'])) $_params['action'] = 'index';

switch ($_params['mod']) {

	case 'publicaciones': 
		$controller = new PublicacionesCtrl();
		$controller->_viewFile = 'publicaciones/'. $_params['action'] .'.php';
		$controller->{$_params['action'] . 'Action'}($_params);
		break;

	case 'cuentas': 
		$controller = new CuentasCtrl();
		$controller->_viewFile = 'cuentas/'. $_params['action'] .'.php';
		$controller->{$_params['action'] . 'Action'}($_params);
		break;
	
	default:
		$controller = new InicioCtrl();
		$controller->_viewFile = 'inicio/index.php';
		$controller->indexAction();
		break;
		
}

?>