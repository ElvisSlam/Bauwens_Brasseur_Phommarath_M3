<?php

function connexionBDD() {
    $bdd = 'mysql:host=localhost;dbname=ap_mission3';
    $user = 'root';
    $password = 'root';
    try {

        $ObjConnexion = new PDO($bdd, $user, $password, array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $ObjConnexion;
}

function deconnexionBDD($cnx) {
    $cnx = null;
}

function ajoutBien($pdo) {
    
}

function testlogin($pdo, $email, $mdp) {
    $pdoStatement = $pdo->prepare("SELECT Count(*) as nbmail from utilisateurs where email = :email AND mdp = :mdp ");
    $bv1 = $pdoStatement->bindValue(':email', $email);
    $bv2 = $pdoStatement->bindValue(':mdp', $mdp);
    $execution = $pdoStatement->execute();
    $resultat = $pdoStatement->fetch();
    if ($resultat != 0)
        $mailok = true;
    else
        $mailok = false;

    return $mailok;
}

/*
// Validation du formulaire
if (isset($_POST['email']) && isset($_POST['password'])) {
    foreach ($users as $user) {
        if (
                $user['email'] === $_POST['email'] &&
                $user['password'] === $_POST['password']
        ) {
            $loggedUser = [
                'email' => $user['email'],
            ];
        } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)', $_POST['email'], $_POST['password']
            );
        }
    }
}
?>

<!--
   Si utilisateur/trice est non identifié(e), on affiche le formulaire
-->
<?php if (!isset($loggedUser)): ?>
    <form action="home.php" method="post">
        <!-- si message d'erreur on l'affiche -->
        <?php if (isset($errorMessage)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com">
            <div id="email-help" class="form-text">L'email utilisé lors de la création de compte.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <!-- 
        Si utilisateur/trice bien connectée on affiche un message de succès
    -->
<?php else: ?>
    <div class="alert alert-success" role="alert">
        Bonjour <?php echo $loggedUser['email']; ?> et bienvenue sur le site !
    </div>
<?php endif; ?>
 * */


function getLesBiens($pdo){
    $pdostatement=$pdo->prepare("SELECT reference,ville,type,prix FROM biens");
    $exec=$pdostatement->execute();
    var_dump($exec);
    $resultat=$pdostatement->fetchAll();
    return $resultat;
}
 