<?php

include_once '../modeles/mesFonctionsAccesBDD.php';
session_start();

$reference = $_POST['reference'];
$ville = $_POST['ville'];
$type = $_POST['type'];
$prix = $_POST['prix'];
$surface = $_POST['surface'];
$nbpiece = $_POST['nbpiece'];
$jardin = $_POST['jardin'];
$lePdo = connexionBDD();

$testAjout = AjoutBien($lePdo, $reference, $ville, $type, $prix, $surface, $nbpiece, $jardin);
if ($testAjout == true) {
    echo 'Bien Ajouté';
    header('Location: menu.php');
} else {
    echo 'Le Bien n a pas été ajouté';
    header('Location: formAjouteBien.php?erreur=1');
}

mysqli_close($db);
