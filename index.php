<?php
date_default_timezone_set("America/Santiago");

require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . '/includes/functions.php';
require_once dirname(__FILE__) . '/bootstrap.php';
require_once dirname(__FILE__) . '/router.php';

extract(get_object_vars($controller->_view));

$actualizacionFacade = new ActualizacionFacade();
$actualizacion = $actualizacionFacade->get();

?>

<!DOCTYPE html>
<html>
<head>

	<title>InstaCrawl</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/media.css">

	<script   src="https://code.jquery.com/jquery-1.9.1.min.js" integrity="sha256-wS9gmOZBqsqWxgIVgA8Y9WcQOa7PgSIX+rPA0VL2rbQ=" crossorigin="anonymous"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

</head>
<body>
	<? include dirname(__FILE__) . '/layout/header.php'; ?>

	<div class="container-fluid">
		<? include dirname(__FILE__) . '/views/' . $controller->_viewFile; ?>
	</div>

	<script type="text/javascript" src="/assets/js/jquery.lazyload.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.timeago.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.timeago.es.js"></script>
	<script type="text/javascript" src="/assets/js/functions.js"></script>
</body>
</html>