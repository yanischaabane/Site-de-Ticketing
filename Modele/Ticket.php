<?php
require_once 'Framework/Modele.php';
class Ticket extends Modele {
 // Renvoie la liste des tickets du blog
 public function getTickets() {
 $sql = 'select TIC_ID as id, TIC_DATE as date,'
 .' TIC_TITRE as titre, TIC_CONTENU as contenu, nomniveau as niveau'
 .' from T_TICKET inner join T_NIVEAU on T_NIVEAU.idniveau = T_TICKET.TIC_NIVEAU'
 .' order by TIC_ID desc';
 $tickets = $this->executerRequete($sql);
 return $tickets;
 }
 // Renvoie les informations sur un ticket
 public function getTicket($idTicket) {
 $sql = 'select TIC_ID as id, TIC_DATE as date,'
 .' TIC_TITRE as titre, TIC_CONTENU as contenu, nomniveau as niveau'
 .' from T_TICKET inner join T_NIVEAU on T_NIVEAU.idniveau = T_TICKET.TIC_NIVEAU'
 .' where TIC_ID=?';
 $ticket = $this->executerRequete($sql, array($idTicket));
 if ($ticket->rowCount() > 0)
    return $ticket->fetch(); // Accès à la première ligne de résultat
 else
    throw new Exception("Aucun ticket ne correspond à l'identifiant '$idTicket'");
 }
 public function modifyniveau($idTicket,$niveau){
   $sql = 'update T_TICKET set'.
   ' TIC_NIVEAU = ? where TIC_ID = ?';
   $this->executerRequete($sql,array($niveau,$idTicket));
}
 public function ajouterticket($titre,$contenu){
   $sql = 'insert into T_TICKET'.
   '(TIC_DATE,TIC_TITRE,TIC_CONTENU,TIC_NIVEAU)'. 
   'values(?,?,?,1)';
   $date = date('Y-m-d H:i:s');
   $this->executerRequete($sql, array($date, $titre, $contenu));
 }
}
?>