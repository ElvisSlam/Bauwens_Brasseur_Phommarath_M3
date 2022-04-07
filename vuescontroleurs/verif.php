<?php


  include_once '../modeles/mesFonctionsAccesBDD.php';
  session_start();

  $username=$_POST['username'];
  $password=$_POST['password'];
  $lePdo = connexionBDD();

  $testlogin = testlogin($lePdo, $username, $password);
  if ($testlogin == true) { 
  $_SESSION['username'] = $username;
  header('Location: menu.php?'.$_SESSION);
  } else {
  header('Location: formConnexion.php?erreur=1');

  }

  mysqli_close($db);

/*
include_once '../modeles/mesFonctionsAccesBDD.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$lePdo = connexionBDD();

$requete = $lePdo->prepare('SELECT * FROM utilisateurs');
$exec = $requete->execute();
$res = $requete->fetchAll();

foreach ($res as $result) {
    if ($result['username'] == $username && $result['password'] == $password) {
        session_start();
        $_SESSION['username'] = $username;
        $id_session = session_id();
        echo '<meta http-equiv="refresh" content="1; url=menu.php"/>';
    }
}*/
?>