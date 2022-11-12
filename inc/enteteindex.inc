<!DOCTYPE html>
<html lang="fr">
    <title>France Immobilier : Achat de biens immobiliers pour particuliers</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cssimmo.css">
    <body>
        <header> 
            <a href="index.php">
                <img src="images/logo_dark_transpa.png" class="img-header" alt="logo">
            </a>
            <?php
            session_start();
            ?>
            <?php
            if (isset($_SESSION['username'])) {
            ?>
            <a href="vuescontroleurs/menu.php" aria-current="page"  class="link-header">Menu</a>
            <a href="vuescontroleurs/Deconnexion.php" aria-current="page"  class="link-header">Deconnexion</a>
            <a href="vuescontroleurs/formRectif.php" aria-current="page" class="link-header">Rectifier vos données</a>
            <?php
            } else {
            ?>
            <a href="vuescontroleurs/formInscription.php" aria-current="page"  class="link-header">S'inscrire</a>
            <a href="vuescontroleurs/formConnexion.php" aria-current="page"  class="link-header">Se connecter</a>
            <?php 
            }
            ?>
            <a href="vuescontroleurs/rgpd.php" aria-current="page"  class="link-header">politique de confidentialité</a>
            <a href="vuescontroleurs/listeBiens.php" aria-current="page" class="link-header">Visualiser la liste des biens</a>
        </header>