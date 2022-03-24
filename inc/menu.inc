<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['login'])) 
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: formConnexion.php');
  exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Administration</title>
  </head>
  <body>
 <?php
    // Ici on est bien loggué, on affiche un message
    echo 'Bienvenue ', $_SESSION['login'];
  ?>
  </body>
</html>