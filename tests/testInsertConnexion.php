<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
$pdo=connexionBDD();
var_dump(insertConnexion($pdo, "truc@truc.fr"));
