<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
$pdo=connexionBDD();
var_dump(recupConnexion($pdo, "truc@truc.fr"));
