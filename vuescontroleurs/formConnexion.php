<?php
include_once '../inc/entete.inc';
require('../modeles/mesFonctionsAccesBDD.php');

if(isset($_GET['erreur'])){
    if($_GET['erreur'] == "mdp"){
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
<form class="box" action="verif.php" method="post" name="login">
    <h1 class="box-title">Connexion</h1>
    <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
    <input type="password" class="box-input" name="password" placeholder="Mot de passe">
    <input type="submit" value="Connexion " name="submit" class="box-button">
</form>
<?php
include_once '../inc/piedDePage.inc';
?>
</body>
</html>