<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        // put your code here
        include_once'../inc/entete.inc'
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
