<?php
session_start();
require('../modeles/mesFonctionsAccesBDD.php');
$login = $_SESSION["username"];
$lePdo = connexionBDD();
$res = getInfos($lePdo,$login);
$file = 'hash.json';
$json = json_encode($res);
$hash = hash('sha256', $json);
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename($file).'"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
echo $hash;
readfile($file);
die;
?>