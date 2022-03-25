<html>
    <?php
    include_once'../inc/entete.inc'
    ?>
    <link rel="stylesheet" href="css\cssimmo.css"/>
    <body>
        <table>
            <tr>
                <th>Reference</th>
                <th>Ville</th>
                <th>Type</th>
                <th>Prix</th>
            </tr>
            <?php
            include_once '../modeles/mesFonctionsAccesBDD.php';
            $lePdo = connexionBDD();
            $lesBiens = getLesBiens($lePdo);
            foreach ($lesBiens as $unBien) {
                echo '<tr> <td>'.$unBien['reference'].'</td><td>'.$unBien['ville'].'</td><td>'.$unBien['type'].'</td><td>'.$unBien['prix'].'</td></tr>';
            }
            ?>
        </table>
        <?php
        include_once '../inc/piedDePage.inc';
        ?>
    </body>
</html>