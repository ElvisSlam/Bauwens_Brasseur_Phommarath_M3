<!DOCTYPE html>
<html lang="fr">
    <title>France Immobilier : Achat de biens immobiliers pour particuliers</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cssimmo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <body>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg bg-dark">
        <a class="navbar-brand" href="#">
            <img src="images/logo_dark_transpa.png" class="img-header" alt="logo">
        </a>
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Accueil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="vuescontroleurs/listeBiens.php">Visualiser la liste des biens</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="vuescontroleurs/rgpd.php">Politique de données</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </a>
            <ul class="dropdown-menu" >
<?php
    session_start();
    if (isset($_SESSION['username'])) {
 ?>
            <li><a class="dropdown-item" href="vuescontroleurs/donnees.php" style="color:black">Télécharger vos données</a></li>           
            <li><a class="dropdown-item" href="vuescontroleurs/formRectif.php" style="color:black">Rectifier vos données</a></li>
            <li><a class="dropdown-item" href="vuescontroleurs/supp.php" style="color:black">Supprimer vos données</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="vuescontroleurs/Deconnexion.php" style="color:black">Deconnexion</a></li>
            </ul>
            </li>
            </ul>
            <span class="navbar-text" style="color: white;">Connecté en tant que: <?php echo ($_SESSION["username"]); ?></span>
            <?php
            } else {
            ?>
            <li><a class="dropdown-item" href="vuescontroleurs/formConnexion.php" style="color:black">Se connecter</a></li>
            <li><a class="dropdown-item" href="vuescontroleurs/formInscription.php" style="color:black">S'inscrire</a></li>
            </ul>
            </li>
            </ul>
            <?php 
            }
            ?>
    </div>
  </div>
</nav>
<body>