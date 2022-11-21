<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
$pdo=connexionBDD();
$req =recupInfo($pdo, 'truc@truc.fr');
var_dump($req);
var_dump(recupConnexion($pdo, "truc@truc.fr"));
