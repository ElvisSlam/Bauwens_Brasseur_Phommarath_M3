<?php

include_once 'mesFonctionsAccesBDD.php';
try {
    $hash = password_hash("admin", PASSWORD_BCRYPT);
    $lePdo = connexionBDD();

    $requete = $lePdo->prepare("INSERT INTO utilisateurs VALUES ('admin','$hash')");
    $requete->execute();
    echo 'mdphash';
} catch (Exception $ex) {
    echo 'erreur';
}
