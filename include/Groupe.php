<?php
/**
 * Classe 'Groupe'
 */


class Groupe{
    private $_idGroupe;
    private $_nomGroupe;
    
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
    
    public function getIdGroupe(){
        return $this->_idGroupe;
    }
    
    public function getNomGroupe(){
        return $this->_nomGroupe;
    }
    
    // setters
    
    public function setIdGroupe($id){
        if(is_string($id)){
            $this->_idGroupe = $id;
        }
    }
    
    public function setNomGroupe($nom){
        if(is_string($nom)){
            $this->_nomGroupe = $nom;
        }
    }   
}
?>