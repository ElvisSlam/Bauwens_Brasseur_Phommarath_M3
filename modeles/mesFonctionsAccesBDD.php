<?php

function connexionBDD()
{
    $bdd = 'mysql:host=localhost;dbname=ap_mission3';
    $user = 'root';
    $password = 'newpass';
    try {

        $ObjConnexion = new PDO($bdd, $user, $password, array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $ObjConnexion;
}

function deconnexionBDD($cnx)
{
    $cnx = null;
}

function testlogin($pdo, $username)
{
    $pdoStatement = $pdo->prepare("SELECT Count(*) FROM utilisateurs WHERE email = :username");
    $bv1 = $pdoStatement->bindValue(':username', $username);
    $execution = $pdoStatement->execute();
    $resultat = $pdoStatement->fetch();
    if ($resultat[0] != 0)
        $logok = true;
    else
        $logok = false;

    return $logok;
}

function AjoutBien($pdo, $reference, $ville, $type, $prix, $description, $surface, $nbpiece, $jardin)
{
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

function getLesBiens($pdo, $reference, $ville, $type, $jardin, $prixmin, $prixmax, $surface, $nbpiece)
{
    $pdostatement = $pdo->prepare("SELECT * FROM biens WHERE reference LIKE :rechRef "
        . "AND ville LIKE :rechVille AND type LIKE :rechType AND jardin LIKE :rechJardin "
        . "AND prix BETWEEN :rechPrixmin AND :rechPrixmax AND surface >= :rechSurface "
        . "AND nbpiece >= :rechPiece");
    $bv1 = $pdostatement->bindValue(':rechVille', $ville, PDO::PARAM_STR);
    $bv2 = $pdostatement->bindValue(':rechType', $type, PDO::PARAM_STR);
    $bv3 = $pdostatement->bindValue(':rechJardin', $jardin, PDO::PARAM_STR);
    $bv4 = $pdostatement->bindValue(':rechPrixmin', $prixmin, PDO::PARAM_INT);
    $bv5 = $pdostatement->bindValue(':rechPrixmax', $prixmax, PDO::PARAM_INT);
    $bv6 = $pdostatement->bindValue(':rechSurface', $surface, PDO::PARAM_INT);
    $bv7 = $pdostatement->bindValue(':rechPiece', $nbpiece, PDO::PARAM_INT);
    $bv8 = $pdostatement->bindValue(':rechRef', $reference, PDO::PARAM_STR);
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetchAll();
    return $resultat;
}

function getLesVilles($pdo)
{
    $pdostatement = $pdo->prepare("SELECT DISTINCT ville FROM biens");
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetchAll();
    return $resultat;
}

function getLesTypes($pdo)
{
    $pdostatement = $pdo->prepare("SELECT type FROM type");
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetchAll();
    return $resultat;
}

function getPrixMax($pdo)
{
    $pdostatement = $pdo->prepare("SELECT MAX(prix) FROM biens");
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetch();
    $resultatint = intval($resultat[0]);
    return $resultatint;
}

function getUnBiens($pdo, $reference)
{
    $pdostatement = $pdo->prepare("SELECT * FROM biens WHERE reference = :reference");
    $bv1 = $pdostatement->bindValue(':reference', $reference, PDO::PARAM_STR);
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetch();
    return $resultat;
}

function getimage($pdo, $reference)
{
    $pdostatement = $pdo->prepare("SELECT * FROM image WHERE reference = :reference");
    $bv1 = $pdostatement->bindValue(':reference', $reference, PDO::PARAM_STR);
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetch();
    return $resultat;
}

function getPrixMin($pdo)
{
    $pdostatement = $pdo->prepare("SELECT MIN(prix) FROM biens");
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetch();
    $resultatint = intval($resultat[0]);
    return $resultatint;
}

function ModifBien($pdo, $reference, $ville, $type, $prix, $description, $surface, $nbpiece, $jardin)
{
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

function getSurface($pdo, $surface)
{
    $pdostatement = $pdo->prepare("SELECT * FROM biens WHERE surface >= :surface");
    $bv1 = $pdostatement->bindValue(':surface', $surface, PDO::PARAM_INT);
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetchAll();
    return $resultat;
}

function getSurfacemin($pdo)
{
    $pdostatement = $pdo->prepare("SELECT MIN(surface) FROM biens");
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetch();
    $resultatint = intval($resultat[0]);
    return $resultatint;
}

function getNbpiece($pdo, $nbpiece)
{
    $pdostatement = $pdo->prepare("SELECT * FROM biens WHERE nbpiece >= :nbpiece");
    $bv1 = $pdostatement->bindValue(':nbpiece', $nbpiece, PDO::PARAM_INT);
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetchAll();
    return $resultat;
}

function getNbPiecemin($pdo)
{
    $pdostatement = $pdo->prepare("SELECT MIN(nbpiece) FROM biens");
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetch();
    $resultatint = intval($resultat[0]);
    return $resultatint;
}

function getUser($pdo, $username)
{
    $pdostatement = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $bv1 = $pdostatement->bindValue(':email', $username, PDO::PARAM_INT);
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetchAll();
    return $resultat;
}


function Supprimerbiens($pdo, $reference)
{
    $requete1 = $pdo->prepare("Delete from biens WHERE reference = :ref");
    $bv1 = $requete1->bindValue(':ref', $reference);
    $exec = $requete1->execute();
    return $exec;
}

function SuppImage($pdo, $reference)
{
    $requete1 = $pdo->prepare("Delete from image WHERE reference = :ref");
    $bv1 = $requete1->bindValue(':ref', $reference);
    $exec = $requete1->execute();
    return $exec;
}

function getLesRefs($pdo)
{
    $pdostatement = $pdo->prepare("SELECT DISTINCT reference FROM biens");
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetchAll();
    return $resultat;
}

function getLaRef($pdo)
{
    $pdostatement = $pdo->prepare("SELECT reference FROM biens");
    $exec = $pdostatement->execute();
    $resultat = $pdostatement->fetch();
    return $resultat;
}

function Inscription($lePdo, $Nom, $Prenom, $email, $password, $repeatpassword)
{
    wds<fèhg-y
    if ($Nom && $Prenom && $email && $password && $repeatpassword) {
        echo 'premier if';
        if ($password == $repeatpassword) {
            echo 'deuxieme';
            $password = password_hash($password, PASSWORD_BCRYPT);
            $requete = $lePdo->prepare("INSERT INTO utilisateurs VALUES (:Nom,:Prenom,:email,:password,CURDATE())");
            $bv1 = $requete->bindValue(':Nom', $Nom, PDO::PARAM_STR);
            $bv2 = $requete->bindValue(':Prenom', $Prenom, PDO::PARAM_STR);
            $bv3 = $requete->bindValue(':email', $email, PDO::PARAM_STR);
            $bv4 = $requete->bindValue(':password', $password, PDO::PARAM_STR);
            $exec = $requete->execute();
            $log = true;
        } else {
            $log = false;
        }echo $log;
    }
    return $log;
}
