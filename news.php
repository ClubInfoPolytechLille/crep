<div class="jumbotron">
<?php 
	$link = mysql_connect(__MYSQL_HOSTNAME__, __MYSQL_USERNAME__, __MYSQL_PASSWORD__)
		or die("Impossible de se connecter : " . mysql_error());
	echo 'Connexion réussie';
	
	$requete="";
	$resultat = mysql_query($requete);
	
	//Pour debugger
	if (!$resultat) {
		$message  = 'Requête invalide : ' . mysql_error() . "\n";
		$message .= 'Requête complète : ' . $query;
		die($message);
	}
	
	while ($row = mysql_fetch_assoc($resultat)) {
		//On execute les traitements lié a la requete.
	}
	
	//On libere l'espace de resultat.
	mysql_free_result($result);
	mysql_close($link);
?>
</div>
