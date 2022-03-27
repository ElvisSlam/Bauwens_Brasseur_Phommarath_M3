<?php
include_once'../inc/entete.inc';
?>

<form name="recherche" id="recherche" method="post" action="listeBiens.php">
    <div id="titrerecherche">Recherche d'un bien</div>
    <div id="corpsrecherche">
        <fieldset id="ville"> <legend>Ville à rechercher</legend>
            <span>Choisissez une ou plusieurs villes :</span>
            <p>
                <?php
                include_once '../modeles/mesFonctionsAccesBDD.php';
                $lePdo = connexionBDD();
                $lesVilles = getLesVilles($lePdo);
                foreach ($lesVilles as $uneVille) {
                    echo '<input type="checkbox" name="ville" id="'.$uneVille['ville'].'" value="'.$uneVille['ville'].'"/>';
                    echo '<label for="'.$uneVille['ville'].'">'.$uneVille['ville'].'</label><br />';
                }
                ?>
            </p>
        </fieldset>
        <br />
        <fieldset id="type"> <legend>Type à rechercher</legend>
            <span>Choisissez un ou plusieurs types :</span>
            <p>
                <?php
                include_once '../modeles/mesFonctionsAccesBDD.php';
                $lePdo = connexionBDD();
                $lesTypes = getLestypes($lePdo);
                foreach ($lesTypes as $unType) {
                    echo '<input type="checkbox" name="type" id="'.$unType['type'].'" value="'.$unType['type'].'"/>';
                    echo '<label for="'.$unType['type'].'">'.$unType['type'].'</label><br />';
                }
                ?>
            </p>
        </fieldset>
    </div>
    <div id="boutonvalid">
        <input type="submit" name="valid" id="valid" value="Rechercher" />
    </div>
</form>
<?php
include_once '../inc/piedDePage.inc';
?>
</body>
</html>