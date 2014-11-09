<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      
      <!-- <a class="thumbnail" onClick="document.location.reload();" href="#">
        <img data-src="logo-895x1030.jpg/895x1030" alt="...">                           je n'arriva pas a mettre le logo 2013-2014 :'(
      </a> -->
      
      <a class="navbar-brand" onClick="document.location.reload();" data-toggle="tooltip" data-placement="bottom" title="Aller à la page d'accueil" href="#">Coupe de Robotique des Ecoles Primaires</a>
    </div>
    <div class="collapse navbar-collapse">
      <?php
		if (isset($_SESSION["connected"]) && $_SESSION["connected"])
?>
		<p class="navbar-text navbar-right">
			Bienvenue, <a href="#" class="navbar-link"><?php echo $_SESSION["realname"];?>.'</a>
		</p>
		<p class="navbar-right">
			<a href="#" onclick="file('logout.php');document.location.reload();" class="glyphicon glyphicon-star"></a>
		</p>
<?php
	else
		echo '<p class="navbar-text navbar-right"><a href="#" class="navbar-link" onClick="loadNewDoc(\'connect.php\');">Se connecter</a></p>';
      ?>
    </div>
  </div>
</nav>
