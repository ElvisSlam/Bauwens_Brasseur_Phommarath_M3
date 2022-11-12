<?php

include_once '../modeles/mesFonctionsAccesBDD.php';

$Nom = $_POST['nom'];
$Prenom = $_POST['prenom'];
$email = $_POST['email'];
$password = $_POST['password'];
$repeatpassword = $_POST['repeatpassword'];
$lePdo = connexionBDD();


if (isset($_POST['password'])) {
    $password = $_POST['password'];
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if ($uppercase || $lowercase || $number || $specialChars || strlen($password) < 8) {
        echo '<div class="alert alert-danger" role="alert">
        A simple danger alert—check it out!
      </div>';
        $strongPass = false;
    } else {
        $strongPass = true;
    }
}



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

    header('Location: formInscription.php?erreur=3');
}
