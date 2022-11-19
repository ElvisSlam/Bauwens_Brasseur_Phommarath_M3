<?php

include_once '../modeles/mesFonctionsAccesBDD.php';
session_start();
$pdo = connexionBDD();
$req = recupInfo($pdo, $_SESSION['username']);


if (isset($_GET['path'])) {

    $filename = $_GET['path'];

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: 0");
    header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
    header('Pragma: public');
    hash_file("sha256", "info.json");

    die;
} else {
    echo "Filename is not defined.";
}
