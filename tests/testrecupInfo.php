<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
$pdo=connexionBDD();
var_dump(recupInfo($pdo, "elvisbauwens@gmail.com"));
