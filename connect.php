<h2> Connexion </h2>

<form class="form-horizontal" role="form">
  
  <div class="form-group">
    <label for="entrer_Identifiant_3" class="col-sm-2 control-label">Identifiant</label>
    <div class="col-sm-10">
      <input type="identifiant" class="form-control" id="Entrer_Identifiant_3" placeholder="Votre identifiant">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label" for="entrer_mot_de_passe_3">Mot de passe</label>
    <div class="col-sm-10">
      <div class="input-group">
        <input type="password" class="form-control" id="entrer_mot_de_passe_3" placeholder="Votre mot de passe">
        <span class="input-group-btn">
          <button id="afficherMotDePasse" type="button" class="btn btn-default"><span class="glyphicon glyphicon glyphicon-eye-open"></span> Afficher</button>
        </span>
      </div>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox">Rester connecté
        </label>
      </div>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Se connecter</button> <!-- Il faut ajouter le lien d'identification  -->
    </div>
  </div>
  
</form>

<script type="text/javascript">
  // Affiche le mot de passe 
  document.getElementById('afficherMotDePasse').addEventListener('mousedown', function() {document.getElementById('entrer_mot_de_passe_3').type = 'text'})
  document.addEventListener('mouseup', function() {document.getElementById('entrer_mot_de_passe_3').type = 'password'})
</script>
