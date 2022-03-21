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
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>


            </p>
            <p>
               <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

            </p>
            <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>

        </form>
        </div>
        <div id="piedForm">
                    <input type="submit" name="valid" id="valid" value="Se connecter" />
        </div>
    </body>
                <?php
                include_once '../inc/piedDePage.inc';
                ?>
</html>