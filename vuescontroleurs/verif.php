<?php


  include_once '../modeles/mesFonctionsAccesBDD.php';
  session_start();

  $username=$_POST['username'];
  $password=$_POST['password'];
  $lePdo = connexionBDD();

  $testlogin = testlogin($lePdo, $username, $password);
  if ($testlogin == true) { // nom d'utilisateur et mot de passe correctes
  $_SESSION['username'] = $username;
  header('Location: menu.php');
  } else {
  header('Location: formConnexion.php?erreur=1');

  }

  mysqli_close($db); // fermer la connexion
 

?>