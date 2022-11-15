<?php
include_once '../inc/entete.inc';
require('../modeles/mesFonctionsAccesBDD.php');
switch(htmlspecialchars($_GET["erreur"])){
    case 0:
        echo "<script>alert('Case Reglement Donnée non cochée')</script>";
    case 1:
        echo "<script>alert('Mail invalide')</script>";
    case 2:
        echo "<script>alert('Champs invalides (vides ou mot de passes non correspondants)')</script>";
    case 3:
        echo "<script>alert('Le mot de passe doit respecter le patterne suivant : minimum 8 charactères, minimum 1 chiffre, minimum 1 miniscule, minimum 1 majuscule')</script>";
}
?>
<form class="box" action="inscription.php" method="post" name="inscription">
    <h1 class="box-title">Inscription</h1>
    <input type="text" class="box-input" name="nom" placeholder="Nom">
    <input type="text" class="box-input" name="prenom" placeholder="Prenom">
    <input type="text" class="box-input" name="email" placeholder="Adresse email">
    <input type="password" class="box-input" name="password" placeholder="Mot de passe">
    <input type="password" class="box-input" name="repeatpassword" placeholder="Confirmer mot de passe">
    Vous avez lu et accepter <a href="rgpd.php" style="color:blue;">le Réglement Général sur la Protection de vos Données</a>
    <input type="checkbox" onClick='PopupImage("../images/rgpd.png")' id="donnees" name="donnees" values="on">
    <br><br>
    <input type="submit" value="S'inscrire" name="submit" class="box-button">

</form>
<?php

?>
</body>

</html>