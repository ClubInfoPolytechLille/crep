<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      
      <!-- <a class="thumbnail" onClick="document.location.reload();" href="#">
        <img data-src="logo-895x1030.jpg/895x1030" alt="...">
      </a> -->
      
      <a class="navbar-brand" onClick="document.location.reload();" data-toggle="tooltip" data-placement="bottom" title="Afficher la page d'accueil" href="#">Coupe de Robotique des Ecoles Primaires</a>
    </div>
    <div class="collapse navbar-collapse">
      <?php
        if (isset($_SESSION["connected"]) && $_SESSION["connected"])
		echo '<p class="navbar-text navbar-right">Bienvenue, <a href="#identifiant" class="navbar-link">'.$_SESSION["name"].'</a></p>';
	else
		echo '<p class="navbar-text navbar-right"><a href="#identifiant" class="navbar-link" onClick="loadNewDoc(\'connect.php\');">Se connecter</a></p>';
      ?>
    </div>
  </div>
</nav>
