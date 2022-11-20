<?php
include_once '../inc/entete.inc';
require('../modeles/mesFonctionsAccesBDD.php');
$pdo = connexionBDD();
$req = recupInfo($pdo, $_SESSION['username']);

if (isset($_SESSION['username'])) {
    header('Location: formConnexion.php');
}
if (isset($_GET['erreur'])) {
    if ($_GET['erreur'] == "mdp") {
        echo '
        <br><br>
        <div class="row row d-flex justify-content-center">
            <div class="alert alert-danger col-md-3" role="alert" style="width: 100%, padding: 30px, border: 1px solid #f1f1f1">
            Le mot de passe est incorrect.
            </div>
        </div>';
    }
}
?>

<br><br><br><br>
<form class="box" action="suppression.php" method="post" name="login">
    <input type="password" class="box-input" name="password" placeholder="Mot de passe">
    <input type="submit" value="Supprimer votre compte" name="submit" class="box-button">
</form>

<?php
include_once '../inc/piedDePage.inc';
?>
</body>

</html>