<?php
require_once 'Modele/Statut.php';
require_once 'Framework/Controleur.php';
class ControleurGestion extends Controleur{
 private $statut;
 public function __construct() {
 $this->statut = new Statut();
 }
 public function index() {
 $statuts = $this->statut->getStatut();
 $this->genererVue(array('statuts' => $statuts));
 }
 public function statutadd(){
    $name = $this->requete->getParametre("name");
    $this->statut->addstatut($name);
    $this->executerAction("index");
}

public function statutdelete(){
    $id = $this->requete->getParametre("id");
    $this->statut->deletestatut($id);
    $this->executerAction("index");
}

public function statutupdate(){
    $id = $this->requete->getParametre("id");
    $name = $this->requete->getParametre("name");
    $this->statut->updatestatut($id,$name);
    $this->executerAction("index");
}

}
?>