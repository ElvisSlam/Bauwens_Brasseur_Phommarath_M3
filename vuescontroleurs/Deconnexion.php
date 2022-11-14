<?php

include_once '../modeles/mesFonctionsAccesBDD.php';
session_start();
$pdo = connexionBDD();
insertDeconnexion($pdo, $_SESSION['username']);
unset($_SESSION['username']);
session_destroy();
header('Location:formConnexion.php');
