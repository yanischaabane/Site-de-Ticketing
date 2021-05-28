<?php
require_once 'Modele/Ticket.php';
require_once 'Modele/Commentaire.php';
require_once 'Framework/Controleur.php';
require_once 'Modele/Statut.php';
class ControleurTicket extends Controleur{
 private $ticket;
 private $commentaire;
 private $statut;
 public function __construct() {
 $this->ticket = new Ticket();
 $this->commentaire = new Commentaire();
 $this->statut = new Statut();
 }
 public function index() {
 $idTicket = $this->requete->getParametre("id");
 $ticket = $this->ticket->getTicket($idTicket);
 $commentaires = $this->commentaire->getCommentaires($idTicket);
 $statut = $this->statut->getStatut();
 $this->genererVue(array('ticket' => $ticket, 'commentaires' => $commentaires,'statut'=>$statut));
 }
 public function commenter() {
    $idTicket = $this->requete->getParametre("id");
    $auteur = $this->requete->getParametre("auteur");
    $contenu = $this->requete->getParametre("contenu");
    $this->commentaire->ajouterCommentaire($auteur,$contenu,$idTicket);
    $this->executerAction("index");
    }
 public function changestatus(){
    $idTicket = $this->requete->getParametre("id");
    $idstatut = $this->requete->getParametre("statut");
    $this->ticket->modifystatut($idTicket,$idstatut);
    $this->executerAction("index");
 }
}
?>