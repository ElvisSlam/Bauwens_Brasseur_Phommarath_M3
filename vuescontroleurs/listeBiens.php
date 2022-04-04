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
        <label for="rechJardin">Jardin :</label>
        <select name="rechJardin">
            <option value="%">Non spécifié</option>
            <option value="1">Avec</option>
            <option value="0">Sans</option>
        </select>
        <label for="rechPrixmin">Prix Minimum :</label>
        <input type="text" name="rechPrixmin">
        <label for="rechPrixmax">Prix Maximum :</label>
        <input type="text" name="rechPrixmax">
        
        <input type="submit" name="rechValid" value="Rechercher" size="20"/>
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
    $jardin = htmlspecialchars($_POST['rechJardin']);
    $lesBiens = getLesBiens($lePdo, $ville, $type, $jardin);
    } else {
        $lesBiens = getLesBiens($lePdo, '%', '%', '%');
    }
    foreach ($lesBiens as $unBien) {
        echo '<tr> <td>'.'<a href='. 'bien.php'.'>'. $unBien['reference'] . '</td><td>'.'<a href='. 'bien.php'.'>' . $unBien['ville'] . '</td><td>'.'<a href='. 'bien.php'.'>' . $unBien['type'] . '</td><td>'.'<a href='. 'bien.php'.'>' . $unBien['prix'] . '</td></tr> </a>';
    }
?>
</table>
    <?php
    include_once '../inc/piedDePage.inc';
    ?>
</body>
</html>