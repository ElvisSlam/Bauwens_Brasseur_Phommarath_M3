<?php

include_once '../modeles/mesFonctionsAccesBDD.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$lePdo = connexionBDD();
$requete = $lePdo->prepare('SELECT * FROM utilisateurs');
$requete->execute();
$res = $requete->fetchAll();


foreach ($res as $result) {
    if ($result['email'] == $_SESSION['username'] && password_verify($password, $result['mdp'])) {
        SuppConnexion($lePdo, $_SESSION['username']);
        suppInfo($lePdo, $_SESSION['username']);
        header('Location: Deconnexion.php');
    } else {
        header('Location: suppCompte.php?erreur=mdp');
    }
}
