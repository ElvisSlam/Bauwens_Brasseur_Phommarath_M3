<?php
include_once '../inc/entete.inc';
require('../modeles/mesFonctionsAccesBDD.php');
$email = $_SESSION['username'];
$pdo = connexionBDD();
$requete = recupInfo($pdo, $_SESSION['username']);

?>
<form class="box" action="validRectif.php" method="post" name="Modifier">
    <h1 class="box-title">Modifier mes informations</h1>
    <label for="">Email:</label>
    <input type="text" class="box-input" value=<?php echo $email ?> disabled>
    <label for="">Nom:</label>
    <input type="text" class="box-input" name="nom"  placeholder="nom">
    <label for="">Prenom:</label>
    <input type="text" class="box-input" name="prenom"  placeholder="prenom">
    <label for="">Mot de passe:</label>
    <input type="password" class="box-input" name="modifmdp" placeholder="mot de passe">
    <input type="submit" value="Modifier" name="submit" class="box-button">
</form>
<?php
//include_once '../inc/piedDePage.inc';
?>
</body>

</html>