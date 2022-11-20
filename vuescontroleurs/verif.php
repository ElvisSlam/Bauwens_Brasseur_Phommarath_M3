<?php

include_once '../modeles/mesFonctionsAccesBDD.php';


if (isset($_SESSION['username'])) {
    header('Location: formConnexion.php');
}

$username = $_POST['username'];
$password = $_POST['password'];
$lePdo = connexionBDD();
$requete = $lePdo->prepare('SELECT * FROM utilisateurs');
$requete->execute();
$res = $requete->fetchAll();


foreach ($res as $result) {
    if ($result['email'] == $username && password_verify($password, $result['mdp'])) {
        insertConnexion($lePdo, $username);
        session_start();
        $_SESSION['username'] = $username;
        header('Location: ../index.php');
    } else {
        header('Location: formConnexion.php?erreur=mdp');
    }
}
