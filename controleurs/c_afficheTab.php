<?php
/**
 * Contr�leur g�rant ajout/suppression/affichage des utilisateurs avec leur groupe.
 */
require_once __DIR__.'/../include/class.pdolexik.php';
require_once __DIR__.'/../include/Groupe.php';
require_once __DIR__.'/../include/GroupeManager.php';
require_once __DIR__.'/../include/Utilisateur.php';
require_once __DIR__.'/../include/UtilisateurManager.php';

$pdo = PdoLxk::getPdoLxk();
$usrManager = new UtilisateurManager($pdo);

// Cas o� l'on ajoute un utilisateur
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

// Cas o� l'on supprime un utilisateur
if(isset($_POST['toDelete'])){
    $idDelete = $_POST['toDelete'];
    $usrManager->delete($usrManager->getUtilisateur($idDelete));
}

// R�cup�ration de la liste des utilisateurs et de la liste des groupes
$grpUsr = $usrManager->getList();
$grpManager = new GroupeManager($pdo);
$grpListe = $grpManager->getList();

include __DIR__.'/../vues/v_tableau.php';
?>