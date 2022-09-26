<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
$lePdo=connexionBDD();
$unpdo= connexionBDD();
var_dump(getPrixMax($unpdo));
var_dump(getLesBiens($lePdo, '%' , '%', '%', 0, 900000));
