<!DOCTYPE html>
<html lang="fr">
  <title>
    France Immobilier : Achat de biens immobiliers pour particuliers
  </title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/cssimmo.css" />
  <body>
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Dropdown link
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <header>
      <a href="../index.php">
        <img
          src="../images/logo_dark_transpa.png"
          class="img-header"
          alt="logo"
        />
      </a>
      <?php
            session_start();
            if (isset($_SESSION['username'])) {
            ?>
      <a
        href="menu.php?.$_SESSION['username']"
        aria-current="page"
        class="link-header"
        >Menu</a
      >
      <a href="Deconnexion.php" aria-current="page" class="link-header"
        >Deconnexion</a
      >
      <a href="rectification.php" aria-current="page" class="link-header"
        >rectification</a
      >
      <?php
            } else {
            ?>
      <a href="formConnexion.php" aria-current="page" class="link-header"
        >Se connecter</a
      >
      <a href="formInscription.php" aria-current="page" class="link-header"
        >S'inscrire</a
      >
      <?php 
            }
            ?>

      <a
        href="politique.php?.$_SESSION['username']"
        aria-current="page"
        class="link-header"
        >politique de confidentialité</a
      >

      <a
        href="listeBiens.php?.$_SESSION['username']"
        aria-current="page"
        class="link-header"
        >Visualiser la liste des biens</a
      >
    </header>
  </body>
</html>
