<?php

include_once '../modeles/mesFonctionsAccesBDD.php';

$username = $_POST['username'];
$password = $_POST['password'];
$lePdo = connexionBDD();
$requete = $lePdo->prepare('SELECT * FROM utilisateurs');
$requete->execute();
$res = $requete->fetchAll();
/*
  $testlogin = testlogin($lePdo, $username, $password);
  if ($testlogin == true) {
  session_start();
  $_SESSION['username'] = 'oui';
  $id_session = session_id();
  header('Location: ../index.php?' . $_SESSION['username']);
  } else {
  header('Location: formConnexion.php?erreur=1');
  }

  mysqli_close($db);
 */

foreach ($res as $result) {
    if ($result['email'] == $username && password_verify($password, $result['mdp'])) {
        session_start();
        $_SESSION['username'] = 'oui';
        $id_session = session_id();
        header('Location: ../index.php?' . $id_session);
        die();
    } else {
        echo '<h1>erreur de connexion </h1>';
    }
}
?>