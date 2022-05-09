<?php

include_once '../modeles/mesFonctionsAccesBDD.php';

$username = $_POST['username'];
$password = $_POST['password'];
$lePdo = connexionBDD();

$testlogin = testlogin($lePdo, $username, $password);
if ($testlogin == true) {
    session_start();
    $_SESSION['username'] = $username;
    $id_session = session_id();
    header('Location: ../index.php?' . $_SESSION['username']);
} else {
    header('Location: formConnexion.php?erreur=1');
}

mysqli_close($db);
/*
  $lePdo = connexionBDD();
  $requete = $lePdo->prepare("Select * from utilisateurs");
  $requete->execute();
  $res = $requete->fetchAll();

  foreach ($res as $result) {
  if ($result['email'] == $username && password_verify($password, $result['mdp'])) {
  session_start();
  $_SESSION['username'] = $username;
  $id_session = session_id();
  header('Location: menu.php?' . $id_session);
  } else {
  echo '<h1>erreur de connexion </h1>';

  }
  } */
?>