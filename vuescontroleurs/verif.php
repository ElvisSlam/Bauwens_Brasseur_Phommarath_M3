<?php

include_once '../modeles/mesFonctionsAccesBDD.php';


if (!isset($_SESSION['username'])) {
    header('Location: formConnexion.php');
}

$username = $_POST['username'];
$password = $_POST['password'];
$lePdo = connexionBDD();

$res = recupInfo($lePdo, $username);

if ($res['email'] == $username && password_verify($password, $res['mdp'])) {
    insertConnexion($lePdo, $username);
    session_start();
    $_SESSION['username'] = $username;
    header('Location: ../index.php');
} else {
    header('Location: suppCompte.php?erreur=mdp');
}

