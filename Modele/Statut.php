<?php
    require_once 'Framework/Modele.php';
    class Statut extends Modele{
        public function getStatut() {
            $sql = 'select nomniveau as name, idniveau as id'
            . ' from T_NIVEAU WHERE idniveau !=0';
            $statut = $this->executerRequete($sql);
            return $statut;
        }
        public function updatestatut($idstatut,$changestatut){
            $sql = 'update T_NIVEAU set'.
            ' nomniveau = ? where idniveau = ?';
            $this->executerRequete($sql,array($changestatut,$idstatut));
        }
        public function addstatut($namestatut){
            $sql = 'INSERT INTO T_NIVEAU'.
            ' (nomniveau) VALUES(?)';
            $this->executerRequete($sql,array($namestatut));
        }
        public function deletestatut($idstatut){
            $sql = 'DELETE FROM T_NIVEAU'.
            ' WHERE idniveau = ?';
            $this->executerRequete($sql,array($idstatut));
        }
    }
?>