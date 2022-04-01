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
    $pdoStatement = $pdo->prepare("SELECT Count(*) FROM utilisateurs WHERE login = :username AND mdp = :password ");
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
function AjoutBien($pdo, $reference, $ville, $type, $prix , $surface, $nbpiece, $jardin) {
    $requete = $pdo->prepare("INSERT INTO biens VALUES (:reference,:ville,:type,:prix,:surface,:nbpiece,:jardin)");
    $bv1 = $requete->bindValue(':reference', $reference, PDO::PARAM_STR);
    $bv2 = $requete->bindValue(':ville', $ville, PDO::PARAM_STR);
    $bv3 = $requete->bindValue(':type', $type, PDO::PARAM_STR);
    $bv4 = $requete->bindValue(':prix', $prix, PDO::PARAM_STR);
    $bv5 = $requete->bindValue(':surface', $surface, PDO::PARAM_STR);
    $bv6 = $requete->bindValue(':nbpiece', $nbpiece, PDO::PARAM_STR);
    $bv7 = $requete->bindValue(':jardin', $jardin, PDO::PARAM_STR);
    $exec = $requete->execute();
    return $exec;
}


function getLesBiens($pdo, $ville, $type){
    $pdostatement=$pdo->prepare("SELECT reference,ville,type,prix FROM biens WHERE ville LIKE :rechVille AND type LIKE :rechType");
    $bv1=$pdostatement->bindValue(':rechVille',$ville, PDO::PARAM_STR);
    $bv1=$pdostatement->bindValue(':rechType',$type, PDO::PARAM_STR);
    $exec=$pdostatement->execute();
    $resultat=$pdostatement->fetchAll();
    return $resultat;
}
 

function getLesVilles($pdo){
    $pdostatement=$pdo->prepare("SELECT DISTINCT ville FROM biens");
    $exec=$pdostatement->execute();
    $resultat=$pdostatement->fetchAll();
    return $resultat;
}

function getLesTypes($pdo){
    $pdostatement=$pdo->prepare("SELECT type FROM type");
    $exec=$pdostatement->execute();
    $resultat=$pdostatement->fetchAll();
    return $resultat;
}