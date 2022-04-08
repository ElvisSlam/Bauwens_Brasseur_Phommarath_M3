<!DOCTYPE html>
<html>
    <head>
        <?php
        include_once'../inc/entete.inc'
        ?>
        <link rel="stylesheet" href="../css/cssimmo.css" />
    </head>
    <body>
        <?php
        require('../modeles/mesFonctionsAccesBDD.php');
        session_start();
        ?>
        <form class="box" action="validModif.php" method="post" name="Modifier">
            <h1 class="box-title">Modifier un bien</h1>
            <input type="text" class="box-input" name="modifreference" placeholder="Reference du bien à modifier">
            <input type="text" class="box-input" name="modifville" placeholder="ville">
            <input type="text" class="box-input" name="modiftype" placeholder="type">
            <input type="text" class="box-input" name="modifprix" placeholder="prix">
            <input type="text" class="box-input" name="modifdescription" placeholder="description">
            <input type="text" class="box-input" name="modifsurface" placeholder="surface">
            <input type="text" class="box-input" name="modifnbpiece" placeholder="nbpiece">
            <input type="text" class="box-input" name="modifjardin" placeholder="jardin">
            <input type="submit" value="Modifier" name="submit" class="box-button">

        </form>
        <form class="box" action="deconnexion.php" method="post" name="logout">
        <input type="submit" value="Déconnexion" name="submit" class="box-button">
        </form>
        
        <?php
        //include_once '../inc/piedDePage.inc';
        ?>
    </body>
</html>