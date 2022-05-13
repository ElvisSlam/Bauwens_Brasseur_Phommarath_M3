<?php
include_once'../inc/entete.inc';
include_once '../modeles/mesFonctionsAccesBDD.php';
$lePdo = connexionBDD();
?>
<div>
    <form id="rechercheBien" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Rechercher un bien :</h2>
        <label for="rechRef">Choisir une reference :</label>
        <select name="rechRef" id="rechRef">
            <option value="%">Aucune</option>
            <?php
            $lePdo = connexionBDD();
            $lesRef = getLesRefs($lePdo);
            foreach ($lesRef as $uneRef) {
                echo '<option value="' . $uneRef['reference'] . '">' . $uneRef['reference'] . '</option>';
            }
            ?>
        </select>
        <br>
        <br>
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
        <br><br>
        <label for="rechSurface">Surface :</label>
        <input type="number" name="rechSurface" id="rechSurface">
        <br><br>
        <label for="rechPiece">Nombre de Piece :</label>
        <input type="number" name="rechPiece" id="rechPiece">      

        <input type="submit" name="rechValid" value="Rechercher" size="20"/>
    </form>
    
    <form id="triBien" method="post" action="#">
        <h2>Trier les biens :</h2><br>
        <p>Trier sur :</p>
        <label for="triVille">Ville :</label>
        <select name="triVille" id="triVille">
            <option value="1" selected>Pas de tri</option>
            <option value="ville ASC">Croissant</option>
            <option value="ville DESC">Décroissant</option>
        </select><br>
        <label for="triType">Type :</label>
        <select name="triType" id="triType">
            <option value="1" selected>Pas de tri</option>
            <option value="type ASC">Croissant</option>
            <option value="type DESC">Décroissant</option>
        </select><br>
        <label for="triPrix">Prix :</label>
        <select name="triPrix" id="triPrix">
            <option value="1" selected>Pas de tri</option>
            <option value="prix ASC">Croissant</option>
            <option value="prix DESC">Décroissant</option>
        </select><br>
        <input type="submit" name="triValid" value="Trier">
    </form>
</div>
<br>
<table>
    <tr>
        <th>Reference</th>
        <th>Ville</th>
        <th>Type</th>
        <th>Prix</th>
        <th>Surface</th>
        <th>Nombre de piece</th>
        <th>Jardin</th>
    </tr>
    <?php
    if(isset($_POST['triVille'])){
        $leTri = array($_POST['triVille'], $_POST['triType'], $_POST['triPrix']);
    } else {
        $leTri = " 1";
    }
    if (isset($_POST['rechVille'])) {
        $reference = htmlspecialchars($_POST['rechRef']);
        $ville = htmlspecialchars($_POST['rechVille']);
        $type = htmlspecialchars($_POST['rechType']);
        $jardin = htmlspecialchars($_POST['rechJardin']);
        $prixmin = htmlspecialchars($_POST['rechPrixmin']);
        $prixmax = htmlspecialchars($_POST['rechPrixmax']);
        $surface = htmlspecialchars($_POST['rechSurface']);
        $nbpiece = htmlspecialchars($_POST['rechPiece']);
        if ($_POST['rechPrixmin'] == null) {
            $prixmin = getPrixMin($lePdo);
        }
        if ($_POST['rechPrixmax'] == null) {
            $prixmax = getPrixMax($lePdo);
        }
        if ($_POST['rechSurface'] == null) {
            $surface = getSurfacemin($lePdo);
        }
        if ($_POST['rechPiece'] == null) {
            $nbpiece = getNbPiecemin($lePdo);
        }
        if ($_POST['rechRef'] == null) {
            $reference = getLaRef($lePdo);
        }
        $lesBiens = getLesBiens($lePdo, $reference, $ville, $type, $jardin, $prixmin, $prixmax, $surface, $nbpiece, $leTri);
    } else {
        $lesBiens = getLesBiens($lePdo, '%', '%', '%', '%', getPrixMin($lePdo), getPrixMax($lePdo), getSurfacemin($lePdo), getNbPiecemin($lePdo), $leTri);
    }
    foreach ($lesBiens as $unBien) {
        $info = '<tr> <td>' . '<a href=' . 'descriptionbien.php?reference=' . $unBien['reference'] . '>' . $unBien['reference'] . '</a></td>'
                . '<td>' . '<a href=' . 'descriptionbien.php?reference=' . $unBien['reference'] . '>' . $unBien['ville'] . '</a></td>'
                . '<td>' . '<a href=' . 'descriptionbien.php?reference=' . $unBien['reference'] . '>' . $unBien['type'] . '</a></td>'
                . '<td>' . '<a href=' . 'descriptionbien.php?reference=' . $unBien['reference'] . '>' . $unBien['prix'] . '</a></td>'
                . '<td>' . '<a href=' . 'descriptionbien.php?reference=' . $unBien['reference'] . '>' . $unBien['surface'] . '</a></td>'
                . '<td>' . '<a href=' . 'descriptionbien.php?reference=' . $unBien['reference'] . '>' . $unBien['nbpiece'] . '</a></td>'
                . '<td>' . '<a href=' . 'descriptionbien.php?reference=' . $unBien['reference'] . '>';
        if ($unBien['jardin'] === '1') {
            $info = $info . '🗸' . '</a></tr> ';
        } else {
            $info = $info . '✗' . ' </a></tr>';
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