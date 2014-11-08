<h2> Organisation </h2>

<?php
# DEBUG
# e_ : est
# r_ : a le droit de

$e_connecte = false;
$e_modo = true;

$droits  = array('voir', 'voter', 'ajouter', 'proposer', 'annuler', 'supprimer', 'modifier', 'valider');

class Evenement
{
    public $id = 0;
    public $nom = "Sans nom";
    public $description = "Sans description";
    public $annule = false;
    public $valide = false;
    public $duree = 120;

    public $dates = array();

    public function html() {
        global $droits;

        $html = '   <li class="list-group-item">';

        # Titre
        $html .= '<h3 class="list-group-item-heading">'.$this->nom;
        if ($this->annule) {
            $html .= ' <span class="label label-danger">Annulé</span>';
        }
        if (in_array('annuler', $droits) && !$this->annule) { # TODO
            $html .= ' <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-remove"></span></button>';
        }
        if (in_array('supprimer', $droits) && !$this->valide) { # TODO
            $html .= ' <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-trash"></span></button>';
        }
        $html .= '</h3>';

        # Description
        $html .= '<div class="panel panel-default">';
        $html .= '<div class="panel-heading">';
        $html .= '<h4 class="panel-title">Description';
        if (in_array('modifier', $droits)) {
            $html .= ' <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>';
        }
        $html .= '</h4>';
        $html .= '</div>';
        $html .= '<div class="panel-body">';
        $html .= '<p>';
        $html .= nl2br(htmlspecialchars($this->description));
        $html .= '</p>';
        // $html .= '<hr/>';
        $html .= '<p>';
        $html .= 'Durée : '.$this->duree.' minutes <br/>';
        if ($this->valide) {
            $html .= 'Date : '.date('c', $this->valide).'<br/>';
        }
        $html .= '</p>';
        if ($this->annule) {
            $html .= '<p class="alert alert-danger" role="alert">Annulé</p>';

        }
        $html .= '</div>';
        $html .= '</div>';

        # Dates
        if (!$this->valide && !$this->annule) {
            $html .= '<div class="panel panel-default">';
            $html .= '<div class="panel-heading">';
            $html .= '<h4 class="panel-title">Dates possibles';
            if (in_array('proposer', $droits)) {
                $html .= '<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></button>';
            }
            $html .= '</h4>';
            $html .= '</div>';
            $html .= '<div class="panel-body">';
            $html .= '<ul class="list-group">';
            foreach ($this->dates as $dateIndex => $date) {
                $html .= '<li class="list-group-item">'.date('c', $date).' (6 <span class="glyphicon glyphicon-user"></span>)</li>';
            }
            $html .= '</ul>';
            if (in_array('valider', $droits) && !$this->valide) {
                $html .= '<p><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Valider la date</button></p>';
            }
            $html .= '</div>';
            $html .= '</div>';
        }

        $html .= '</li>';
        return $html;
    }
}

?>

<h1>Évènements</h1>

<h2>Plannifiés <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></button></h2>
<ul class="list-group">
<?
$test1 = new Evenement;
$test1->dates[] = time();
$test1->valide = time();
echo $test1->html()
?>
<?
$test2 = new Evenement;
$test2->dates[] = time();
$test2->valide = time();
$test2->annule = true;
echo $test2->html()
?>
</ul>


<h2>À plannifier <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></button></h2>
<ul class="list-group">
<?
$test3 = new Evenement;
$test3->dates[] = time();
echo $test3->html()
?>
<?
$test4 = new Evenement;
$test4->dates[] = time();
$test4->annule = true;
echo $test4->html()
?>
</ul>


<h2>Évènements passés</h2>
<ul class="list-group">
</ul>