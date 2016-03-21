<?php
    require_once("creds.php");
?>
<h2>Liste écoles participantes</h2>
<?php
$ecoles = array(
    array("nom" => "Condorcet", "circonscription" => "Roubaix", "adresse" => "Allée Denieppe, Willems", "enseignant" => "Mme Vernier"),
    array("nom" => "Cousteau", "circonscription" => "Lambersart", "adresse" => "58 Rue de la Fraternité, Marquette", "enseignant" => "Mr Griffon"),
    array("nom" => "Curie Ferry", "circonscription" => "Lambersart", "adresse" => "41 Rue Chanzy, Saint André", "enseignant" => "Mme Faidherbe"),
    array("nom" => "Curie Ferry", "circonscription" => "Lambersart", "adresse" => "41 Rue Chanzy, Saint André", "enseignant" => "Mme Pollet"),
    array("nom" => "Jeanne de Flandre", "circonscription" => "Lambersart", "adresse" => "Jeanne de Flandre, Marquette", "enseignant" => "Mme Dejardin"),
    array("nom" => "Jules Ferry", "circonscription" => "Lambersart", "adresse" => "241 Rue des Ecoles, Wambrechies", "enseignant" => "Mme Loonis"),
    array("nom" => "Les Peupliers", "circonscription" => "Lambersart", "adresse" => "23 Avenue des Peupliers, Saint André", "enseignant" => "Mme Lescaillet"),
    array("nom" => "Les Peupliers", "circonscription" => "Lambersart", "adresse" => "23 Avenue des Peupliers, Saint André", "enseignant" => "Mme Nicolas"),
    array("nom" => "Louise de Bettignies", "circonscription" => "Lambersart", "adresse" => "102 Avenue de la Liberté, Lambersart", "enseignant" => "Mme Paris"),
    array("nom" => "Marie Curie", "circonscription" => "Roubaix", "adresse" => "Rue Lannelongue, Hem", "enseignant" => "Mr Guillain"),
    array("nom" => "Petit Prince", "circonscription" => "Roubaix", "adresse" => "29 Avenue du Général Leclerc, Lys lez Lannois", "enseignant" => "Mme Delcroix"),
    array("nom" => "Samain", "circonscription" => "Lambersart", "adresse" => "28 Place de la République, Lambersart", "enseignant" => "Mme Vidal")
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
        echo '<p>' . $row['circonscription'] . '</p>';
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
