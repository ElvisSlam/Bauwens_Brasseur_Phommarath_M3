<?php

include_once '../modeles/mesFonctionsAccesBDD.php';

$Nom = $_POST['nom'];
$Prenom = $_POST['prenom'];
$email = $_POST['email'];
$password = $_POST['password'];
$repeatpassword = $_POST['repeatpassword'];
$lePdo = connexionBDD();

var_dump($_POST);
if (isset($_POST['donnees'])) {

    if (Inscription($lePdo, $Nom, $Prenom, $email, $password, $repeatpassword)) {
        session_start();
        $_SESSION['username'] = $Nom;
        $id_session = session_id();
        header('Location: listeBiens.php?' . $_SESSION['username']);
    } else {

        header('Location: formInscription.php?erreur=1');
    }
} else {

    header('Location: formInscription.php?erreur=4');
}
