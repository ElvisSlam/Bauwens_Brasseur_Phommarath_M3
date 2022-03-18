<html>
    <head>
        <?php
        // put your code here
        include_once '../modeles/mesFonctionsAccesBDD.php';
        $lePdo = connexionBDD();
        include_once'../inc/entete.inc'
        ?>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/cssimmo.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            <form action="../inc/menu.inc" method="POST">
                <div id="titreForm">Connexion au site</div>
            <div id="corpForm">
                <fieldset id="coordonnees"><br />
                    <p>
                        <label for="eMail" title="Veuillez saisir votre adresse email" class="oblig">* e-Mail :</label>
                        <input type="email" name="eMail" id="eMail" title="Veuillez saisir votre adresse e-mail" />
                        
                    </p>

            </form>
        </div>
    </body>
    <?php
    include_once '../inc/piedDePage.inc';
    ?>
</html>