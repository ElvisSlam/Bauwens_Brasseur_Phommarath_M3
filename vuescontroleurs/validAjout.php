<?php

include_once '../modeles/mesFonctionsAccesBDD.php';
session_start();

if (isset($_SESSION['username'])) {
    header('Location: formConnexion.php');
}
$reference = $_POST['reference'];
$ville = $_POST['ville'];
$type = $_POST['type'];
$prix = $_POST['prix'];
$description = $_POST['description'];
$surface = $_POST['surface'];
$nbpiece = $_POST['nbpiece'];
$jardin = $_POST['jardin'];
$lePdo = connexionBDD();

$testAjout = AjoutBien($lePdo, $reference, $ville, $type, $prix,$description, $surface, $nbpiece, $jardin);
if ($testAjout == true) {
    header('Location: menu.php?bienajouté');
} else {
    header('Location: formAjouteBien.php?erreur=1');
}

mysqli_close($db);
