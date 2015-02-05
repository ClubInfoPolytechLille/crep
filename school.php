<?php
require_once("creds.php");
?>
<h2>Liste écoles participantes</h2>

<center>
	<table class="table table-striped table-responsive table-bordered">
		<div class="panel_heading">
			<thead>
				<tr> 
					<th>Nom de l'école</th>
					<th>Circonscription</th>
					<th>Contact</th>
					<th>Enseignant</th>
				</tr>
			</thead>
		</div >
		<tbody>
<?php
$link = mysql_connect(__MYSQL_HOSTNAME__, __MYSQL_USERNAME__, __MYSQL_PASSWORD__)
	or die("Impossible de se connecter : " . mysql_error());

if(!mysql_select_db('crep', $link))
{
	echo 'Selection de la base de donnees impossible';
	exit;
}

$requete = "SELECT DISTINCT `nom`, `circonscription`, `adresse`, `enseignant` FROM `school` ORDER BY nom ASC";
$resultat = mysql_query($requete);

while ($row = mysql_fetch_assoc($resultat))
{
	echo '<tr>';
	echo '<td>';
	echo '<p>'.$row['nom'].'</p>';
	echo '</td>';
	echo '<td>';
	echo '<p>'.$row['circonscription'].'</p>';
	echo '</td>';
	echo '<td>';
	echo '<p>'.$row['addresse'].'</p>';
	echo '</td>';
	echo '<td>';
	echo '<p>'.$row['enseignant'].'</p>';
	echo '</td>';
	echo '</tr>';
}

mysql_close($link);
?>
		</tbody>
	</table>
</center>
