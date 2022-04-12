<?php
include_once'../inc/entete.inc';
include_once '../modeles/mesFonctionsAccesBDD.php';
$lePdo = connexionBDD();
?>
<div>
    <form id="rechercheBien" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Rechercher un bien :</h2>
        <label for="rechVille">Choisir une ville :</label>
        <select name="rechVille" id="rechVille">
            <option value="%">Aucune</option>
            <?php
            $lesVilles = getLesVilles($lePdo);
            foreach ($lesVilles as $uneVille) {
                echo '<option value="' . $uneVille['ville'] . '">' . $uneVille['ville'] . '</option>';
            }
            ?>
        </select>
        <br>
        <br>
        <label for="rechType">Choisir un type :</label>
        <select name="rechType" id="rechType">
            <option value="%">Aucun</option>
            <?php
            $lesTypes = getLesTypes($lePdo);
            foreach ($lesTypes as $unType) {
                echo '<option value="' . $unType['type'] . '">' . $unType['type'] . '</option>';
            }
            ?>
        </select>
        <br>
        <br>
        <label for="rechJardin">Jardin :</label>
        <select name="rechJardin" id="rechJardin">
            <option value="%">Non spécifié</option>
            <option value="1">Avec</option>
            <option value="0">Sans</option>
        </select>
        <br>
        <br>
        <label for="rechPrixmin">Prix Minimum :</label>
        <input type="number" name="rechPrixmin" id="rechPrixmin">
        <label for="rechPrixmax">Prix Maximum :</label>
        <input type="number" name="rechPrixmax" id="rechPrixmax">

        <input type="submit" name="rechValid" value="Rechercher" size="20"/>
    </form>
</div>
<br>
<table>
    <tr>
        <th>Reference</th>
        <th>Ville</th>
        <th>Type</th>
        <th>Prix</th>
        <th>Jardin</th>
    </tr>
    <?php
    if (isset($_POST['rechVille'])) {
        $ville = htmlspecialchars($_POST['rechVille']);
        $type = htmlspecialchars($_POST['rechType']);
        $jardin = htmlspecialchars($_POST['rechJardin']);
        $prixmin = htmlspecialchars($_POST['rechPrixmin']);
        $prixmax = htmlspecialchars($_POST['rechPrixmax']);
        if ($_POST['rechPrixmin'] == null) {
            $prixmin = getPrixMin($lePdo);
        }
        if ($_POST['rechPrixmax'] == null) {
            $prixmax = getPrixMax($lePdo);
        }
        $lesBiens = getLesBiens($lePdo, $ville, $type, $jardin, $prixmin, $prixmax);
    } else {
        $lesBiens = getLesBiens($lePdo, '%', '%', '%', getPrixMin($lePdo), getPrixMax($lePdo));
    }
    foreach ($lesBiens as $unBien) {
        $info = '<tr> <td>' . '<a href=' . 'descriptionbien.php?reference="' . $unBien['reference'] . '">' . $unBien['reference'] . '</a></td><td>' . '<a href=' . 'descriptionbien.php?reference=' . $unBien['reference'] . '>' . $unBien['ville'] . '</td><td>' . '<a href=' . 'descriptionbien.php?reference=' . $unBien['reference'] . '>' . $unBien['type'] . '</td><td>' . '<a href=' . 'descriptionbien.php?reference=' . $unBien['reference'] . '>' . $unBien['prix'] . '</td><td>' . '<a href=' . 'descriptionbien.php?reference=' . $unBien['reference'] . '>';
        if ($unBien['jardin'] === '1') {
            $info = $info . '🗸' . '</tr> </a>';
        } else {
            $info = $info . '✗' . '</tr> </a>';
        }
        echo $info;
    }
    ?>
</table>
<br>
<br>
<?php
//include_once '../inc/piedDePage.inc';
?>
</body>
</html>