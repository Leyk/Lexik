<?php
/**
 * Classe 'GroupeManager' permettant l'accès aux données de la base.
 */

class GroupeManager{
    private $_db;
    
    // Constructeur
    public function __construct($db){
        $this->setDb($db);
    }
    
    // Récupère la liste complète des groupes en base
    public function getList(){
        $groups = [];
        $q = $this->_db->query('SELECT * FROM groupe');
        while($data = $q->fetch(PDO::FETCH_ASSOC)){
            $groups[] = new Groupe($data);
        }
        return $groups;   
    }
    
    // Récupère un groupe précis à partir de son id
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