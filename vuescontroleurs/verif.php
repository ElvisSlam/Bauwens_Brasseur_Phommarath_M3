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
        $req = $lePdo->prepare("INSERT INTO connexion (login, dateConnexion) VALUES('".$username."', NOW())");
        //var_dump($req);
        $req->execute();
        session_start();
        $_SESSION['username'] = $username;
        $id_session = session_id();
        header('Location: ../index.php');
    } else {
        echo '<h1>erreur de connexion </h1>';
    }
}
?>