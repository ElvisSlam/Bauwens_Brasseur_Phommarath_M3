<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
$pdo=connexionBDD();
var_dump(SuppConnexion($pdo, "b@b.com"));
var_dump(suppInfo($pdo, "b@b.com"));
