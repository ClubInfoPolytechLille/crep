<?php

echo "<h2> News ";
if(isset($_SESSION["admin"])&&$_SESSION["admin"])
	echo '<span class="label label-primary"><span class="glyphicon glyphicon-plus"></span> Nouvel article</span>';
echo "</h2>";

$link = mysql_connect(__MYSQL_HOSTNAME__, __MYSQL_USERNAME__, __MYSQL_PASSWORD__)
	or die("Impossible de se connecter : " . mysql_error());
	
	
if(!mysql_select_db('crep', $link)){
	echo 'Selection de la base de donnees impossible';
	exit;
}
	
$requete = "select title, content, users.realname as userName from news, users where news.fk_author=users.pk;";
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
	echo '<h3 class="panel-title">'.$row['title'].'</h3>';
	echo '</div>';
	echo '<div class="panel-body">';
	echo '<p>'.$row['content'].'</p>';
	echo '</div>';
	echo '<div class="panel-footer">';
	echo '<p>'.$row['userName'].'</p>';
	echo '</div></div>';
}
	
//On libere l'espace de resultat
mysql_close($link);
?>

