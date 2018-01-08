<?php
/**
 * Classe 'GroupeManager' permettant l'acc�s aux donn�es de la base.
 */

class GroupeManager{
    private $_db;
    
    // Constructeur
    public function __construct($db){
        $this->setDb($db);
    }
    
    // R�cup�re la liste compl�te des groupes en base
    public function getList(){
        $groups = [];
        $q = $this->_db->query('SELECT * FROM groupe');
        while($data = $q->fetch(PDO::FETCH_ASSOC)){
            $groups[] = new Groupe($data);
        }
        return $groups;   
    }
    
    // R�cup�re un groupe pr�cis � partir de son id
    public function getGroupe($id){
        $q = $this->_db->query('SELECT * FROM groupe WHERE idGroupe ="'.$id.'"');
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return new Groupe($data);
    }
    
    public function setDb(PDO $db){
        $this->_db = $db;
    }
    
}


?>