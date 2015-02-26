<?php
session_start();
require_once("creds.php");
?>
<!DOCTYPE>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Site Web de la Coupe de Robotique des Ecoles Primaires">
		<meta name="author" content="Club Informatique de PolytechLille">
		<title>Site Web de la Coupe de Robotique des Ecoles Primaires</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/crep.css">
		<link rel="shortcut icon" href="favicon.ico"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/whirlpool.min.js"></script>
		<script type="text/javascript" src="js/crep.js"></script>
		<script type="text/javascript" src="js/base64.js"></script>
	</head>
	<body>
<?php require_once("topnavbar.php");?>
<?php require_once("menu.php");?>
		<div class="col-md-12 center-block">
			<div class="col-md-12" id="mainContainer">
<?php require_once("home.php");?>
			</div>
		</div>
&nbsp;
&nbsp;
<?php require_once("footer.php");?>
	</body>
</html>
