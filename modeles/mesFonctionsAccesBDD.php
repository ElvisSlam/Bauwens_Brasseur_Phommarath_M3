<?php

function connexionBDD() {
    $bdd = 'mysql:host=localhost;dbname=ap_mission3';
    $user = 'root';
    $password = 'root';
    try {

        $ObjConnexion = new PDO($bdd, $user, $password, array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $ObjConnexion;
}

function deconnexionBDD($cnx) {
    $cnx = null;
}

function testlogin($pdo, $username, $password) {
    $pdoStatement = $pdo->prepare("SELECT Count(*) FROM utilisateurs WHERE email = :username AND mdp = :password ");
    $bv1 = $pdoStatement->bindValue(':username', $username);
    $bv2 = $pdoStatement->bindValue(':password', $password);
    $execution = $pdoStatement->execute();
    $resultat = $pdoStatement->fetch();
    if ($resultat[0] != 0)
        $logok = true;
    else
        $logok = false;

    return $logok;
}

function AjoutBien($pdo, $reference, $ville, $type, $prix, $description, $surface, $nbpiece, $jardin) {
    $requete = $pdo->prepare("INSERT INTO biens VALUES (:reference,:ville,:type,:prix,:description,:surface,:nbpiece,:jardin)");
    $bv1 = $requete->bindValue(':reference', $reference, PDO::PARAM_STR);
    $bv2 = $requete->bindValue(':ville', $ville, PDO::PARAM_STR);
    $bv3 = $requete->bindValue(':type', $type, PDO::PARAM_STR);
    $bv4 = $requete->bindValue(':prix', $prix, PDO::PARAM_STR);
    $bv8 = $requete->bindValue(':description', $description, PDO::PARAM_STR);
    $bv5 = $requete->bindValue(':surface', $surface, PDO::PARAM_STR);
    $bv6 = $requete->bindValue(':nbpiece', $nbpiece, PDO::PARAM_STR);
    $bv7 = $requete->bindValue(':jardin', $jardin, PDO::PARAM_STR);
    $exec = $requete->execute();
    return $exec;
}

function getLesBiens($pdo, $ville, $type, $jardin, $prixmin, $prixmax) {
    $pdostatement = $pdo->prepare("SELECT reference,ville,type,prix,jardin FROM biens WHERE ville LIKE :rechVille AND type LIKE :rechType AND jardin LIKE :rechJardin AND prix BETWEEN :rechPrixmin AND :rechPrixmax");
    $bv1 = $pdostatement->bindValue(':rechVille', $ville, PDO::PARAM_STR);
    $bv2 = $pdostatement->bindValue(':rechType', $type, PDO::PARAM_STR);
    $bv3 = $pdostatement->bindValue(':rechJardin', $jardin, PDO::PARAM_STR);
    $bv4 = $pdostatement->bindValue(':rechPrixmin', $prixmin, PDO::PARAM_INT);
    $bv5 = $pdostatement->bindValue(':rechPrixmax', $prixmax, PDO::PARAM_INT);
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetchAll();
    return $resultat;
}

function getLesVilles($pdo) {
    $pdostatement = $pdo->prepare("SELECT DISTINCT ville FROM biens");
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetchAll();
    return $resultat;
}

function getLesTypes($pdo) {
    $pdostatement = $pdo->prepare("SELECT type FROM type");
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetchAll();
    return $resultat;
}

function getPrixMax($pdo) {
    $pdostatement = $pdo->prepare("SELECT MAX(prix) FROM biens");
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetch();
    $resultatint = intval($resultat[0]);
    return $resultatint;
}

function getUnBiens($pdo, $reference) {
    $pdostatement = $pdo->prepare("SELECT * FROM biens WHERE reference = :reference");
    $bv1 = $pdostatement->bindValue(':reference', $reference, PDO::PARAM_STR);
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetch();
    return $resultat;
}

function getimage($pdo, $reference) {
    $pdostatement = $pdo->prepare("SELECT chemin FROM image WHERE reference = :reference");
    $bv1 = $pdostatement->bindValue(':reference', $reference, PDO::PARAM_STR);
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetch();
    return $resultat;
}

function getPrixMin($pdo) {
    $pdostatement = $pdo->prepare("SELECT MIN(prix) FROM biens");
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetch();
    $resultatint = intval($resultat[0]);
    return $resultatint;
}

function ModifBien($pdo, $reference, $ville, $type, $prix, $description, $surface, $nbpiece, $jardin) {
    $requete = $pdo->prepare("UPDATE biens SET reference=:modifreference, ville=:modifville, type=:modiftype, prix=:modifprix, description=:modifdescription, surface=:modifsurface, nbpiece=:modifnbpiece, jardin=:modifjardin WHERE reference=:modifreference");
    $bv1 = $requete->bindValue(':modifreference', $reference, PDO::PARAM_INT);
    $bv2 = $requete->bindValue(':modifville', $ville, PDO::PARAM_STR);
    $bv3 = $requete->bindValue(':modiftype', $type, PDO::PARAM_STR);
    $bv4 = $requete->bindValue(':modifprix', $prix, PDO::PARAM_INT);
    $bv8 = $requete->bindValue(':modifdescription', $description, PDO::PARAM_STR);
    $bv5 = $requete->bindValue(':modifsurface', $surface, PDO::PARAM_INT);
    $bv6 = $requete->bindValue(':modifnbpiece', $nbpiece, PDO::PARAM_INT);
    $bv7 = $requete->bindValue(':modifjardin', $jardin, PDO::PARAM_INT);
    $exec = $requete->execute();
    return $exec;
}

function getsurface($pdo, $surface) {
    $pdostatement = $pdo->prepare("SELECT * FROM biens WHERE surface = :surface");
    $bv1 = $pdostatement->bindValue(':surface', $surface, PDO::PARAM_INT);
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetch();
    return $resultat;
}

function getnbpiece($pdo, $nbpiece) {
    $pdostatement = $pdo->prepare("SELECT * FROM biens WHERE nbpiece = :nbpiece");
    $bv1 = $pdostatement->bindValue(':nbpiece', $nbpiece, PDO::PARAM_INT);
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetch();
    return $resultat;
}
