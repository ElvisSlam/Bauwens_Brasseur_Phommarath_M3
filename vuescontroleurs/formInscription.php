<?php
include_once'../inc/entete.inc';
require('../modeles/mesFonctionsAccesBDD.php');
?>
<form class="box" action="inscription.php" method="post" name="inscription">
    <h1 class="box-title">Inscription</h1>
    <input type="text" class="box-input" name="nom" placeholder="Nom">
    <input type="text" class="box-input" name="prenom" placeholder="Prenom">
    <input type="text" class="box-input" name="email" placeholder="Adresse email">
    <input type="password" class="box-input" name="password" placeholder="Mot de passe">
    <input type="password" class="box-input" name="repeatpassword" placeholder="Confirmer mot de passe">
    Vous avez lu et accepter <a href="menu.php " > le réglement sur la protection de vos données</a>
    <input type ="checkbox" id="donnees"name = "donnees" values="on"> 
    <br><br>
    <input type="submit" value="S'inscrire " name="submit" class="box-button">
    
</form>
<?php

?>
</body>
</html>