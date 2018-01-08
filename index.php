<?php
require_once ("include/class.pdolexik.php");
$pdo = PdoLxk::getPdoLxk();
include ("vues/v_entete.html");

if(!isset($_REQUEST['uc'])) {
    $_REQUEST['uc'] = 'accueil';
}
if(isset($_POST['idDelete'])){
    echo $_POST['idDelete'];
}
$uc = $_REQUEST['uc'];
switch ($uc) {
    case 'accueil':{
        include("controleurs/c_afficheTab.php");
        break;
    }
    default:{
        include("controleurs/c_afficheTab.php");
        break;
    }
}

include("vues/v_pied.html");
?>

