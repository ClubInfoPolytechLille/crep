<h3> Organisation </h3>

<?php

$time = time();

# DEBUG
# e_ : est
$e_connecte = true;
$e_modo = true;

if ($e_connecte) {
    if ($e_modo) {
        $droits  = array('voir', 'voter', 'ajouter', 'proposer', 'annuler', 'supprimer', 'modifier', 'valider');
    } else {
        $droits = array('voir', 'voter');
    }
} else {
    $droits = array('voir');
}


class Evenement
{
    private $id = 0;
    private $creationTime = 0;

    public $nom = "Sans nom";
    public $description = "Sans description";
    public $annule = false;
    public $valide = false;
    public $duree = 3600;
    public $supprime = false;

    public $dates = array();
    public $datesVotes = array();

    public function html() {
        $html = '<li class="list-group-item';
        if ($this->annule) {
            $html .= ' list-group-item-danger';
        }
        $html .= '">';

        # Titre
        $html .= '<h4 class="list-group-item-heading">'.$this->nom;
        if ($this->p_annuler()) {
            $html .= ' <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon glyphicon-remove"></span> Annuler</button>';
        }
        if ($this->p_supprimer()) {
            $html .= ' <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-trash"></span> Supprimer</button>';
        }
        $html .= '</h4>';

        # Description
        $html .= '<div class="panel panel-default">';
        $html .= '<div class="panel-heading">';
        $html .= '<h5 class="panel-title">Informations';
        if ($this->p_modifier()) {
            $html .= ' <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>';
        }
        $html .= '</h5>';
        $html .= '</div>';
        $html .= '<div class="panel-body">';
        $html .= '<p>';
        $html .= nl2br(htmlspecialchars($this->description));
        $html .= '</p>';
        // $html .= '<hr/>';
        $html .= '<p>';
        $heures = floor($this->duree/3600);
        $minutes = floor($this->duree%3600/60);
        $secondes = floor($this->duree%3600%60);
        $html .= 'Durée : '.($heures > 0 ? $heures.' heure'.($heures > 1 ? 's' : '').' ' : '').($minutes > 0 ? $minutes.' minute'.($minutes > 1 ? 's' : '').' ' : '').($secondes > 0 ? $secondes.' seconde'.($secondes > 1 ? 's' : '').' ' : '').'<br/>';
        if ($this->valide) {
            $html .= 'Date : le '.date('j/m/o', $this->valide).' à '.date('H:i', $this->valide).'<br/>';
        }
        $html .= '</p>';
        if ($this->annule) {
            $html .= '<p><span class="label label-danger">Annulé</span></p>';

        }
        $html .= '</div>';
        $html .= '</div>';

        # Dates
        if (!$this->valide && !$this->annule) {
            $html .= '<div class="panel panel-default">';
            $html .= '<div class="panel-heading">';
            $html .= '<h5 class="panel-title">Dates possibles';
            if ($this->p_proposer()) {
                $html .= ' <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Proposer une date</button>';
            }
            $html .= '</h5>';
            $html .= '</div>';
            $html .= '<div class="panel-body">';
            if ($this->p_voter()) {
                $html .= '<p>Sélectionnez les dates qui vous conviennent.</p>';
            }
            $html .= '<div class="list-group">';
            $time = time();
            foreach ($this->dates as $dateIndex => $date) {
                $html .= '<a href="#"class="list-group-item';
                if ($date < $time) {
                    $html .= ' disabled';
                }
                $html .= '">Le '.date('j/m/o', $date).' à '.date('H:i', $date).' ('.$this->datesVotes[$dateIndex].' <span class="glyphicon glyphicon-user"></span>)</a>';
            }
            $html .= '</div>';
            if ($this->p_valider()) {
                $html .= '<p><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Valider la date</button></p>';
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

# a_ : Récupérer depuis la base de donnée
function a_evenement() {
    # DEBUG
    $test1 = new Evenement;
    $test1->nom = 'Évènement de test n°1';
    $test1->valide = time();
    
    $test2 = new Evenement;
    $test2->nom = 'Évènement de test n°2';
    $test2->valide = time();
    $test2->annule = true;
    
    $test3 = new Evenement;
    $test3->nom = 'Évènement de test n°3';
    $test3->dates[] = 1415482197;
    $test3->datesVotes[] = 42;
    $test3->dates[] = time();
    $test3->datesVotes[] = 5;
    $test3->dates[] = time()+365*24*3600;
    $test3->datesVotes[] = 1;
    
    $test4 = new Evenement;
    $test4->nom = 'Évènement de test n°4';
    $test4->dates[] = time();
    $test4->datesVotes[] = 5;
    $test4->dates[] = time()+365*24*3600;
    $test4->datesVotes[] = 1;
    $test4->dates[] = time();
    $test4->annule = true;

    $test5 = new Evenement;
    $test5->nom = 'Évènement de test n°5';
    $test5->dates[] = time();
    $test5->datesVotes[] = 0;
    $test5->supprime = true;

    $test6 = new Evenement;
    $test6->nom = 'Évènement de test n°6';
    $test6->valide = 1415452197;

    return array($test1, $test2, $test3, $test4, $test5, $test6);
}

# Tri des évènements
$evenements = a_evenement();
$evenementsPlanifies = array();
$evenementsAPlanifier = array();
$evenementsPasses = array();

$time = time();

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

?>

<?php
if (!$e_connecte) {
?>
<div class="alert alert-warning" role="alert">Connectez-vous afin de pouvoir agir sur les évènements.</div>
<?php    
}
?>
<?php
if (in_array('voir', $droits)) {
?>
<h3>Évènements plannifiés <?php if (in_array('ajouter', $droits)) { ?><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Ajouter un évènement avec une date fixée</button><?php } ?></h3>
<ul class="list-group">
<?php
foreach ($evenementsPlanifies as $evenement) {
    echo $evenement->html();
}
?>
</ul>


<h3>Évènements à plannifier <?php if (in_array('ajouter', $droits)) { ?><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Ajouter un évènement avec une date à choisir</button><?php } ?></h3>
<ul class="list-group">
<?php
foreach ($evenementsAPlanifier as $evenement) {
    echo $evenement->html();
}
?>
</ul>


<h3>Évènements passés</h3>
<ul class="list-group">
<?php
foreach ($evenementsPasses as $evenement) {
    echo $evenement->html();
}
?>
</ul>

<?php
} else {
?>
<div class="alert alert-danger" role="alert">Vous ne pouvez pas voir les évènements.</div>
<?php
}
?>