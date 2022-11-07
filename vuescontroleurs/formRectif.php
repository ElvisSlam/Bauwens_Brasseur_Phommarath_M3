<?php
include_once '../inc/entete.inc';
require('../modeles/mesFonctionsAccesBDD.php');
$lePdo = connexionBDD();
$username = $_SESSION["username"];
$req = $lePdo->prepare("SELECT nom, prenom, mdp FROM utilisateurs WHERE email LIKE '$username'");
$req->execute();
$res=$req->fetch();
$nom = $res["nom"];
$prenom = $res["prenom"];
$info = '<form class="box" action="verifRectif.php">
    <label for="fnom">Nom :</label><br>
    <input type="text" id="fnom" name="fnom" value="'.$nom.'"><br>
    <label for="fprenom">Prénom :</label><br>
    <input type="text" id="fprenom" name="fprenom" value="'.$prenom.'"><br>
    <label for="fmdp">Mot de passe :</label><br>
    <input type="text" id="fmdp" name="fmdp"><br>
    <input type="submit" value="Rectifier" name="submit" class="box-button">
</form>';
echo $info;