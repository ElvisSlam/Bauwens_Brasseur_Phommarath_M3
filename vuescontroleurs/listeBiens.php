<?php
include_once'../inc/entete.inc';
$ville = '';
$type = '';
?>
<div>
    <form id="rechercheBien" method="post" action="#">
        <h2>Rechercher un bien :</h2>
        <label for="rechVille">Choisir une ville :</label>
        <select name="rechVille">
            <option value="?">Aucune</option>
            <?php
            include_once '../modeles/mesFonctionsAccesBDD.php';
            $lePdo = connexionBDD();
            $lesVilles = getLesVilles($lePdo);
            foreach ($lesVilles as $uneVille) {
                echo '<option value="'. $uneVille['ville'] . '">'.$uneVille['ville'] .'</option>';
            }
            ?>
        </select>
        <label for="rechType">Choisir un type :</label>
        <select name="rechType">
            <option value="?">Aucun</option>
            <?php
            include_once '../modeles/mesFonctionsAccesBDD.php';
            $lePdo = connexionBDD();
            $lesTypes = getLesTypes($lePdo);
            foreach ($lesTypes as $unType) {
                echo '<option value="'. $unType['type'] . '">'.$unType['type'] .'</option>';
            }
            ?>
        </select>
        <input type="submit" name="rechValid" value="Rechercher"/>
    </form>
</div>
</br>
<table>
    <tr>
        <th>Reference</th>
        <th>Ville</th>
        <th>Type</th>
        <th>Prix</th>
    </tr>
    <?php
    include_once '../modeles/mesFonctionsAccesBDD.php';
    $ville=htmlspecialchars($_POST['rechVille']);
    $type=htmlspecialchars($_POST['rechType']);
    $lePdo = connexionBDD();
    $lesBiens = getLesBiens($lePdo, $ville , $type);
    foreach ($lesBiens as $unBien) {
        echo '<tr> <td>' . $unBien['reference'] . '</td><td>' . $unBien['ville'] . '</td><td>' . $unBien['type'] . '</td><td>' . $unBien['prix'] . '</td></tr>';
    }
    ?>
</table>
<?php
include_once '../inc/piedDePage.inc';
?>
</body>
</html>