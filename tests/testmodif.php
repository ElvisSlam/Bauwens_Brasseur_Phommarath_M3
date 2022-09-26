<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
$lePdo=connexionBDD();
var_dump(ModifBien($lePdo, 30001, "ANGERS", "Local", 14000, "Local spacieux a l'aise blaise", 200, 30, 0));
