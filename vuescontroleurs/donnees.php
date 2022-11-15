<?php
include_once '../inc/entete.inc';
require('../modeles/mesFonctionsAccesBDD.php');
?>
<form class="box" action="info.php" method="post" name="login">
    <input type="submit" value="Télécharger au format JSON" name="submit" class="box-button">
</form>
<form class="box" action="hash.php" method="post" name="login">
    <input type="submit" value="Télécharger le hash" name="submit" class="box-button">
</form>