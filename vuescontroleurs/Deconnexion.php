<?php

include_once '../modeles/mesFonctionsAccesBDD.php';

session_start();
$lePdo = connexionBDD();
$login = $_SESSION['username'];
if(deco($lePdo, $login)){
    unset($_SESSION['username']);
    $_SESSION = array();
    session_destroy();
    header('Location: formConnexion.php');
} else {
    echo "<script>alert('Une erreur est survenue)'</script>";
}
?>