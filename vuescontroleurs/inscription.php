<?php
   
   include_once '../modeles/mesFonctionsAccesBDD.php';
   
$Nom = $_POST['nom'];
$Prenom = $_POST['prenom'];
$email = $_POST['email'];
$password = $_POST['password'];
$repeatpassword = $_POST['repeatpassword'];
$lePdo = connexionBDD();
  
$inscription = inscription($lePdo, $Nom, $Prenom, $email, $password, $repeatpassword);
if ($inscription == true) {
    session_start();
    $_SESSION['username'] = $Nom;
    $id_session = session_id();
    header('Location: listeBiens.php?' . $_SESSION['username']);
} else {
    header('Location: formInscription.php?erreur=1');
}

mysqli_close($db);
   
?>