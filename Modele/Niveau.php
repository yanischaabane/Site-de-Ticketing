<?php
    require_once 'Framework/Modele.php';
    class Niveau extends Modele{
        public function getNiveau() {
            $sql = 'select nomniveau as name, idniveau as id'
            . ' from T_NIVEAU WHERE idniveau !=0';
            $niveau = $this->executerRequete($sql);
            return $niveau;
        }
        public function updateniveau($idniveau,$changeniveau){
            $sql = 'update T_NIVEAU set'.
            ' nomniveau = ? where idniveau = ?';
            $this->executerRequete($sql,array($changeniveau,$idniveau));
        }
        public function addniveau($nameniveau){
            $sql = 'INSERT INTO T_NIVEAU'.
            ' (nomniveau) VALUES(?)';
            $this->executerRequete($sql,array($nameniveau));
        }
        public function deleteniveau($idniveau){
            $sql = 'DELETE FROM T_NIVEAU'.
            ' WHERE idniveau = ?';
            $this->executerRequete($sql,array($idniveau));
        }
    }
?>