<?php
session_start();
require('../modeles/mesFonctionsAccesBDD.php');
$login = $_SESSION["username"];
$lePdo = connexionBDD();
$res = getInfos($lePdo,$login);
$file = 'info.json';
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename($file).'"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
echo(json_encode($res));
readfile($file);
die;
?>