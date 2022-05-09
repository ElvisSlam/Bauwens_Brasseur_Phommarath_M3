<?php

include_once 'mesFonctionsAccesBDD.php';
try {
    $hash = password_hash("Boss1", PASSWORD_BCRYPT);
    $lePdo = connexionBDD();
    $requete = $lePdo->prepare("INSERT INTO utilisateurs VALUES ('Boss1',' $hash ')");
    $requete->execute();
    echo 'mdphash';
} catch (Exception $ex) {
    echo 'erreur';
}
