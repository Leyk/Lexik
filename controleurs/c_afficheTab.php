<?php
/**
 * Contrôleur gérant ajout/suppression/affichage des utilisateurs avec leur groupe.
 */

require_once ($_SERVER['DOCUMENT_ROOT']."/LexikPhp/include/class.pdolexik.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/LexikPhp/include/Groupe.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/LexikPhp/include/GroupeManager.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/LexikPhp/include/Utilisateur.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/LexikPhp/include/UtilisateurManager.php");

$pdo = PdoLxk::getPdoLxk();
$usrManager = new UtilisateurManager($pdo);

// Cas où l'on ajoute un utilisateur
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['date']) && isset($_POST['groupe'])){
    $new = new Utilisateur([
        'groupeUtilisateur'=>$_POST['groupe'],
        'nomUtilisateur'=>$_POST['nom'],
        'prenomUtilisateur'=>$_POST['prenom'],
        'mailUtilisateur'=>$_POST['mail'],
        'dateAnnivUtilisateur'=>$_POST['date']
    ]);
    $usrManager->add($new); 
}

// Cas où l'on supprime un utilisateur
if(isset($_POST['toDelete'])){
    $idDelete = $_POST['toDelete'];
    $usrManager->delete($usrManager->getUtilisateur($idDelete));
}

// Récupération de la liste des utilisateurs et de la liste des groupes
$grpUsr = $usrManager->getList();
$grpManager = new GroupeManager($pdo);
$grpListe = $grpManager->getList();

include($_SERVER['DOCUMENT_ROOT']."/LexikPhp/vues/v_tableau.php");
?>