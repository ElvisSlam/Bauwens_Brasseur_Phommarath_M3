<!DOCTYPE html>
<html>
    <head>
        <?php
        // put your code here
        include_once'../inc/entete.inc'
        ?>
        <link rel="stylesheet" href="../css/cssimmo.css" />
    </head>
    <body>
        <?php
        require('../modeles/mesFonctionsAccesBDD.php');
        session_start();
        ?>
        <form class="box" action="validAjout.php" method="post" name="Ajout">
            <h1 class="box-title">Ajouter un bien</h1>
            <input type="text" class="box-input" name="reference" placeholder="Reference">
            <input type="text" class="box-input" name="ville" placeholder="ville">
            <input type="text" class="box-input" name="type" placeholder="type">
            <input type="text" class="box-input" name="prix" placeholder="prix">
            <input type="text" class="box-input" name="description" placeholder="description">
            <input type="text" class="box-input" name="surface" placeholder="surface">
            <input type="text" class="box-input" name="nbpiece" placeholder="nbpiece">
            <input type="text" class="box-input" name="jardin" placeholder="jardin">
            <input type="submit" value="Ajouter " name="submit" class="box-button">

        </form>
        <form class="box" action="deconnexion.php" method="post" name="logout">
        <input type="submit" value="Déconnexion" name="submit" class="box-button">
        </form>
        <?php
        include_once '../inc/piedDePage.inc';
        ?>
    </body>
</html>