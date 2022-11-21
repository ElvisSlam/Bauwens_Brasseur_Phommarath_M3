<?php
include_once '../inc/entete.inc';
require('../modeles/mesFonctionsAccesBDD.php');

if (!isset($_SESSION['username'])) {
    header('Location: formConnexion.php');
}
?>
<form class="box" action="validSupp.php" method="post" name="Supp" onsubmit="if (confirm('Demande de confirmation pour la suppression \n')) {
            return true;
        } else {
            return false;
        }">
    <label for="ref">Choisir une reference :</label>
    <select name="ref" id="ref">
        <option value="%">Aucune</option>
        <?php
        $lePdo = connexionBDD();
        $lesRef = getLesRefs($lePdo);
        foreach ($lesRef as $uneRef) {
            echo '<option value="' . $uneRef['reference'] . '">' . $uneRef['reference'] . '</option>';
        }
        ?>
    </select>
    <input type="submit" value="Supprimer" name="submit" class="box-button">
</form>
<form class="box" action="deconnexion.php" method="post" name="logout">
    <input type="submit" value="Déconnexion" name="submit" class="box-button">
</form>
<?php
//include_once '../inc/piedDePage.inc';
?>
</body>
</html>