<!DOCTYPE html>
<html lang="fr">

    <title>France Immobilier : Achat de biens immobiliers pour particuliers</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cssimmo.css">
    <body>
        <header> 
            <a href="../index.php">
                <img src="../images/logo_dark_transpa.png" class="img-header" alt="logo">
            </a>

            <?php
            session_start();
            ?>
            <?php
            if (isset($_SESSION['username'])) {
            ?>
            <a href="menu.php" aria-current="page"  class="link-header">Menu</a>
            <a href="Deconnexion.php" aria-current="page"  class="link-header">Deconnexion</a>
            <?php
            } else {
            ?>
            <a href="formConnexion.php" aria-current="page"  class="link-header">Se connecter</a>
            <a href="formInscription.php" aria-current="page"  class="link-header">S'inscrire</a>
            <?php 
            }
            ?>
            
            <a href="politique.php" aria-current="page"  class="link-header">politique de confidentialité</a>

            <a href="listeBiens.php" aria-current="page" class="link-header">Visualiser la liste des biens</a>
        </header>
