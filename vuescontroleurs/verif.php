<?php

include_once '../modeles/mesFonctionsAccesBDD.php';

$username = $_POST['username'];
$password = $_POST['password'];
$lePdo = connexionBDD();
$requete = $lePdo->prepare('SELECT * FROM utilisateurs');
$requete->execute();
$res = $requete->fetchAll();


foreach ($res as $result) {
    if ($result['email'] == $username && password_verify($password, $result['mdp'])) {
        session_start();
        $_SESSION['username'] = $username;
        $id_session = session_id();
        header('Location: ../index.php');
    } else {
        echo '<h1>erreur de connexion </h1>';
    }
}
?>