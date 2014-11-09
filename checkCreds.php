<?php
require_once("creds.php");

if(!(isset($_GET["user"])&&isset($_GET["pass"])))
	die("Nop");

$link = mysql_connect(__MYSQL_HOSTNAME__, __MYSQL_USERNAME__, __MYSQL_PASSWORD__)
	or die("Nop");

if(!mysql_select_db('crep', $link))
	die('Nop');

$requete = 'SELECT pk, admin FROM users WHERE username=\''.$_GET["user"].'\' AND password=\''.$_GET["password"].'\'';
$resultat = mysql_query($requete);
	
if (!$resultat)
	die("Nop");
	
if($row = mysql_fetch_assoc($resultat))
	echo 'Yep';
else
	echo 'Nop';

	
mysql_close($link);
?>
