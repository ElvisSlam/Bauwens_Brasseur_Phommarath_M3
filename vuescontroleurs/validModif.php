<?php

include_once '../modeles/mesFonctionsAccesBDD.php';
session_start();

$reference = $_POST['modifreference'];
$ville = $_POST['modifville'];
$type = $_POST['modiftype'];
$prix = $_POST['modifprix'];
$description = $_POST['modifdescription'];
$surface = $_POST['modifsurface'];
$nbpiece = $_POST['modifnbpiece'];
$jardin = $_POST['modifjardin'];
$lePdo = connexionBDD();

$testAjout = ModifBien($lePdo, $reference, $ville, $type, $prix,$description, $surface, $nbpiece, $jardin);
if ($testAjout == true) {
    header('Location: menu.php?bienmodifié');
} else {
    header('Location: formModifBien.php?erreur=1');
}

mysqli_close($db);
