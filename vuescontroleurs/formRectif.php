<?php
include_once '../inc/entete.inc';
require('../modeles/mesFonctionsAccesBDD.php');
if(isset($_SESSION["username"])) {
    $lePdo = connexionBDD();
    $username = $_SESSION["username"];
    $req = $lePdo->prepare("SELECT nom, prenom, mdp FROM utilisateurs WHERE email LIKE '$username'");
    //var_dump($req);
    $req->execute();
    $res=$req->fetch();
    $nom = $res["nom"];
    $prenom = $res["prenom"];
    $info = '<form class="box" action="verifRectif.php">
        <label for="fnom">Nom :</label><br>
        <input type="text" id="fnom" name="fnom" placeholder="Nom" value="'.$nom.'"><br>
        <label for="fprenom">Prénom :</label><br>
        <input type="text" id="fprenom" name="fprenom" placeholder="Prenom" value="'.$prenom.'"><br>
        <label for="fmdp">Mot de passe :</label><br>
        <input type="text" id="fmdp" name="fmdp" placeholder="Mot de passe"><br>
        <input type="submit" value="Rectifier" name="submit" class="box-button">
    </form>';
    echo $info;
} else {
    header('Location: listeBiens.php');
    echo "<script>alert('Vous devez être connecté pour accèder à cette page.')</script>";
}
