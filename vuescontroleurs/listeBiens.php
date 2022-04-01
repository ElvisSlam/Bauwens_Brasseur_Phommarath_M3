<?php
include_once'../inc/entete.inc';
include_once '../modeles/mesFonctionsAccesBDD.php';
$lePdo = connexionBDD();
?>
<div>
    <form id="rechercheBien" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Rechercher un bien :</h2>
        <label for="rechVille">Choisir une ville :</label>
        <select name="rechVille">
            <option value="%">Aucune</option>
            <?php
            $lesVilles = getLesVilles($lePdo);
            foreach ($lesVilles as $uneVille) {
                echo '<option value="' . $uneVille['ville'] . '">' . $uneVille['ville'] . '</option>';
            }
            ?>
        </select>
        </br>
        <label for="rechType">Choisir un type :</label>
        <select name="rechType">
            <option value="%">Aucun</option>
            <?php
            $lesTypes = getLesTypes($lePdo);
            foreach ($lesTypes as $unType) {
                echo '<option value="' . $unType['type'] . '">' . $unType['type'] . '</option>';
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
if (isset($_POST['rechVille'])) {
    $ville = htmlspecialchars($_POST['rechVille']);
    $type = htmlspecialchars($_POST['rechType']);
    $lesBiens = getLesBiens($lePdo, $ville, $type);
    } else {
        $lesBiens = getLesBiens($lePdo, '%', '%');
    }
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