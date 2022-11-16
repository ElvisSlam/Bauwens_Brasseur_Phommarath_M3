<?php
include_once '../inc/entete.inc';
require('../modeles/mesFonctionsAccesBDD.php');
if (isset($_SESSION["username"])) {
    $info = '<form class="box" action="info.php" method="post" name="login">
                <input type="submit" value="Télécharger au format JSON" name="submit" class="box-button">
            </form>
            <form class="box" action="hash.php" method="post" name="login">
                <input type="submit" value="Télécharger le hash" name="submit" class="box-button">
            </form>';
    echo $info;
} else {
    header('Location: listeBiens.php');
    echo "<script>alert('Vous devez être connecté pour accèder à cette page.')</script>";
} 
?>