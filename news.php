<div class="jumbotron">
<?php 
        require_once("creds.php");
	$link = mysql_connect(MYSQL_HOSTNAME, MYSQL_USER, MYSQL_PASSWORD)
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
