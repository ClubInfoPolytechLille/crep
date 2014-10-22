<nav class="navbar navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">CREP</a> <!-- lien pour actualiser + message quand la souris passe desous -->
    </div>
    <div class="collapse navbar-collapse">
    
    <!-- modifier le test -->
      <?php
        if ( 0 == 1 ) 
          {
            ?>
              <form class="navbar-form navbar-right" role="search">
                <button type="submit" class="btn btn-default">Inscription</button> <!-- lien pour s inscrire  -->
                <button type="submit" class="btn btn-default">Connection</button> <!-- lien pour se connecter -->
              </form>
            <?php
          }
        else
          {
            ?>
              <p class="navbar-text navbar-right">Bienvenue, 
                <a href="#" class="navbar-link">NOM DE LA PERSONNE</a> <!-- aller au profil ? -->
              </p>
            <?php
          }
      ?>
      
    </div>
  </div>
</nav>
