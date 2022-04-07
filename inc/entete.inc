
<html lang="fr">

    <title>France Immobilier : Achat de biens immobiliers pour particuliers</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\cssimmo.css"/>
    <body>
        <header> 
            <!-- entete de page + navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a href="../index.php" class="navbar-brand">
                        <img src="images/logo_dark_transpa.png" class="img-fluid" alt="" width="50%"style="margin-left: 16px;">
                    </a>

                    <?php if (isset($_SESSION['username'])) { ?>
                        <a href="menu.php" class="nav-link" aria-current="page" href="page">Menu</a>
                    <?php } else { ?>                                    
                        <a href="formConnexion.php" class="nav-link" aria-current="page">Se connecter</a>
                    <?php } ?>

                    <a href="listeBiens.php" class="nav-link" aria-current="page">Visualiser la liste des biens</a>

                </div>
            </nav>
        </header>
