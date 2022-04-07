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
        ?>

        <form class="box" action="verif.php" method="post" name="login">
            <h1 class="box-title">Connexion</h1>
            <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
            <input type="password" class="box-input" name="password" placeholder="Mot de passe">
            <input type="submit" value="Connexion " name="submit" class="box-button">
        </form>

        
        
        <?php
        include_once '../inc/piedDePage.inc';
        ?>
    </body>
</html>