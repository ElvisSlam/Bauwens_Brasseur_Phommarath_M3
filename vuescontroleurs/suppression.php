<?php

include_once '../modeles/mesFonctionsAccesBDD.php';
session_start();
var_dump($_SESSION['username']);
$password = $_POST['password'];
$lePdo = connexionBDD();
$res = recupInfo($lePdo, $_SESSION['username']);

if (password_verify($password, $res['mdp'])) {
    SuppConnexion($lePdo, $_SESSION['username']);
    suppInfo($lePdo, $_SESSION['username']);
    header('Location: Deconnexion.php');
} else {
    header('Location: suppCompte.php?erreur=mdp');
}
