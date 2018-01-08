<?php
/**
 * Classe d'accès aux données
 */


class PdoLxk{
    private static $serveur='mysql:host=127.0.0.1';
    private static $bd='dbname=Lexik';
    private static $user='root';
    private static $mdp='';
    private static $monPdo;
    private static $monPdoLxk=null;
    
    private function __construct(){
        try{
            PdoLxk::$monPdo = new PDO(PdoLxk::$serveur.';'.PdoLxk::$bd, PdoLxk::$user, PdoLxk::$mdp);
            PdoLxk::$monPdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            PdoLxk::$monPdo->query("SET CHARACTER SET utf8");
        }
        catch (PDOException $e){
            echo "Erreur de connexion au serveur : ", $e->getMessage();
        }
    }
    
    public function _destruct(){
        PdoLxk::$monPdo = null ;
    }
    
    // Crée l'unique instance de la classe 
    public static function getPdoLxk(){
        if(PdoLxk::$monPdoLxk==null){
            PdoLxk::$monPdoLxk = new PdoLxk();
        }
        return PdoLxk::$monPdo;       
    }
}
?>