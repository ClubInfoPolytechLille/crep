<?php
session_start();
require_once("creds.php");

$url = $_SERVER["REQUEST_URI"];
$parsedUrl = parse_url($url);
$path = $parsedUrl['path'];
$explodedUrl = explode('/', $path);
$page = end($explodedUrl);

if ($page == '') {
	$page = 'home';
}

$toLoad = "pages/$page.php";

// TODO Test if exists, 404 otherwise

if (isset($_GET['c'])) {
	require_once("$toLoad");
} else {
?>
<!DOCTYPE>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Site Web de la Coupe de Robotique des Ecoles Primaires">
		<meta name="author" content="Club Informatique de PolytechLille">
		<title>Coupe de Robotique des Ecoles Primaires</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/crep.css">
		<link rel="shortcut icon" href="favicon.ico"/>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
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
<?php
	require_once("$toLoad");
?>
			</div>
		</div>
&nbsp;
&nbsp;
<?php require_once("footer.php");?>
	</body>
</html>

<?php
}
?>