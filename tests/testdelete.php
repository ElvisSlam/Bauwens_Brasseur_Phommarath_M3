<?php

include_once '../modeles/mesFonctionsAccesBDD.php';

$lePdo = connexionBDD();

var_dump(Supprimerbiens($lePdo, "40002"));


