<nav class="navbar navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">CREP</a> <!-- ajouter un lien pour actualiser + message [Actualiser] ou [Coupe de Robotique des Ecoles Primaires] quand la souris passe -->
    </div>
    <div class="collapse navbar-collapse">
    
    
      <?php
        if ( 0 == 1 ) // modifier le test
        {
          ?>
            <form class="navbar-form navbar-right" role="search">
              <button type="submit" class="btn btn-default">Inscription</button> <!-- ajouter un lien pour s inscrire  -->
              <button type="submit" class="btn btn-default">Connection</button> <!-- ajouter un lien pour se connecter -->
            </form>
          <?php
        }
        else
        {
          if ( 1 == 1 )
          {
            ?>
              <form action="prog.php" method=POST>
                <input type="text" name="identifient" /><br />
                <input type="submit" value="se connecter" />
              </form>
            <?php
          }
          else
          {
            ?>
              <p class="navbar-text navbar-right">Bienvenue, 
                <a href="#identifient" class="navbar-link">test de modification</a> <!-- modifier "NOM DE LA PERSONNE" par celui qui s inscris + ajouter un lien aller au profil ? -->
                <?php
                  //echo $nom ;
                >
              </p>
            <?php
          }
        }
      ?>
      
    </div>
  </div>
</nav>
