<?php

include_once '../modeles/mesFonctionsAccesBDD.php';

$lePdo = connexionBDD();

var_dump(AjoutBien($lePdo, "10004", "PARIS", "Appartement", "400000", "30", "3", "0"));

