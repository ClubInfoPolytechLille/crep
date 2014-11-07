<h2> Organisation </h2>

<?php
# DEBUG
# e_ : est
# r_ : a le droit de
$e_connecte = true;
$r_voir = $e_connecte;
$r_vote = true;
$r_proposer = true;

if ($r_voir) {
	if ($r_vote) {
		if ($r_proposer) {
?>
<h3>Ajouter un évènement</h3>
<form id="nvEv">
	<label for="nom">Nom :</label><br/><input type="text" name="nom"><br/>
	<label for="desc">Description :</label><br/><textarea name="desc"></textarea><br/>
	<h3>Dates proposées</h3>
	<div id="nvEvDates">
		Pas de date proposée pour l'instant.
	</div>
	<form id="nvDate" action="#">
		<h4>Proposer une date</h4>
		<label for="nvDateDate">Date :</label><br/><input type="datetime"name="nvDateDate"/><br/>
		<label for="nvDateDuree">Durée :</label><br/><input type="time"name="nvDateDuree"/><br/>
		<input class="btn btn-default" type="submit" value="Proposer la date">
	</form>
	<input class="btn btn-primary" type="submit" value="Ajouter l'évènement">
</form>
<?php
		}
?>
<h2>Évènements à planifier</h2>
<div class="ev">

</div>
<?php
	}
?>
<h2>Évènements fixés</h2>
<?php
} else {
?>
<p class="bg-danger">
Vous devez vous connecter pour gérer l'organisation des évènements.
</p>
<?php
}

?>
