<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" onClick="document.location.reload();" href="#">CREP</a> <!-- ajouter message [Coupe de Robotique des Ecoles Primaires] quand la souris passe -->
    </div>
    <div class="collapse navbar-collapse">
    
    
      <?php
        if ( 0 == 1 ) // modifier le test par un switch
        {
          ?>
            <form class="navbar-form navbar-right" role="search">
              <input type="submit" value="Inscription" name="lien_Inscription" /><br /> <!-- ajouter un lien pour s inscrire  -->
              <input type="submit" value="Connection" name="lien_Connection" /><br /> <!-- ajouter un lien pour se connecter -->
            </form>
          <?php
        }
        else
        {
          if ( 1 == 1 )
          {
            ?>
              <form class="navbar-form navbar-right" action="prog.php" method=POST>
                <input type="text" placeholder="identifient" name="lien_identifient" /><br />
                <input type="text" placeholder="mot de passe" name="lien_mot_de_passe" /><br /> <!-- mettre des ***** quand on entre le mot de passe  -->
                <input type="submit" value="se connecter" />
              </form>
            <?php
          }
          else
          {
            ?>
              <p class="navbar-text navbar-right">Bienvenue, 
                <a href="#identifient" class="navbar-link">NOM DE LA PERSONNE</a> <!-- modifier "NOM DE LA PERSONNE" par celui qui s inscris + ajouter un lien aller au profil ? -->
                <?php
                  //echo $nom ;
                ?>
              </p>
            <?php
          }
        }
      ?>
      
    </div>
  </div>
</nav>
