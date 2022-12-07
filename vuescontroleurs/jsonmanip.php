<?php

include_once '../inc/entete.inc';
require('../modeles/mesFonctionsAccesBDD.php');

$string = "bonsoir";

var_dump(json_encode($string));