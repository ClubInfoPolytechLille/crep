<h2>Liste écoles participantes</h2>
<?php
require_once ("creds.php");

try {
    
    $link = @mysql_connect(__MYSQL_HOSTNAME__, __MYSQL_USERNAME__, __MYSQL_PASSWORD__);

    if (!$link) {
    	throw new Exception('Impossible de se connecter : ' . mysql_error());
    }
    
    if (!mysql_select_db('crep', $link)) {
        throw new Exception('Selection de la base de donnees impossible');
    }
    mysql_query("SET NAMES 'utf8'");
    $requete = "SELECT DISTINCT `nom`, `circonscription`, `adresse`, `enseignant` FROM `school` ORDER BY nom ASC";

    $resultat = mysql_query($requete);

    if (!$resultat) {
    	throw new Exception('Résultat vide.');
    }

    mysql_close($link);
?>

<center>
	<table class="table table-striped table-responsive table-bordered">
		<div class="panel_heading">
			<thead>
				<tr> 
					<th>Nom de l'école</th>
					<th>Circonscription</th>
					<th>Adresse</th>
<?php /*
					<th>Enseignant</th>
*/ ?>
				</tr>
			</thead>
		</div >
		<tbody>
<?php
    
    while ($row = mysql_fetch_assoc($resultat)) {
        echo '<tr>';
        echo '<td>';
        echo '<p>' . $row['nom'] . '</p>';
        echo '</td>';
        echo '<td>';
        echo '<p>' . $row['circonscription'] . '</p>';
        echo '</td>';
        echo '<td>';
        echo '<p>' . $row['adresse'] . '</p>';
        echo '</td>';
        
        // echo '<td>';
        // echo '<p>'.$row['enseignant'].'</p>';
        // echo '</td>';
        echo '</tr>';
    }
?>

		</tbody>
	</table>
</center>
<?php
}
catch(Exception $e) {
?>
<div class="alert alert-danger" role="alert">
Impossible d'afficher la liste des écoles participantes.<br/>
Merci de rééssayer ultérieurement.
</div>
<!--
<?php
echo $e;
?>
-->
<?php
}
?>
