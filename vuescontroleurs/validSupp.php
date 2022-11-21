<?php

include_once '../modeles/mesFonctionsAccesBDD.php';
session_start();


if (!isset($_SESSION['username'])) {
    header('Location: formConnexion.php');
}

$reference = $_POST['ref'];
$lePdo = connexionBDD();
$testdeleteimage = SuppImage($lePdo, $reference);


if ($testdeleteimage == true) {
    $testdelete = Supprimerbiens($lePdo, $reference);
    if ($testdelete == true) {
        header('Location: menu.php?bienSupp');
    }
} else {
    header('Location: formSuppBiens.php?erreur=1');
}

mysqli_close($db);
