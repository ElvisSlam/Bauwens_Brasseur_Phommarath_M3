<?php
require('../modeles/mesFonctionsAccesBDD.php');
session_start();
$lePdo = connexionBDD();
$login = $_SESSION["username"];
$mail = $_GET["smail"];
if(strcmp($mail, $login)==0){
    if(deleteData($lePdo, $login)){
        unset($_SESSION['username']);
        $_SESSION = array();
        session_destroy();
        header('Location: formInscription.php');
    } else {
        header('Location: supp.php?error=2');
    }
} else {
    header('Location: supp.php?error=1');
}
?>