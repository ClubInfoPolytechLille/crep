<h3> Organisation </h3>

<?php

$time = time();

# e_ : est

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$e_connecte = isset($_SESSION["connected"]) && $_SESSION["connected"];
$e_admin = isset($_SESSION["admin"]) && $_SESSION["admin"];


if ($e_connecte) {
    if ($e_admin) {
        $droits  = array('voir', 'voter', 'ajouter', 'proposer', 'annuler', 'supprimer', 'modifier', 'valider');
    } else {
        $droits = array('voir', 'voter', 'proposer');
    }
} else {
    $droits = array('voir');
}

$lastID = 0; // TODO Est-ce que cela mérite-t-il d'exister ?

class Evenement
{
    // TODO Mettre tout en privé et utiliser __get et __set
    public $id = 0;
    public $creationTime = 0;

    public $nom = "Sans nom";
    public $description = "Sans description";
    public $annule = false;
    public $valide = false;
    public $duree = 3600;
    public $supprime = false;

    public $dates = array();
    public $datesVotes = array();

    function __construct($id = 0) {
        global $lastID;
        if ($id == 0) { // Nouvel évènement
            $lastID += 1;
            $this->id = $lastID;
            $this->creationTime = time();
        } else { // Évènement existant : on charge
            // TODO SQL Select
            $this->id = $lastID + 1; // TODO DEBUG SQL Récupération id
            if ($this->id > $lastID) {
                $lastID = $this->id;
            }
            // TODO SQL Récupération du reste des propriétés
        }
    }

    public function sauvegarder() {
        // TODO SQL
    }

    public function html() {
        $html = '<li id="ev_li_'.$this->id.'" class="ev_li list-group-item';
        if ($this->annule) {
            $html .= ' list-group-item-danger';
        }
        $html .= '">';

        # Titre
        $html .= '<h4 class="list-group-item-heading">'.$this->nom;
        if ($this->p_annuler()) {
            $html .= ' <button type="button" class="ev_annuler btn btn-warning"><span class="glyphicon glyphicon glyphicon-remove"></span> Annuler</button>';
        }
        if ($this->p_supprimer()) {
            $html .= ' <button type="button" class="ev_supprimer btn btn-danger"><span class="glyphicon glyphicon glyphicon-trash"></span> Supprimer</button>';
        }
        $html .= '</h4>';

        # Description
        $html .= '<div class="panel panel-default">';
        $html .= '<div class="panel-heading">';
        $html .= '<h5 class="panel-title">Informations';
        if ($this->p_modifier()) {
            $html .= ' <button type="button" class="ev_modifier btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>';
        }
        $html .= '</h5>';
        $html .= '</div>';
        $html .= '<div class="panel-body">';
        $html .= '<p class="ev_description">';
        $html .= nl2br(htmlspecialchars($this->description));
        $html .= '</p>';
        // $html .= '<hr/>';
        $html .= '<p>';
        $heures = floor($this->duree/3600);
        $minutes = floor($this->duree%3600/60);
        $secondes = floor($this->duree%3600%60);
        $html .= 'Durée : <span class="ev_duree">'.($heures > 0 ? '<span class="ev_duree_h">'.$heures.'</span> heure'.($heures > 1 ? 's' : '').' ' : '').($minutes > 0 ? '<span class="ev_duree_m">'.$minutes.'</span> minute'.($minutes > 1 ? 's' : '').' ' : '').($secondes > 0 ? '<span class="ev_duree_s">'.$secondes.'</span> seconde'.($secondes > 1 ? 's' : '').' ' : '').'</span><br/>';
        if ($this->valide) {
            $html .= 'Date : le <span class="ev_date">'.date('j/m/o', $this->valide).' à '.date('H:i', $this->valide).'</span><br/>';
        }
        $html .= '</p>';
        if ($this->annule) {
            $html .= '<p><span class="label label-danger">Annulé</span></p>';

        }
        $html .= '</div>';
        $html .= '</div>';

        # Dates
        if (!$this->valide && !$this->annule) {
            $html .= '<div class="ev_pos panel panel-default">';
            $html .= '<div class="panel-heading">';
            $html .= '<h5 class="panel-title">Dates possibles';
            if ($this->p_proposer()) {
                $html .= ' <button type="button" class="ev_pos_proposer btn btn-default"><span class="glyphicon glyphicon-plus"></span> Proposer une date</button>';
            }
            $html .= '</h5>';
            $html .= '</div>';
            $html .= '<div class="panel-body">';
            if ($this->p_voter()) {
                $html .= '<p>Sélectionnez les dates qui vous conviennent.</p>';
            }
            $html .= '<div class="list-group">';
            $time = time();
            foreach ($this->dates as $dateIndex => $date) { // TODO À faire fonctionner (après que le reste fonctionne)
                $html .= '<a href="#"class="list-group-item';
                if ($date < $time) {
                    $html .= ' disabled';
                }
                $html .= '">Le <span class="ev_pos_date">'.date('j/m/o', $date).' à '.date('H:i', $date).'</span> (<span class="ev_pos_nb">'.$this->datesVotes[$dateIndex].'</span> <span class="glyphicon glyphicon-user"></span>)</a>';
            }
            $html .= '</div>';
            if ($this->p_valider()) {
                $html .= '<p><button type="button" class="ev_pos_valider btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Valider la date</button></p>';
            }
            $html .= '</div>';
            $html .= '</div>';
        }

        $html .= '</li>';
        return $html;
    }

    public function passe() {
        global $time;
        if ($this->valide) {
            return $this->valide+$this->duree < $time;
        } else {
            return false;
        }
    }

    # p_ : Il est possible de ...
    function p_annuler() {
        global $droits;
        return in_array('annuler', $droits) && !$this->annule && !$this->passe();
    }

    function p_supprimer() {
        global $droits;
        return in_array('supprimer', $droits) && !$this->valide;
    }

    function p_modifier() {
        global $droits;
        return in_array('modifier', $droits);
    }

    function p_voter() {
        global $droits;
        return in_array('voter', $droits) && !$this->valide;
    }

    function p_proposer() {
        global $droits;
        return in_array('proposer', $droits) && !$this->valide;
    }

    function p_valider() {
        global $droits;
        # TODO Et si un nombre suffisant de personnes est ok avec la date la plus disponible 
        return in_array('valider', $droits) && !$this->valide;
    }

}

# a_ : Récupérer depuis la base de donnée (ou pas)
function a_evenements() {
    # DEBUG
    $test1 = new Evenement;
    $test1->duree = 12345;
    $test1->nom = 'Évènement de test n°1';
    $test1->description = 'Description de l\'évènement de test n°1';
    $test1->valide = time();
    
    $test2 = new Evenement;
    $test2->nom = 'Évènement de test n°2';
    $test2->description = 'Description de l\'évènement de test n°2';
    $test2->duree = 36000;
    $test2->valide = time();
    $test2->annule = true;
    
    $test3 = new Evenement;
    $test3->nom = 'Évènement de test n°3';
    $test3->description = 'Description de l\'évènement de test n°3';
    $test3->dates[] = 1415482197;
    $test3->datesVotes[] = 42;
    $test3->dates[] = time();
    $test3->datesVotes[] = 5;
    $test3->dates[] = time()+365*24*3600;
    $test3->datesVotes[] = 1;
    
    $test4 = new Evenement;
    $test4->nom = 'Évènement de test n°4';
    $test4->description = 'Description de l\'évènement de test n°4';
    $test4->dates[] = time();
    $test4->datesVotes[] = 5;
    $test4->dates[] = time()+365*24*3600;
    $test4->datesVotes[] = 1;
    $test4->dates[] = time();
    $test4->annule = true;

    $test5 = new Evenement;
    $test5->nom = 'Évènement de test n°5';
    $test5->description = 'Description de l\'évènement de test n°5';
    $test5->dates[] = time();
    $test5->datesVotes[] = 0;
    $test5->supprime = true;

    $test6 = new Evenement;
    $test6->nom = 'Évènement de test n°6';
    $test6->description = 'Description de l\'évènement de test n°6';
    $test6->valide = 1415452197;

    return array($test1, $test2, $test3, $test4, $test5, $test6);
}

$evenements = a_evenements();

function a_evenement($id) {
    global $evenements;
    foreach ($evenements as $evenement) {
        if ($evenement->id == $id) {
            return $evenement;
        }
    }
}

# TRAITEMENT DES DONNEES POST

function mauvaiseRequete($code = 0) {
    echo '<div class="alert alert-danger" role="alert">Le serveur n\'a pas compris votre requête <small>(code d\'erreur n°'.$code.')</small>.</div>';
}

function bonneRequete($message = 'Action correctement effectuée.') {
    echo '<div class="alert alert-success" role="alert">'.$message.'</div>';
}

if (isset($_POST['action'])) {

    switch ($_POST['action']) {
        case 'modifier':
            if (isset($_POST['id']) && isset($_POST['description']) && isset($_POST['duree'])) {
                if ($evenement = a_evenement($_POST['id'])) {
                    if (($duree = intval($_POST['duree'])) >= 0) {
                        $evenement->description = $_POST['description']; // TODO Protection nécessaire pour SQL
                        $evenement->duree = $duree;
                        bonneRequete('Élement correctement modifié.');
                    } else {
                        mauvaiseRequete(4);
                    }
                } else {
                    mauvaiseRequete(3);
                }
            } else {
                mauvaiseRequete(2);
            }
            break;

        case 'annuler':
            if (isset($_POST['id'])) {
                if ($evenement = a_evenement($_POST['id'])) {
                    $evenement->annule = true;
                    bonneRequete('Évènement annulé.');
                } else {
                    mauvaiseRequete(3);
                }
            } else {
                mauvaiseRequete(2);
            }
            break;

        case 'supprimer':
            if (isset($_POST['id'])) {
                if ($evenement = a_evenement($_POST['id'])) {
                    $evenement->supprime = true;
                    bonneRequete('Évènement supprimé.');
                } else {
                    mauvaiseRequete(3);
                }
            } else {
                mauvaiseRequete(2);
            }
            break;
        
        default:
            mauvaiseRequete(1);
            break;
    }
}


# AFFICHAGE DE LA PAGE

# Tri des évènements
$evenementsPlanifies = array();
$evenementsAPlanifier = array();
$evenementsPasses = array();

foreach ($evenements as $evenement) {
    if (!$evenement->supprime) {
        if ($evenement->valide) {
            if ($evenement->passe()) {
                $evenementsPasses[] = $evenement;
            } else {
                $evenementsPlanifies[] = $evenement;
            }
        } else {
            $evenementsAPlanifier[] = $evenement;
        }
    }
}

# Affichage

if (!$e_connecte) {
?>
<div class="alert alert-warning" role="alert">Connectez-vous afin de pouvoir agir sur les évènements.</div>
<?php    
}
?>
<?php
if (in_array('voir', $droits)) {
?>
<h3>Évènements plannifiés <?php if (in_array('ajouter', $droits)) { ?><button id="ev_ajouter_fixe" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Ajouter un évènement avec une date fixée</button><?php } ?></h3>
<ul id="ev_ul_planifies" class="list-group">
<?php
foreach ($evenementsPlanifies as $evenement) {
    echo $evenement->html();
}
?>
</ul>


<h3>Évènements à plannifier <?php if (in_array('ajouter', $droits)) { ?><button id="ev_ajouter_choix" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Ajouter un évènement avec une date à choisir</button><?php } ?></h3>
<ul id="ev_ul_aplanifier" class="list-group">
<?php
foreach ($evenementsAPlanifier as $evenement) {
    echo $evenement->html();
}
?>
</ul>


<h3>Évènements passés</h3>
<ul id="ev_ul_passes" class="list-group">
<?php
foreach ($evenementsPasses as $evenement) {
    echo $evenement->html();
}
?>
</ul>

<script type="text/javascript" src="js/orga.js"></script>

<?php
} else {
?>
<div class="alert alert-danger" role="alert">Vous ne pouvez pas voir les évènements.</div>
<?php
}
?>