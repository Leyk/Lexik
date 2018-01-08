<?php
/**
 * Classe 'UtilisateurManager' permettant l'accès aux données de la base.
 */

class UtilisateurManager{
    private $_db;
    
    // Constructeur
    public function __construct($db){
        $this->setDb($db);
    }
    
    
    // Ajoute un utilisateur en base
    public function add(Utilisateur $user){
        $q = $this->_db->prepare('INSERT INTO utilisateur(idGroupe, nomUtilisateur, prenomUtilisateur, mailUtilisateur, dateAnnivUtilisateur) VALUES (:groupeUtilisateur, :nomUtilisateur, :prenomUtilisateur, :mailUtilisateur, :dateAnnivUtilisateur)');
        $req = $this->_db->query('SELECT idGroupe FROM groupe WHERE nomGroupe="'.$user->getGroupeUtilisateur().'"');
        $idGroupe = $req->fetch(PDO::FETCH_ASSOC);
        $q->bindValue(':groupeUtilisateur', $idGroupe['idGroupe']);
        $q->bindValue(':nomUtilisateur', $user->getNomUtilisateur());
        $q->bindValue(':prenomUtilisateur', $user->getPrenomUtilisateur());
        $q->bindValue(':mailUtilisateur', $user->getMailUtilisateur());
        $q->bindValue(':dateAnnivUtilisateur', $user->getDateAnnivUtilisateur());
        $q->execute();
        return $q;
    }
    
    // Supprime un utilisateur de la base
    public function delete(Utilisateur $user){
        $this->_db->exec('DELETE FROM utilisateur WHERE idUtilisateur = '.$user->getIdUtilisateur());
    }
    
    // Récupère un utilisateur précis dans la base, à partir de son id
    public function getUtilisateur($id){
        $id = (int) $id;
        $q = $this->_db->query('SELECT * FROM utilisateur WHERE idUtilisateur ='.$id);
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return new Utilisateur($data);      
    }
    
    // Récupère la liste complète des utilisateurs
    public function getList(){
        $users = [];
        $q = $this->_db->query('SELECT nomGroupe as groupeUtilisateur, idUtilisateur, nomUtilisateur, prenomUtilisateur, mailUtilisateur, dateAnnivUtilisateur FROM utilisateur, groupe WHERE utilisateur.idGroupe = groupe.idGroupe ORDER BY nomGroupe, nomUtilisateur');
        while($data = $q->fetch(PDO::FETCH_ASSOC)){
            $users[] = new Utilisateur($data);
        }
        return $users;       
    }
    
    public function setDb(PDO $db){
        $this->_db = $db;
    }
        
}


?>