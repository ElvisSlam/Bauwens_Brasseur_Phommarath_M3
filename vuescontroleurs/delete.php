<?php
require('../modeles/mesFonctionsAccesBDD.php');
session_start();
$lePdo = connexionBDD();
$login = getPassword($lePdo, $_SESSION["username"]);
$mail = password_hash($_GET["smail"], PASSWORD_BCRYPT);
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