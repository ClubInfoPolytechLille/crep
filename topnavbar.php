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
            ?>
              <p class="navbar-text navbar-right">Bienvenue, 
                <a href="#" class="navbar-link">NOM DE LA PERSONNE</a> <!-- ajouter un lien aller au profil ? -->
              </p>
            <?php
          }
      ?>
      
    </div>
  </div>
</nav>
