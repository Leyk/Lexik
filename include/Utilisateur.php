<?php
/**
 * Classe 'Utilisateur'
 */


class Utilisateur{
    private $_idUtilisateur;
    private $_groupeUtilisateur;
    private $_nomUtilisateur;
    private $_prenomUtilisateur;
    private $_mailUtilisateur;
    private $_dateAnnivUtilisateur;
   
    
    // Constructeur 
    public function __construct(array $data){
        if(!empty($data)){
            $this->hydrate($data);
        }
    }
    
    public function hydrate(array $data){
        foreach($data as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
    
    // getters
    
    public function getIdUtilisateur(){
        return $this->_idUtilisateur;
    }
    
    public function getNomUtilisateur(){
        return $this->_nomUtilisateur;
    }
    
    public function getPrenomUtilisateur(){
        return $this->_prenomUtilisateur;
    }
    
    public function getMailUtilisateur(){
        return $this->_mailUtilisateur;
    }
    
    public function getDateAnnivUtilisateur(){
        return $this->_dateAnnivUtilisateur;
    }
    
    public function getGroupeUtilisateur(){
        return $this->_groupeUtilisateur;
    }
    
    // setters
    
    public function setIdUtilisateur($id){
        $id = (int) $id;
        if($id > 0){
            $this->_idUtilisateur = $id;
        }
    }
    
    public function setNomUtilisateur($nom){
        if(is_string($nom)){
            $this->_nomUtilisateur = $nom;
        }
    }
    
    public function setPrenomUtilisateur($prenom){
        if(is_string($prenom)){
            $this->_prenomUtilisateur = $prenom;
        }
    }
    
    public function setMailUtilisateur($mail){
        if(is_string($mail)){
            $this->_mailUtilisateur = $mail;
        }
    }
    
    public function setDateAnnivUtilisateur($dateAnniv){
        $this->_dateAnnivUtilisateur = $dateAnniv;
    }
    
    public function setGroupeUtilisateur($groupe){
        $this->_groupeUtilisateur = $groupe;
    }
    
    // autres méthodes
    
    // Calcule l'age d'un utilisateur à partir de sa date de naissance
    public function getAge(){ 
        $date = $this->getDateAnnivUtilisateur();
        $age = date('Y') - date('Y', strtotime($date));
        if (date('md') < date('md', strtotime($date))) {
            return $age - 1;
        }
        return $age; 
    }
}
?>