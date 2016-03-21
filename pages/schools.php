<?php
    require_once("creds.php");
?>
<h2>Liste écoles participantes</h2>
<?php
$ecoles = array(
    array("nom" => "Condorcet", "adresse" => "Allée Denieppe, Willems", "enseignant" => "Mme Vernier"),
    array("nom" => "Cousteau", "adresse" => "58 Rue de la Fraternité, Marquette", "enseignant" => "Mr Griffon"),
    array("nom" => "Curie Ferry", "adresse" => "41 Rue Chanzy, Saint André", "enseignant" => "Mme Faidherbe"),
    array("nom" => "Curie Ferry", "adresse" => "41 Rue Chanzy, Saint André", "enseignant" => "Mme Pollet"),
    array("nom" => "Jeanne de Flandre", "adresse" => "Jeanne de Flandre, Marquette", "enseignant" => "Mme Dejardin"),
    array("nom" => "Jules Ferry", "adresse" => "241 Rue des Ecoles, Wambrechies", "enseignant" => "Mme Loonis"),
    array("nom" => "Les Peupliers", "adresse" => "23 Avenue des Peupliers, Saint André", "enseignant" => "Mme Lescaillet"),
    array("nom" => "Les Peupliers", "adresse" => "23 Avenue des Peupliers, Saint André", "enseignant" => "Mme Nicolas"),
    array("nom" => "Louise de Bettignies", "adresse" => "102 Avenue de la Liberté, Lambersart", "enseignant" => "Mme Paris"),
    array("nom" => "Marie Curie", "adresse" => "Rue Lannelongue, Hem", "enseignant" => "Mr Guillain"),
    array("nom" => "Petit Prince", "adresse" => "29 Avenue du Général Leclerc, Lys lez Lannois", "enseignant" => "Mme Delcroix"),
    array("nom" => "Samain", "adresse" => "28 Place de la République, Lambersart", "enseignant" => "Mme Vidal")
);
?>

<center>
	<table class="table table-striped table-responsive table-bordered">
		<div class="panel_heading">
			<thead>
				<tr>
					<th>Nom de l'école</th>
					<th>Circonscription</th>
					<th>Adresse</th>
					<th>Enseignant</th>
				</tr>
			</thead>
		</div >
		<tbody>
<?php

    foreach($ecoles as $row) {
        echo '<tr>';
        echo '<td>';
        echo '<p>' . $row['nom'] . '</p>';
        echo '</td>';
        echo '<td>';
        echo '<p>' . $row['adresse'] . '</p>';
        echo '</td>';
        echo '<td>';
        echo '<p>'.$row['enseignant'].'</p>';
        echo '</td>';
        echo '</tr>';
    }
?>

		</tbody>
	</table>
</center>
