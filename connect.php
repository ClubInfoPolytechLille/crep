<h2> Connexion </h2>
<form class="form-horizontal" role="form" id="connectForm">
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
      <button id="validCreds" type="submit" class="btn btn-primary" onclick="return false;">Se connecter</button>
    </div>
  </div>
</form>

<script type="text/javascript">
// Affiche le mot de passe 
$("#afficherMotDePasse")[0].addEventListener('mousedown', function()
{
	$('#entrer_mot_de_passe_3')[0].type = 'text';
});
$('#afficherMotDePasse')[0].addEventListener('mouseup', function()
{
	$('#entrer_mot_de_passe_3')[0].type = 'password';
});
$('#connectForm')[0].submit(function(event)
{
	$("#validCreds")[0].disabled=true;
	var checkPath = "checkCreds.php?user=";
	checkPath += $("#Entrer_Identifiant_3")[0].value;
	checkPath += "&pass=";
	checkPath += Whirlpool($("#entrer_mot_de_passe_3")[0].value);
	if(file(checkPath)=="Yep")
		document.location.replace("");
	else
		alert("Mauvais identifiants");
	$("#validCreds")[0].disabled=false;
	event.preventDefault();
});
</script>
