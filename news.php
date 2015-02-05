<?php
require_once("creds.php");

echo "<h2> News ";
if(isset($_SESSION["admin"])&&$_SESSION["admin"])
	echo '<h3><button type="button" class="btn btn-primary" onClick="addNews();"><span class="glyphicon glyphicon-plus"></span> Nouvel article</button></h3>';
echo "</h2>";

$link = mysql_connect(__MYSQL_HOSTNAME__, __MYSQL_USERNAME__, __MYSQL_PASSWORD__)
	or die("Impossible de se connecter : " . mysql_error());
	
	
if(!mysql_select_db('crep', $link)){
	echo 'Selection de la base de donnees impossible';
	exit;
}
	
$requete = "select news.pk as pk, DATE_FORMAT(created,'%e-%m-%Y') AS created, title, content, users.realname as userName from news, users where news.fk_author=users.pk;";
$resultat = mysql_query($requete);
	
//Pour debugger
if (!$resultat) {
	$message  = 'Requete invalide : ' . mysql_error() . "\n";
	$message .= 'Requete complete : ' . $query;
	die($message);
}
	
while ($row = mysql_fetch_assoc($resultat)) {
	echo '<div class="panel panel-default">';
	echo '<div class="panel-heading">';
	echo '<h3 class="panel-title">'.$row['title'];
	if(isset($_SESSION["admin"])&&$_SESSION["admin"])
		echo ' <a href="#" onclick="editNews('.$row["pk"].')" class="glyphicon glyphicon-pencil"></a>';
	echo '</h3>';
	echo '</div>';
	echo '<div class="panel-body">';
	echo '<p>'.$row['content'].'</p>';
	echo '</div>';
	echo '<div class="panel-footer">';
	echo '<p>'.$row['userName'].', le '.$row['created'].'</p>';
	echo '</div></div>';
}
	
//On libere l'espace de resultat
mysql_close($link);
?>

