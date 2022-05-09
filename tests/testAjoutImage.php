<?php

include_once '../modeles/mesFonctionsAccesBDD.php';

$lePdo = connexionBDD();

var_dump(ajoutimage($lePdo, 10005, '../images/appartest.jpeg'));

