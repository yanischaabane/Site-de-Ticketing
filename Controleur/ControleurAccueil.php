<?php
require_once 'Modele/Ticket.php';
require_once 'Framework/Controleur.php';
class ControleurAccueil extends Controleur{
 private $ticket;
 public function __construct() {
 $this->ticket = new Ticket();
 }
 public function index() {
 $tickets = $this->ticket->getTickets();
 $this->genererVue(array('tickets' => $tickets));
 }
 public function ticketadd(){
   $titre = $this->requete->getParametre("titre");
   $contenu = $this->requete->getParametre("contenu");
   $this->ticket->ajouterticket($titre,$contenu);
   $this->executerAction("index");
 }
}
?>