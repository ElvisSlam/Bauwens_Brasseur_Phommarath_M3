<html>
    <head>
        <?php
        // put your code here
        include_once '../modeles/mesFonctionsAccesBDD.php';
        $lePdo = connexionBDD();
        include_once'../inc/entete.inc'
        ?>
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="verif.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='se connecter' >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
        </div>
    </body>
                <?php
                include_once '../inc/piedDePage.inc';
                ?>
</html>