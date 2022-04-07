<!DOCTYPE html>

<html>
    <head>
        <?php
        /*if(isset($_SESSION['username'])){
            echo "bienvenue " . $username;
        } else {
            header('Location: formConnexion.php');
            
        };
        include_once'../inc/entete.inc'*/
        ?>
        <link rel="stylesheet" href="../css/cssimmo.css" />
        <meta charset="UTF-8">
    </head>
    <body>
        <form class="box" action="formAjouteBien.php" method="post" name="login">
            <input type="submit" value="Ajouter un bien" name="submit" class="box-button">
        </form>
        <form class="box" action="formModifBien.php" method="post" name="login">
            <input type="submit" value="Modifier un bien" name="submit" class="box-button">
        </form>
        <form class="box" action="formSuppBien.php" method="post" name="login">
            <input type="submit" value="Supprimer un bien" name="submit" class="box-button">
        </form>
    </body>
    <?php
    include_once '../inc/piedDePage.inc';
    ?>
</html>
