<?php

include_once '../modeles/mesFonctionsAccesBDD.php';
session_start();
$lePdo = connexionBDD();

$mail = "b@b.fr";
var_dump($_SESSION["username"]);
echo '<br>';
var_dump(getPassword($lePdo, $mail));