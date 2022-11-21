<?php

include_once '../modeles/mesFonctionsAccesBDD.php';
$mail = "a@a.fr";
var_dump($info = encrypt($mail));
echo "<br>";

var_dump(decrypt($info));