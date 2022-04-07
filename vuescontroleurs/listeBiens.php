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
        </br>
        </br>
        <label for="rechJardin">Jardin :</label>
        <select name="rechJardin">
            <option value="%">Non spécifié</option>
            <option value="1">Avec</option>
            <option value="0">Sans</option>
        </select>
        </br>
        </br>
        <label for="rechPrixmin">Prix Minimum :</label>
        <input type="number" name="rechPrixmin">
        <label for="rechPrixmax">Prix Maximum :</label>
        <input type="number" name="rechPrixmax">

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
        <th>Jardin</th>
    </tr>
    <?php
    if (isset($_POST['rechVille'])) {
        $ville = htmlspecialchars($_POST['rechVille']);
        $type = htmlspecialchars($_POST['rechType']);
        $jardin = htmlspecialchars($_POST['rechJardin']);
        $prixmin = htmlspecialchars($_POST['rechPrixmin']);
        $prixmax = htmlspecialchars($_POST['rechPrixmax']);
        if($_POST['rechPrixmin']==null){
            $prixmin=0;
        }
        if($_POST['rechPrixmax']==null){
            $prixmax= getPrixMax($lePdo);
        }
        $lesBiens = getLesBiens($lePdo, $ville, $type, $jardin, $prixmin, $prixmax);
    } else {
        $lesBiens = getLesBiens($lePdo, '%', '%', '%', 0, 900000);
    }
    foreach ($lesBiens as $unBien) {

        echo '<tr> <td>' . '<a href=' . 'descriptionbien.php?reference='. $unBien['reference']. '>' . $unBien['reference'] . '</td><td>' . '<a href=' . 'descriptionbien.php?reference='. $unBien['reference'] . '>' . $unBien['ville'] . '</td><td>' . '<a href=' . 'bien.php' . '>' . $unBien['type'] . '</td><td>' . '<a href=' . 'bien.php' . '>' . $unBien['prix'] . '</td></tr> </a>';
        $info='<tr> <td>' . '<a href=' . 'bien.php' . '>' . $unBien['reference'] . '</td><td>' . '<a href=' . 'bien.php' . '>' . $unBien['ville'] . '</td><td>' . '<a href=' . 'bien.php' . '>' . $unBien['type'] . '</td><td>' . '<a href=' . 'bien.php' . '>' . $unBien['prix'] . '</td><td>' . '<a href=' . 'bien.php' . '>';
        if($unBien['jardin'] === '1'){
             $info =$info.'🗸' . '</tr> </a>';
        } else {
            $info=$info.'✗' . '</tr> </a>';
        }
        echo $info;
        //echo '<tr> <td>' . '<a href=' . 'bien.php' . '>' . $unBien['reference'] . '</td><td>' . '<a href=' . 'bien.php' . '>' . $unBien['ville'] . '</td><td>' . '<a href=' . 'bien.php' . '>' . $unBien['type'] . '</td><td>' . '<a href=' . 'bien.php' . '>' . $unBien['prix'] . '</td><td>' . '<a href=' . 'bien.php' . '>' . $unBien['jardin'] . '</tr> </a>';

    }
    ?>
</table>
</br>
</br>
<?php
//include_once '../inc/piedDePage.inc';
?>
</body>
</html>