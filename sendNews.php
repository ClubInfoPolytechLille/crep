<?php
require_once("creds.php");

$link = mysql_connect(__MYSQL_HOSTNAME__, __MYSQL_USERNAME__, __MYSQL_PASSWORD__)
	or die("Impossible de se connecter : " . mysql_error());
if(!mysql_select_db('crep', $link))
{
	echo 'Selection de la base de donnees impossible';
	exit;
}
$requete = "INSERT INTO  `crep`.`news` (`pk` ,`fk_author` ,`created` ,`title` ,`content`) VALUES (NULL ,  '2',  CURDATE(), ".base64_decode($_POST["title"]).", ".base64_decode($_POST["content"]).")";
$resultat = mysql_query($requete);
