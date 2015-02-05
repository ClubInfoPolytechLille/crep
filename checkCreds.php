<?php
session_start();
require_once("creds.php");

if(!(isset($_GET["user"])&&isset($_GET["pass"])))
	die("Nop");

$link = mysql_connect(__MYSQL_HOSTNAME__, __MYSQL_USERNAME__, __MYSQL_PASSWORD__)
	or die("Nop");

if(!mysql_select_db('crep', $link))
	die('Nop');
mysql_query("SET NAMES 'utf8'");
$requete = 'SELECT pk, admin, realname FROM users WHERE username=\''.$_GET["user"].'\' AND password=\''.$_GET["pass"].'\'';
$resultat = mysql_query($requete);
	
if (!$resultat)
	die("Nop");
	
if($row = mysql_fetch_row($resultat))
{
	echo 'Yep';
	$_SESSION["connected"]=true;
	$_SESSION["pk"]=$row[0];
	$_SESSION["admin"]=$row[1];
	$_SESSION["realname"]=$row[2];
}
else
	echo 'Nop';

	
mysql_close($link);
?>
