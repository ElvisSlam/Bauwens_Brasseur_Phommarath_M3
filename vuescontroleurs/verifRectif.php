<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
session_start();
$lePdo = connexionBDD();
$nom = $_GET["fnom"];
$prenom = $_GET["fprenom"];
$mdp = $_GET["fmdp"];
$email =$_SESSION["username"];

if(rectif($lePdo, $nom, $prenom, $mdp, $email)){
    echo "Données modifiées";
    header('Location: listeBiens.php');
} else {
    echo "Erreur";
}




?>