<?php 
	require_once("creds.php");
	$link = mysql_connect(__MYSQL_HOSTNAME__, __MYSQL_USERNAME__, __MYSQL_PASSWORD__)
		or die("Impossible de se connecter : " . mysql_error());
	echo 'Connexion reussie';
	
	if(!mysql_select_db('crep', $link)){
		echo 'Selection de la base de donnees impossible';
		exit;
	}
	
	$requete = "select title content user.name as userName from news, user where news.fk_author==user.pk;";
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
	
	//On libere l'espace de resultat.
	mysql_free_result($result);
	mysql_close($link);
?>

