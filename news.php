<form class="form-horizontal" role="form">

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> TEST
        </label>
      </div>
    </div>
  </div>

</form>

<?php 
	require_once("creds.php");
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

