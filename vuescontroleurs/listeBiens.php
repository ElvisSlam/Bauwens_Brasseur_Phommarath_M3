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
            $lePdo=connexionBDD();
        ?>
        </table>
        <?php
        include_once '../inc/piedDePage.inc';
        ?>
    </body>
</html>