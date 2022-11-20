<?php
include_once '../inc/entete.inc';
if (isset($_SESSION['username'])) {
    header('Location: formConnexion.php');
}
?>
<form class="box" action="formAjouteBien.php" method="post" name="login">
    <input type="submit" value="Ajouter un bien" name="submit" class="box-button">
</form>
<form class="box" action="formModifBien.php" method="post" name="login">
    <input type="submit" value="Modifier un bien" name="submit" class="box-button">
</form>
<form class="box" action="formSuppBiens.php" method="post" name="login">
    <input type="submit" value="Supprimer un bien" name="submit" class="box-button">
</form>
<?php
//include_once '../inc/piedDePage.inc';
?>
</body>
</html>
