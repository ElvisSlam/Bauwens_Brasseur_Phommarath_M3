<?php

include_once '../modeles/mesFonctionsAccesBDD.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: formConnexion.php');
}

$Nom = $_POST['nom'];
$Prenom = $_POST['prenom'];
$password = $_POST['modifmdp'];
$lePdo = connexionBDD();



if (isset($_POST['password'])) {
    $password = $_POST['password'];
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if ($uppercase || $lowercase || $number || $specialChars || strlen($password) < 8) {
        echo '<script>alert("Le mot de passe devrait faire au moins 8 caractères et devrait inclure au moins une lettre majuscule, un nombre, et un caractère spécial.")</script>';
        $strongPass = false;
    } else {
        $strongPass = true;
    }
}

if ($strongPass) {
    if (modifInfo($lePdo, $Nom, $_SESSION['username'], $Prenom, $password)) {

        header('Location: ../index.php?' . $_SESSION['username']);
    } else {

        header('Location: rectification.php');
    }
} else {
    header('Location: rectification.php?erreur=4');
}
