<?php

include_once 'mesFonctionsAccesBDD.php';
try {
    $hash = password_hash("password", PASSWORD_BCRYPT);
    $lePdo = connexionBDD();
    $requete = $lePdo->prepare("INSERT INTO utilisateurs VALUES ('Boss',' . $hash .')");
    $requete->execute();
    echo 'mdphash';
} catch (Exception $ex) {
    echo 'erreur';
}
