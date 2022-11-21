<?php
include_once '../inc/entete.inc';
require('../modeles/mesFonctionsAccesBDD.php');
if(isset($_SESSION["username"])) {
    if(isset($_GET["error"])){
        switch (htmlspecialchars($_GET["error"])){
            case 1:
                echo "<script>alert('Le mot de passe est incorrect')</script>";
                break;
            case 2:
                echo "<script>alert('Une erreur est survenue')</script>";
                break;
        }
    }
    $info = '<form class="box" action="delete.php" method="get" name="login">
                <h4>Pour supprimer toutes vos données, veuillez saisir votre mot de passe :</h4>
                <label for="smail">Mot de passe :</label><br>
                <input type="password" id="smail" name="smail"><br>
                <input type="submit" value="Supprimer vos données" name="submit" class="box-button">
            </form>';
    echo $info;
} else {
    header('Location: listeBiens.php');
    echo "<script>alert('Vous devez être connecté pour accèder à cette page.')</script>";
} 

?> 