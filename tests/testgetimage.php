<?php

include_once '../modeles/mesFonctionsAccesBDD.php';
$lePdo=connexionBDD();
var_dump(getimage($lePdo, 10001));
