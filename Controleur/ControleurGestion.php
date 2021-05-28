<?php
require_once 'Modele/Niveau.php';
require_once 'Framework/Controleur.php';
class ControleurGestion extends Controleur{
 private $niveau;
 public function __construct() {
 $this->niveau = new Niveau();
 }
 public function index() {
 $niveaux = $this->niveau->getNiveau();
 $this->genererVue(array('niveaux' => $niveaux));
 }
 public function niveauadd(){
    $name = $this->requete->getParametre("name");
    $this->niveau->addniveau($name);
    $this->executerAction("index");
}

public function niveaudelete(){
    $id = $this->requete->getParametre("id");
    $this->niveau->deleteniveau($id);
    $this->executerAction("index");
}

public function niveauupdate(){
    $id = $this->requete->getParametre("id");
    $name = $this->requete->getParametre("name");
    $this->niveau->updateniveau($id,$name);
    $this->executerAction("index");
}

}
?>