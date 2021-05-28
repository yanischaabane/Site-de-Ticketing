<?php
require_once 'Modele/Ticket.php';
require_once 'Modele/Commentaire.php';
require_once 'Framework/Controleur.php';
require_once 'Modele/Niveau.php';
class ControleurTicket extends Controleur{
 private $ticket;
 private $commentaire;
 private $niveau;
 public function __construct() {
 $this->ticket = new Ticket();
 $this->commentaire = new Commentaire();
 $this->niveau = new Niveau();
 }
 public function index() {
 $idTicket = $this->requete->getParametre("id");
 $ticket = $this->ticket->getTicket($idTicket);
 $commentaires = $this->commentaire->getCommentaires($idTicket);
 $niveau = $this->niveau->getNiveau();
 $this->genererVue(array('ticket' => $ticket, 'commentaires' => $commentaires,'niveau'=>$niveau));
 }
 public function commenter() {
    $idTicket = $this->requete->getParametre("id");
    $auteur = $this->requete->getParametre("auteur");
    $contenu = $this->requete->getParametre("contenu");
    $this->commentaire->ajouterCommentaire($auteur,$contenu,$idTicket);
    $this->executerAction("index");
    }
 public function changeniveau(){
    $idTicket = $this->requete->getParametre("id");
    $idniveau = $this->requete->getParametre("niveau");
    $this->ticket->modifyniveau($idTicket,$idniveau);
    $this->executerAction("index");
 }
}
?>