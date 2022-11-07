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
            <a href="vuescontroleurs/menu.php?.$_SESSION['username']" aria-current="page"  class="link-header">Menu</a>
            <a href="vuescontroleurs/Deconnexion.php?.$_SESSION['username']" aria-current="page"  class="link-header">Deconnexion</a>
            <a href="vuescontroleurs/rectification.php" aria-current="page"  class="link-header">rectification</a>
            <a href="vuescontroleurs/listeBiens.php?.$_SESSION['username']" aria-current="page" class="link-header">Visualiser la liste des biens</a>
            <?php
            } else {
            ?>
            <a href="vuescontroleurs/formConnexion.php" aria-current="page"  class="link-header">Se connecter</a>
            <a href="vuescontroleurs/formInscription.php" aria-current="page"  class="link-header">S'inscrire</a>
            <?php 
            }
            ?>

        </header>
        