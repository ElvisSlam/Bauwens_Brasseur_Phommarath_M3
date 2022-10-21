<?php
include_once '../inc/entete.inc';
include_once '../modeles/mesFonctionsAccesBDD.php';

if (isset($_POST['donnees'])) {
    $ErrorArrays = array();

    $Nom = $_POST['nom'];
    $Prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatpassword = $_POST['repeatpassword'];
    $check = $_POST['donnees'];
    $lePdo = connexionBDD();
    $exp = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
    if(preg_match($exp,$password)){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            if (inscription($lePdo, $Nom, $Prenom, $email, $password, $repeatpassword)) {
                session_start();
                $_SESSION['username'] = $Nom;
                $id_session = session_id();
                header('Location: listeBiens.php?' . $_SESSION['username']);
            } else {
                header("Location: formInscription.php?erreur=2");
            }
        } else {
            header("Location: formInscription.php?erreur=1");

        }
    } else {
        header("Location: formInscription.php?erreur=3");
    }
} else {
    header("Location: formInscription.php?erreur=0");
}
echo "<div class=box><a href='formInscription.php' style=color:blue;>Retourner au formulaire d'inscription</a></div>";
mysqli_close($db);
?>