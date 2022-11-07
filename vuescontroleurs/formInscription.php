<?php
include_once '../inc/entete.inc';
require('../modeles/mesFonctionsAccesBDD.php');

session_destroy();

if (isset($_POST['password'])) {
    $password = $_POST['password'];
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if ($uppercase || $lowercase || $number || $specialChars || strlen($password) < 8) {
        echo '<script>alert("Le mot de passe devrait faire au moins 8 caractères et devrait inclure au moins une lettre majuscule, un nombre, et un caractère spécial.")</script>';
        $strongPass = false;
    } else {
        $strongPass = true;
    }
}

?>

<form class="box" action="inscription.php" method="post" name="inscription">
    <h1 class="box-title">Inscription</h1>
    <input type="text" class="box-input" name="nom" placeholder="Nom" required>
    <input type="text" class="box-input" name="prenom" placeholder="Prenom" required>
    <input type="text" class="box-input" name="email" placeholder="Adresse email" required>
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required>
    <input type="password" class="box-input" name="repeatpassword" placeholder="Confirmer mot de passe" required>
    <a href="../images/politique.png" target="_blank">Vous avez lu et accepter le réglement sur la protection de vos données</a>
    <input type="checkbox" id="donnees" name="donnees" value="on">
    <br><br>
    <input type="submit" value="S'inscrire" name="submit" class="box-button">

</form>
<?php
?>
</body>

</html>